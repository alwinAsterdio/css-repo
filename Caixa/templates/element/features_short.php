<?php
$property_type = $property->get('property_type');
$bedrooms_value = $property->getField('bedrooms', [ 'default_value' => '' ]);
if (!empty($bedrooms_value)) {
    ?>
    <div class="property-item__inner__row2__features__item">
        <?= $bedrooms_value ?> habs.
    </div>
    <?php
}

$bathrooms_value = $property->getField('bathrooms', [ 'default_value' => '' ]);
if (!empty($bathrooms_value)) {
    ?>
    <div class="property-item__inner__row2__features__item">
        <?= $bathrooms_value ?> baños
    </div>
    <?php
}

$area_value = $property->getField('total_area_amount', [ 'default_value' => '' ]);
if (!empty($area_value)) {
    ?>
    <div class="property-item__inner__row2__features__item" title="Área total">
        <?= $area_value ?>
    </div>
    <?php
}

if ($property_type == 'apartment') {
    $floor_number_value = $property->getField('floor_number', [ 'default_value' => '' ]);
    if (!empty($floor_number_value)) {
        ?>
        <div class="property-item__inner__row2__features__item">
            <?= $floor_number_value ?> <span class="lowercase"><?= h($property->getLabel('floor_number')); ?></span>
        </div>
        <?php
    }
}