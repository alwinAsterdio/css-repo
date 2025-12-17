<?php
$energy_rating_details = [
    'a' => [
        'label' => 'A',
        'color' => '#0DA325',
        'descr' => 'más eficiente',
    ],
    'b' => [
        'label' => 'B',
        'color' => '#96AF13',
        'descr' => '',
    ],
    'c' => [
        'label' => 'C',
        'color' => '#CEDB2A',
        'descr' => '',
    ],
    'd' => [
        'label' => 'D',
        'color' => '#F4E601',
        'descr' => '',
    ],
    'e' => [
        'label' => 'E',
        'color' => '#F5B901',
        'descr' => '',
    ],
    'f' => [
        'label' => 'F',
        'color' => '#E17103',
        'descr' => '',
    ],
    'g' => [
        'label' => 'G',
        'color' => '#E02216',
        'descr' => 'menos eficiente',
    ],
];
?>
<div class="ml-[-24px]">
    <div class="text-theme-primary-color font-medium text-[16px] leading-[18px] mb-2 font-[FaktumNeue] pt-[16px]">Etiqueta de calificación energética</div>
    <div class="bg-[#E7E7E7] rounded-lg p-[9px] max-w-[298px]">
        <table class="e-tbl">
            <thead class="e-tbl__header">
                <tr class="e-tbl__header__row">
                    <th class="e-tbl__header__row__col font-bold text-black text-[7px] leading-[100%] tracking-[-0.2px] font-[Roboto] min-w-[162px] text-left">ESCALA DE LA CALIFICACIÓN ENERGÉTICA</th>
                    <th class="e-tbl__header__row__col text-[6px] leading-[100%] font-[Roboto] font-normal text-[#666666] min-w-[55px]">
                        <p>Consumo de energía</p>
                        <p>kW h m² / año</p>
                    </th>
                    <th class="e-tbl__header__row__col text-[6px] leading-[100%] font-[Roboto] font-normal text-[#666666] min-w-[55px]">
                        <p>Emisiones</p>
                        <p>kg CO₂ m² / año</p>
                    </th>
                </tr>
            </thead>
            <tbody class="e-tbl__body">
                <?php
                $perc = 40;
                $energy_consumption_rating = $property->get('energy_consumption_rating');
                $energy_emission_rating = $property->get('energy_emission_rating');
                $energy_consumption_value = $property->get('energy_consumption_value');
                $energy_emission_value = $property->get('energy_emission_value');
                ?>
                <?php foreach ($energy_rating_details as $rating_value => $rating_detail) : ?>
                    <tr class="e-tbl__body__row">
                        <td class="e-tbl__body__row__col">
                            <div class="e-tbl__body__row__col__label e-tbl-arrow-right" style="--arrow-color: <?= $rating_detail['color'] ?>;--arrow-width: <?= (string)$perc ?>%;">
                                <span><?= $rating_detail['label'] ?></span>
                                <span class="e-tbl__body__row__col__label__descr"><?= $rating_detail['descr'] ?></span>
                            </div>
                        </td>
                        <td class="e-tbl__body__row__col">
                            <?php if ($energy_consumption_rating === $rating_value) : ?>
                                <div class="e-tbl__body__row__col__value e-tbl-arrow-left"><?= !empty($energy_consumption_value) ? number_format($energy_consumption_value, 1) : ''; ?></div>
                            <?php endif; ?>
                        </td>
                        <td class="e-tbl__body__row__col">
                            <?php if ($energy_emission_rating === $rating_value) : ?>
                                <div class="e-tbl__body__row__col__value e-tbl-arrow-left"><?= !empty($energy_emission_value) ? number_format($energy_emission_value, 1) : ''; ?></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $perc = $perc + 7.7; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($show_not_available_message) && $show_not_available_message) { ?>
        <div class="font-[Roboto] text-[14px] leading-[100%] font-normal pt-[16px] text-[#666666]"><?= __('This information will be updated daily.'); ?></div>
    <?php } ?>
</div>