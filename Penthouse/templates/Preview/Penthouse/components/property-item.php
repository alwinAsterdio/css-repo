<?php
$sale_rent = $property->getField('sale_rent');
$district = $property->getField('state');
$municipality = $property->getField('municipality');

$address = $district;
if ($district && $municipality) {
    $address .= ', ' . $municipality;
} elseif ($municipality) {
    $address = $municipality;
}
$property_type = $property->getField('property_type');
?>
<a href='<?= $property->getUrl() ?>' class="property-item" id="<?= $property->getField('id'); ?>" data-sale-rent="<?= $property->getCustomSaleRent() ?>">
    <div class="property-item__inner">
        <div class="property-item__inner__row1">
            <div class="property-item__inner__row1__img">
                <img src="<?= $property->getFeaturedPhotoURL('medium') ?>" alt="property-image" loading="lazy" onerror="onError.call(this)"/>
            </div>
            <span class="property-item__inner__row1__sale-rent">
                <?= $sale_rent ?>
            </span>
            <div class="heart-icon wishlist-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
            </div>
        </div>
        <div class="property-item__inner__row2">
            <div class="property-item__inner__row2__details">
                <span class="property-item__inner__row2__ref">Ref: <?= $property->getField('ref') ?></span>
                <div class="property-item__inner__row2__details__name"><?= $property->get('name') ?></div>
                <div class="property-item__inner__row2__details__address"><?= $address ?></div>
                <div class="property-item__inner__row2__details__price"><?= $property->getWebsitePrice(['default_value' => '--']) ?></div>
            </div>
            <div class="property-item__inner__row2__features">
                <?= $this->element('property_features/short-layout-1', ['property' => $property, 'default' => '--', 'label_prefix' => ':']); ?>
            </div>
        </div>
    </div>
</a>