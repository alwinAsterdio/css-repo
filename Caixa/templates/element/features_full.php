<?php
$sale_rent = $property->get('sale_rent');
if ($sale_rent === 'for_sale_and_rent') {
    $sale_rent = \App\Utils\CommonFunctions::getQueryParam('sale_rent', 'for_sale');
}

$property_type = $property->get('property_type');
$features_list = \App\Utils\Config::read('features/caixa/full.php');

if (empty($features_list[$sale_rent])) {
    return;
}

$energy_certificate_colors = [
    'A' => '#0DA325',
    'A+' => '#00722D',
    'B' => '#96AF13',
    'C' => '#CEDB2A',
    'D' => '#F4E601',
    'E' => '#F5B901',
    'F' => '#E17103',
    'G' => '#E02216',
    'H' => '#84171C',
];

$columns_html = '';

$show_not_available_message = false;
$overwrite_labels = '';
foreach ($features_list[$sale_rent] as $columns) :
    ob_start();
    $row_html = '';
    foreach ($columns as $row_title => $row_fields) :
        ob_start();
        $field_html = '';
        foreach ($row_fields as $field_name) :
            $field_value = $property->getField($field_name);

            $is_energy_certificate = in_array($field_name, [
                'energy_efficiency_grade',
                'energy_consumption_rating',
                'energy_emission_rating',
            ]);

            if ($is_energy_certificate) {
                $bg = $energy_certificate_colors[$field_value] ?? '#F2F3FF';
                ob_start();
                $field_style = '';
                $field_class = '';

                if (!empty($field_value) && strlen($field_value) <= 2) {
                    $color = in_array($field_value, ['A+', 'H']) ? '#FFFFFF' : '#000000';
                    $field_style = "background-color: $bg; color: $color;";
                    $field_class = 'is-energy-certificate';
                } elseif (empty($field_value) && $field_name === 'energy_efficiency_grade') {
                    $field_value = __('Not Avaliable');
                    $show_not_available_message = true;
                } elseif ($field_name === 'energy_efficiency_grade' && $property->get($field_name) === 'not_required') {
                    $overwrite_labels = $field_value;
                } elseif (
                    $field_name === 'energy_efficiency_grade' &&
                    $property->get($field_name) === 'pending_certification'
                ) {
                    $overwrite_labels = $field_value;
                    $show_not_available_message = true;
                }
                ?>
                <li>
                    <label class="feature-energy-label"><?= $property->getLabel($field_name); ?>:</label>
                    <span class="<?= $field_class; ?>" style="<?= $field_style; ?>"><?= $field_value; ?></span>
                    <?php if ($field_name === 'energy_consumption_rating') { ?>
                        <?php
                        $energy_consumption_value = $property->get('energy_consumption_value');
                        $energy_consumption_rating = $property->get('energy_consumption_rating');
                        $value = $energy_consumption_value;
                        if (!empty($energy_consumption_value)) {
                            $value .= ' ' . __('kWh/m² per year');
                        }

                        if (
                            empty($energy_consumption_value) &&
                            empty($energy_consumption_rating) &&
                            empty($overwrite_labels)
                        ) {
                            $value = __('Not Avaliable');
                            $show_not_available_message = true;
                        }

                        if (!empty($overwrite_labels)) {
                            $value = $overwrite_labels;
                        }
                        ?>
                        <span><?= $value ?></span>
                    <?php } elseif ($field_name === 'energy_emission_rating') { ?>
                        <?php
                        $energy_emission_value = $property->get('energy_emission_value');
                        $energy_emission_rating = $property->get('energy_emission_rating');
                        $value = $energy_emission_value;
                        if (!empty($energy_emission_value)) {
                            $value .= ' ' . __('kg CO₂/m² per year');
                        }

                        if (
                            empty($energy_emission_value) &&
                            empty($energy_emission_rating) &&
                            empty($overwrite_labels)
                        ) {
                            $value = __('Not Avaliable');
                            $show_not_available_message = true;
                        }

                        if (!empty($overwrite_labels)) {
                            $value = $overwrite_labels;
                        }
                        ?>
                        <span><?= $value ?></span>
                    <?php } ?>
                </li>
                <?php
                $field_html .= ob_get_clean();
                continue;
            }

            if ($field_name === 'qoetix_energy_certificate_table') {
                ob_start();
                echo $this->element('energy-certificate-table', ['show_not_available_message' => $show_not_available_message]);
                $field_html .= ob_get_clean();
                continue;
            }

            if (empty($field_value)) {
                continue;
            }
            ob_start();
            ?>
            <li>
                <label class=""><?= $property->getLabel($field_name); ?>:</label>
                <span><?= $field_value; ?></span>
            </li>
            <?php
            $field_html .= ob_get_clean();
        endforeach;
        if (empty($field_html)) {
            ob_clean();
            continue;
        }
        ?>
        <div class="[&:not(:first-child)]:mt-5">
            <h2 class="mb-3 mt-0 text-2xl text-theme-primary-color font-semibold"><?= $row_title ?></h2>
            <ul class="flex flex-col gap-2 font-[Roboto] pl-[24px]">
                <?= $field_html; ?>
            </ul>
        </div>
        <?php
        $row_html .= ob_get_clean();
    endforeach;
    if (empty($row_html)) {
        continue;
    }
    ?>
    <div>
        <?= $row_html; ?>
    </div>
    <?php $columns_html .= ob_get_clean(); ?>
<?php endforeach; ?>

<?php
if (empty($columns_html)) {
    return;
}
?>
<div>
    <div class="w-full grid grid-cols-1 xl:grid-cols-2 gap-5">
        <?= $columns_html ?>
    </div>
</div>
