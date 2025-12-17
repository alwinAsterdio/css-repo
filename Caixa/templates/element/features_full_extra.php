<?php
$sale_rent = $property->get('sale_rent');
if ($sale_rent === 'for_sale_and_rent') {
    $sale_rent = \App\Utils\CommonFunctions::getQueryParam('sale_rent', 'for_sale');
}

$property_type = $property->get('property_type');
$features_list = \App\Utils\Config::read('features/caixa/full_extra.php');

if (empty($features_list[$sale_rent])) {
    return;
}
?>
<div class="flex flex-wrap gap-2 pt-8">
    <?php
    foreach ($features_list[$sale_rent] as $field_name) :
        $field_value = $property->get($field_name);
        if (empty($field_value)) {
            continue;
        }

        $label = $property->getLabel($field_name);
        ?>
    <div class="bg-[#F2F3FF] rounded-full text-black px-3 py-1 text-xs font-medium" title="<?= $label ?>"><?= $label ?></div>
        <?php
    endforeach;
    ?>
</div>