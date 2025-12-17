<?php

use App\Utils\IntegrationsTealium;

$website_url = $property->getField('website_url');

$property_url = \Caixa\Utils\CaixaFunctions::customWebsiteUrlParser($property, $site_data_options);

$sale_rent = $property->getField('sale_rent');
$district = $property->getLocation()->get('district');
$municipality = $property->getLocation()->get('area');
$address = $district;
if ($district && $municipality) {
    $address .= ', ' . $municipality;
} elseif ($municipality) {
    $address = $municipality;
}

$property_type = $property->getField('property_type');

$agent_id = $property->getField('agent');

$agent_brand = \App\Connector\Brand::getAgentInfo($property->getField('agent'));
$agent_logo = '';
$agent_mobile = '';
$agent_brand_logo = '';
$agent_name = '';
if (!empty($agent_brand)) {
    $agent_logo = $agent_brand->getPhotoUrl('logo', 'medium', false);
    $agent_mobile = $agent_brand->get('tel_office') ?: $agent_brand->get('tel_mobile');
    $agent_brand_logo = $agent_brand->getPhotoUrl('logo');
    $agent_name = $agent_brand->get('name');
}
?>
<a href='<?= $property_url ?>'
    id="<?= $property->getField('id'); ?>"
    class="property-item property-grid-item<?= !empty($website_url) ? ' property-item--website-url' : '' ?>"
    data-sale-rent="<?= $property->getCustomSaleRent() ?>"
    data-sale-rent-raw="<?= $property->get('sale_rent') ?>"
    data-agent-phone="<?= $agent_mobile ?>"
    data-agent-logo="<?= $agent_brand_logo ?>"
    data-agent="<?= $agent_name ?>"
    data-agent-id="<?= $property->getField('agent') ?>"
    data-property-type="<?= $property->get('property_type') ?>"
    data-ref="<?= $property->get('ref') ?>"
    data-original-ref="<?= $property->get('original_ref') ?>"
    data-has-website-url="<?= !empty($website_url) ? 'true' : 'false' ?>"
    data-category="<?= IntegrationsTealium::getPropertyCategory($property->get('property_type')) ?>"
    data-subcategory="<?= IntegrationsTealium::getPropertyCategory($property->get('property_subtype')) ?>"
    data-rooms="<?= $property->getField('bedrooms') ?>"
    data-bathrooms="<?= $property->getField('bathrooms') ?>"
    data-surface="<?= $property->get('internal_area_amount') ?>"
    data-energy-cert="<?= $property->getField('energy_efficiency_grade') ?>"
    data-state="<?= $property->getLocation()->get('district') ?>"
    data-status=""
    data-pvp-price="<?= $property->getRawWebsitePrice() ?>"
    data-pvp-sale="<?= \Caixa\Utils\Caixa::getCaixaReducedPricePercentage($property) ?>"
    data-floor="<?= $property->getField('floor_number') ?>"
    data-construction-stage="<?= $property->getField('construction_stage') ?>"
    data-website-status="<?= strtolower($property->getField('status')) ?>"
    data-publication-date="<?= $property->getField('website_listing_date') ?>"
    data-characteristics="<?= \Caixa\Utils\Caixa::getPropertyCharacteristics($property) ?>"
    data-other-filters="<?= \Caixa\Utils\Caixa::getPropertyOtherFilters($property) ?>">
    <div class="property-item__inner">
        <div class="property-item__inner__row1">
            <div class="property-item__inner__row1__div">
                <div class="box-border qoetix-gallery-section qoetix-gallery <?= !empty($website_url) ? 'has-website-url' : '' ?>" data-pagination='1'>
                    <img src="<?= $property->getFeaturedPhotoURL('medium') ?>" alt="property-image" loading="lazy" class="w-full h-full object-cover rounded-[16px]" onerror="featuredPhotoOnError(this)"/>
                </div>
                <?php if (!empty($agent_logo)) { ?>
                    <div class="property-item__inner__row1__div__agent">
                        <img src="<?= $agent_logo ?>" alt="agent-logo" loading="lazy" class="property-item__inner__row1__div__agent__logo" onerror="agentPhotoOnError(this)"/>
                    </div>
                <?php } ?>
            </div>
            <div class="heart-icon wishlist-btn">
                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.465 15.6077C9.21 15.6977 8.79 15.6977 8.535 15.6077C6.36 14.8652 1.5 11.7677 1.5 6.5177C1.5 4.2002 3.3675 2.3252 5.67 2.3252C7.035 2.3252 8.2425 2.9852 9 4.0052C9.7575 2.9852 10.9725 2.3252 12.33 2.3252C14.6325 2.3252 16.5 4.2002 16.5 6.5177C16.5 11.7677 11.64 14.8652 9.465 15.6077Z" fill="none" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="property-item__inner__row2">
            <div class="property-item__inner__row2__details">
                <div class="property-item__inner__row2__details__name"><?= $property->get('name') ?></div>
                <div class="property-item__inner__row2__details__price">
                    <?= $property->getWebsitePrice(['default_value' => '--']) ?>
                    <?php
                    $price_diff = $property->getWebsitePriceDifference();
                    if (!empty($price_diff) && $price_diff < 0) {
                        ?>
                        <span class="price-diff price-diff--down">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.9999 2.81455V13.1854V2.81455Z"/>
                                <path d="M7.9999 2.81455V13.1854" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.81445 8L7.9999 13.1854L13.1854 8" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span><?= \App\Utils\CommonFunctions::getDataFormat(abs($price_diff), '', ['unit' => 'currency'], true) ?></span>
                        </span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="property-item__inner__row2__features">
                <?= $this->element('features_short', ['property' => $property]); ?>
            </div>
            <div class="property-item__inner__row2__agent">
                <button class="btn btn-primary btn-pill font-semibold contact-us-btn"><?= $page_data_options['feature_properties_contact_btn'] ?></button>
            </div>
        </div>
    </div>
</a>
