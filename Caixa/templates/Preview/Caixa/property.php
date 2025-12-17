<?php

namespace App\Utils;

use Cake\Validation\Validation;

$website_url = $property->getField('website_url');

if (!empty($website_url) && Validation::url($website_url)) {
    $redirect_url = \Caixa\Utils\CaixaFunctions::customWebsiteUrlParser($property, $site_data_options);

    $this->response = $this->response->withHeader('Location', $redirect_url);
    $this->response = $this->response->withStatus(302);

    return $this->response;
}

$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/contact-us-form');
$component_data_options = json_decode($component_data['options'], true);
?>
<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-property'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<?php
if (!empty($site_data_options['default_property_featured_photo'])) {
    \App\Utils\Media::setDefaultPropertyPhotoUrl(\App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'default_property_featured_photo'));
}
$price_without_currency = $property->getRawWebsitePrice();
$district = $property->getLocation()->get('district');
$municipality = $property->getLocation()->get('area');
$street = $property->getField('street');
$address = implode(', ', array_filter([$district, $municipality]));

$agent_phone = '';
$agent_brand = \App\Connector\Brand::getAgentInfo($property->getField('agent'));

$agent_id = 'na';
$agent_name = 'na';
if (!empty($agent_brand)) {
    $agent_phone = $agent_brand->get('tel_office') ?: $agent_brand->get('tel_mobile');
    $agent_info = $agent_brand->get('agent');
    $agent_id = $agent_info['ref'] ?? '';
    $agent_name = $agent_info['name'] ?? '';
}
$back_link = \Caixa\Utils\Caixa::getBackLink($property->getCustomSaleRent(), $district, $municipality);
$tealium_data = [
    'events' => 'pageview,prodView',
    'page_subcategory2' => \Caixa\Utils\Caixa::getCaixaSaleRentValue($property->getCustomSaleRent()),
    'prod_category' => \App\Utils\IntegrationsTealium::getPropertyCategory($property->get('property_type')),
    'prod_id' => $property->get('ref'),
    'prod_rooms' => $property->getField('bedrooms'),
    'prod_bathrooms' => $property->getField('bathrooms'),
    'prod_type' => \App\Utils\IntegrationsTealium::getPropertyCategory($property->get('property_subtype')),
    'prod_surface' => $property->get('internal_area_amount'),
    'prod_status' => $property->getField('construction_stage') === 'completed' ? 'obra nueva' : '',
    'prod_floor' => $property->getField('floor_number'),
    'prod_state' => $district,
    'prod_energy_cert' => $property->getField('energy_efficiency_grade'),
    'prod_pvp_price' => $price_without_currency,
    'prod_pvp_sale' => \Caixa\Utils\Caixa::getCaixaReducedPricePercentage($property),
    'prod_owner' => !empty($agent_brand) ? $agent_brand->get('name') : '',
    'prod_publication_status' => strtolower($property->getField('status')),
    'prod_publication_date' => $property->getField('website_listing_date'),
    'prod_characteristics' => \Caixa\Utils\Caixa::getPropertyCharacteristics($property),
    'prod_otherfilters' => \Caixa\Utils\Caixa::getPropertyOtherFilters($property),
];
?>
<div class="property-single-page property-item" id="<?= $property->get('id') ?>" data-ref="<?= $property->get('ref') ?>" data-sale-rent="<?= $property->getCustomSaleRent() ?>">
    <div class="md:container-section">
        <div class="px-5 py-6 md:px-0">
            <a href="#" class="flex items-center gap-2 no-underline back-link" data-back-link="<?= $back_link ?>">
                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 9L1 5L5 1" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="p-0 py-[1px] font-[Roboto] text-sm text-[#333333]"><?= \Caixa\Utils\Caixa::getPropertyBacklinkTitle($property) ?></span>
            </a>
        </div>
    </div>
    <!-- Gallery -->
    <div class="relative md:container-section">
        <?= $this->element('gallery', ['obj' => $property, 'contact_label' => $component_data_options['contact_us_btn_label'], 'phone_label' => $component_data_options['contact_us_header_btn_label']]); ?>
    </div>
    <div class="md:container-section">
        <!-- Property Details -->
        <div class="flex flex-col pt-8 lg:flex-row lg:gap-6">
            <div class="flex flex-col gap-8 lg:w-1/2 xl:w-[62%]">
                <!-- Box 1 -->
                <div class="relative p-5 bg-white rounded-3xl">
                    <div class="flex flex-col gap-5 lg:flex-row">
                        <h1 class="text-[26px] lg:text-4xl text-theme-primary-color font-normal my-0 flex-1 property-name 1.5xl:pr-[160px]">
                            <?= $property->get('name') ?>
                        </h1>
                    </div>
                    <div class="pt-3 pb-6">
                        <span class="text-lg text-[#333]"><?= $address ?></span>
                        <a href="#property-map" class="pl-5 text-base font-semibold text-theme-primary-color">Mostrar en mapa</a>
                    </div>
                    <div>
                        <span class="text-[#003C46] text-[26px] lg:text-4xl font-semibold property-price"><?= $property->getWebsitePrice(['default_value' => '--']) ?></span>
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
                    <div class="property-page-actions pt-4 1.5xl:absolute 1.5xl:top-0 1.5xl:right-5">
                            <div class="clear-both a2a_kit a2a_kit_size_25 a2a_default_style" data-class="a2a_menu a2a_full">
                                <a class="a2a_dd share-all ignore-c-modal" href="https://www.addtoany.com/share">
                                    <span class="a2a_svg">
                                        <svg width="40" height="40" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.2803 15.4696L17.2802 9.46959C17.1754 9.36473 17.0417 9.29333 16.8963 9.2644C16.7508 9.23548 16.6 9.25033 16.463 9.30708C16.326 9.36383 16.2089 9.45994 16.1264 9.58325C16.044 9.70655 16 9.85153 16 9.99984V12.6586C13.9512 12.8482 12.0469 13.7955 10.6598 15.3151C9.27262 16.8347 8.50245 18.8173 8.5 20.8748V21.9998C8.50012 22.1555 8.54868 22.3073 8.63896 22.4342C8.72923 22.561 8.85674 22.6566 9.00379 22.7077C9.15085 22.7588 9.31017 22.7629 9.45965 22.7194C9.60913 22.6759 9.74136 22.5869 9.838 22.4648C10.5729 21.5912 11.4745 20.8727 12.4901 20.3513C13.5057 19.8299 14.615 19.5161 15.7532 19.4281C15.7907 19.4236 15.8845 19.4161 16 19.4086V21.9998C16 22.1482 16.044 22.2931 16.1264 22.4164C16.2089 22.5397 16.326 22.6358 16.463 22.6926C16.6 22.7494 16.7508 22.7642 16.8963 22.7353C17.0417 22.7064 17.1754 22.6349 17.2802 22.5301L23.2803 16.5301C23.4209 16.3894 23.4998 16.1987 23.4998 15.9998C23.4998 15.801 23.4209 15.6102 23.2803 15.4696ZM17.5 20.1893V18.6248C17.5 18.4259 17.421 18.2352 17.2803 18.0945C17.1397 17.9539 16.9489 17.8748 16.75 17.8748C16.5588 17.8748 15.778 17.9123 15.5785 17.9386C13.5571 18.1246 11.633 18.8926 10.039 20.1496C10.2199 18.4954 11.0047 16.9661 12.2429 15.8545C13.4812 14.7428 15.086 14.127 16.75 14.1248C16.9489 14.1248 17.1397 14.0458 17.2803 13.9052C17.421 13.7645 17.5 13.5738 17.5 13.3748V11.8103L21.6895 15.9998L17.5 20.1893Z" fill="#003C46"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="heart-icon wishlist-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.465 15.6077C9.21 15.6977 8.79 15.6977 8.535 15.6077C6.36 14.8652 1.5 11.7677 1.5 6.5177C1.5 4.2002 3.3675 2.3252 5.67 2.3252C7.035 2.3252 8.2425 2.9852 9 4.0052C9.7575 2.9852 10.9725 2.3252 12.33 2.3252C14.6325 2.3252 16.5 4.2002 16.5 6.5177C16.5 11.7677 11.64 14.8652 9.465 15.6077Z" fill="none" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                    </div>
                    <div class="bg-[#E8E7E1] h-[1px] my-5"></div>
                    <div class="flex flex-wrap gap-2 property-features">
                        <?= $this->element('features_short'); ?>
                    </div>
                </div>
                <!-- Box 2 -->
                <div class="p-5 bg-white rounded-3xl">
                    <div class="text-[#333]"><?= nl2br($property->getField('description')) ?></div>
                    <div class="bg-[#E8E7E1] h-[1px] my-5"></div>
                    <div>
                        <?= $this->element('features_full'); ?>
                    </div>
                    <div>
                        <?= $this->element('features_full_extra'); ?>
                    </div>
                </div>
                <!-- Box 3 -->
                <div class="p-5 bg-white rounded-3xl">
                    <h2 class="mt-0 mb-4 text-2xl font-semibold text-theme-primary-color"><?= $page_data_options['price_section_title'] ?></h2>
                    <div class="flex flex-col gap-[16px] xl:flex-row">
                        <div class="flex flex-col flex-1 justify-center">
                            <div class="flex">
                                <div class="min-w-[170px] flex-1 md:flex-initial"><?= $page_data_options['price_label'] ?></div>
                                <div class="font-semibold text-theme-primary-color"><?= $property->getWebsitePrice(['default_value' => '--']) ?></div>
                            </div>
                            <div class="flex">
                                <div class="min-w-[170px] flex-1 md:flex-initial"><?= $page_data_options['price_label_per_sqr'] ?></div>
                                <div class="font-semibold text-theme-primary-color"><?= $property->getField('price_per_square', ['default_value' => '--']) ?>/m²</div>
                            </div>
                        </div>
                        <div>
                            <span class="price-drop price-drop--active"><?= $page_data_options['price_btn_label'] ?></span>
                            <span class="price-drop-in-wishlist">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#D7DBFF"/>
                                        <path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <?= $page_data_options['price_btn_wishlist_label'] ?></span>
                        </div>
                    </div>
                </div>
                <!-- Box 4 -->
                <?php if ($property->getCustomSaleRent() === 'for_sale') : ?>
                <div class="flex flex-wrap items-center gap-4 p-5 rounded-3xl" style="background-color: <?= $page_data_options['mortgage_bg_color'] ?>">
                    <div class="basis-full xl:basis-0">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'mortgage_icon'); ?>" class="object-contain aspect-square h-[40px] md:h-[60px] property-mortgage-img" alt="Calcular hipoteca bancaria" loading="lazy"/>
                    </div>
                    <div class="flex-1">
                        <div class="text-lg font-semibold md:text-2xl text-theme-primary-color property-mortgage-title"><?= $page_data_options['mortgage_title'] ?></div>
                        <div class="font-[Roboto] property-mortgage-description"><?= $page_data_options['mortgage_descr'] ?></div>
                    </div>
                    <div>
                        <a href="<?= $page_data_options['mortgage_btn_link'] . '?corp:nf-faciliteacasa:nm-fichainmueble&origen=faciliteacasa&paramInPrecioVivienda=' . (int)$price_without_currency . '&idApi=' . $agent_id . '&api=' . $agent_name . '&refInmueble=' . $property->get('ref') . '&tipoObra=' . ($property->get('new_build') ? 'obranueva' : 'segundamano') . '&provincia=' . $district ?>" target="_blank" title="Mortgage link" class="caixa-utm-params mortgage-link mortgage-btn">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="1" width="39" height="39" rx="19.5" fill="white"/>
                                <rect x="0.5" y="1" width="39" height="39" rx="19.5" stroke="#003C46"/>
                                <path d="M18 24.5L22 20.5L18 16.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <!-- Box 5 -->
                <div class="p-5 bg-white rounded-3xl" id="property-map">
                    <h2 class="my-0 text-2xl font-semibold text-theme-primary-color"><?= $page_data_options['map_title'] ?></h2>
                    <div class="flex flex-col gap-3 py-3 md:flex-row md:items-center">
                        <div class="font-[Roboto] flex-1"><?= implode(', ', array_filter([$district, $municipality, $street])); ?></div>
                        <div><button class="font-medium btn btn-md-c btn-secondary btn-pill map-form-btn"><?= $page_data_options['map_btn_label'] ?></button></div>
                    </div>
                    <div class="box-border w-full my-4 responsive-map">
                        <?php
                        $coordinates = $property->getField('coordinates');
                        $markers = [];
                        $maps_defaults = [
                            'center' => [
                                40.4380986,
                                -3.8443431,
                            ],
                        ];
                        if (!empty($coordinates)) {
                            $markers = [
                                [
                                    'coordinates' => $coordinates,
                                    'popupDetails' => \App\Connector\Property::getMapDetails(property: $property),
                                ],
                            ];
                        }
                        ?>
                        <?= $this->element('maps/single', ['markers' => $markers, 'popup_html_callback' => 'caixaMapPopup', 'map_defaults' => $maps_defaults]); ?>
                    </div>
                    <div class="text-sm font-[Roboto]"><?= $page_data_options['map_small_txt'] ?></div>
                </div>

                <!-- Box 6 -->
                <div class="flex flex-wrap items-center gap-4 p-5 rounded-3xl" style="background-color: <?= $page_data_options['information_bg_color'] ?>">
                    <div class="basis-full md:basis-0">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'information_icon'); ?>" class="object-contain aspect-square h-[40px] md:h-[60px]" alt="Information Image" loading="lazy"/>
                    </div>
                    <div class="flex-1">
                        <div class="text-lg font-semibold md:text-2xl text-theme-primary-color"><?= $page_data_options['information_title'] ?></div>
                        <div class="font-[Roboto]"><?= $page_data_options['information_descr'] ?></div>
                    </div>
                    <div>
                        <a href="<?= $page_data_options['information_btn_link'] ?>" target="_blank" title="Information link">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="1" width="39" height="39" rx="19.5" fill="white"/>
                                <rect x="0.5" y="1" width="39" height="39" rx="19.5" stroke="#003C46"/>
                                <path d="M18 24.5L22 20.5L18 16.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Form Column -->
            <div class="flex-1 single-page-contact-form">
                <?= $this->element('contact-form', ['property' => $property]) ?>
                <!-- Box 4 -->
                <?php if ($property->getCustomSaleRent() === 'for_sale') : ?>
                <div class="hidden lg:flex flex-wrap items-center gap-4 p-5 rounded-3xl shadow-[0_4px_10px_0_rgba(0,0,0,0.1)] mt-6" style="background-color: <?= $page_data_options['mortgage_bg_color'] ?>">
                    <div class="basis-full xl:basis-0">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'mortgage_icon'); ?>" class="object-contain aspect-square h-[40px] md:h-[52px] property-mortgage-img" alt="Calcular hipoteca bancaria" loading="lazy"/>
                    </div>
                    <div class="flex-1">
                        <div class="text-[22px] leading-tight font-semibold text-theme-primary-color property-mortgage-title"><?= $page_data_options['mortgage_title'] ?></div>
                    </div>
                    <div>
                        <a href="<?= $page_data_options['mortgage_btn_link'] . '?corp:nf-faciliteacasa:nm-fichainmueble&origen=faciliteacasa&paramInPrecioVivienda=' . (int)$price_without_currency . '&idApi=' . $agent_id . '&api=' . $agent_name . '&refInmueble=' . $property->get('ref') . '&tipoObra=' . ($property->get('new_build') ? 'obranueva' : 'segundamano') . '&provincia=' . $district ?>" target="_blank" title="Mortgage link" class="caixa-utm-params mortgage-link mortgage-btn">
                            <div class="w-8">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto block">
                                    <rect x="0.5" y="1" width="39" height="39" rx="19.5" fill="white"/>
                                    <rect x="0.5" y="1" width="39" height="39" rx="19.5" stroke="#003C46"/>
                                    <path d="M18 24.5L22 20.5L18 16.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- Similar Properties section -->
<?php
$featured_properties = \App\Connector\Property::getSimilarProperties($property, 6, ['district' => $district, 'area' => $municipality, 'price' => $price_without_currency]);
?>
<?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
    <div class="bg-[#F6F5F3]">
        <div class="py-10 border-none shadow-none container-section properties-section">
            <div class="text-lg lg:text-2xl font-medium mb-4 lg:mb-8 text-theme-primary-color pr-[68px] lg:pr-0">
                <?= $page_data_options['similar_properties_title'] ?>
            </div>
            <div class="glide glide-properties">
                <div class="pb-5 glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                    <?php foreach ($featured_properties['data'] as $property_obj) { ?>
                        <li class="flex flex-col gap-10 glide__slide">
                            <?= $this->element('property-item', ['property' => $property_obj]) ?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="glide__arrows flex absolute w-full top-[-60px] md:top-[-45px] lg:top-[-60px]" data-glide-el="controls">
                    <div class="glide__arrow absolute right-[35px] lg:right-[100px] bg-[#E8E7E1] hover:bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[32px] h-[32px] rounded-full hover:cursor-pointer glide__arrow--left group" data-glide-dir="<">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" class="stroke-black group-hover:stroke-white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 16H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 21L10 16L15 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="glide__arrow absolute right-0 lg:right-[50px] bg-[#E8E7E1] hover:bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[32px] h-[32px] rounded-full hover:cursor-pointer glide__arrow--right group" data-glide-dir=">">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" class="stroke-black group-hover:stroke-white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 16H21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 21L22 16L17 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
                    <?php foreach ($featured_properties['data'] as $k => $property) { ?>
                        <div class="glide__bullet" data-glide-dir="=<?= $k ?>"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?= $this->element('footer'); ?>

<div class="property-footer-buttons flex lg:hidden p-5 <?= !empty($agent_brand) ? 'justify-between' : 'justify-center'; ?> items-center sticky bottom-0 bg-white shadow-[0_-2px_4px_rgba(0,0,0,0.05)]">
    <div class="m-mortgage-icon">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'mobile_mortgage_icon', false) ?: '/caixa/images/m-mortgage-icon-v1.png'; ?>" class="object-contain aspect-square w-[52px] h-[52px]" alt="Calcular hipoteca bancaria" loading="lazy"/>
    </div>
    <div class="m-mortgage-box">
        <div class="flex flex-row flex-wrap items-center gap-4 p-4 rounded-3xl shadow-[0_4px_10px_0_rgba(0,0,0,0.1)]" style="background-color: <?= $page_data_options['mortgage_bg_color'] ?>">
            <div class="block w-[52px] h-[52px]"></div>
            <div class="flex-1">
                <div class="text-[16px] font-[Roboto] leading-[130%] font-medium text-theme-primary-color property-mortgage-title">Simulador de hipotecas CaixaBank</div>
            </div>
            <div>
                <a href="<?= $page_data_options['mortgage_btn_link'] . '?corp:nf-faciliteacasa:nm-fichainmueble&origen=faciliteacasa&paramInPrecioVivienda=' . (int)$price_without_currency . '&idApi=' . $agent_id . '&api=' . $agent_name . '&refInmueble=' . $property->get('ref') . '&tipoObra=' . ($property->get('new_build') ? 'obranueva' : 'segundamano') . '&provincia=' . $district ?>" target="_blank" title="Mortgage link" class="caixa-utm-params mortgage-link mortgage-btn">
                    <div class="w-8">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto block">
                            <rect x="0.5" y="1" width="39" height="39" rx="19.5" fill="white"/>
                            <rect x="0.5" y="1" width="39" height="39" rx="19.5" stroke="#003C46"/>
                            <path d="M18 24.5L22 20.5L18 16.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="w-full">
        <button class="open-contact-form-btn min-w-[150px] btn btn-primary w-full btn-pill font-semibold" type="submit">
            <?= $component_data_options['contact_us_btn_label'] ?>
        </button>
    </div>
</div>
<?= $this->render('/Preview/general/footer'); ?>
<script>
    const event_data = <?= json_encode($tealium_data); ?>;

    document.addEventListener('caixa-imagin-detected', function(){
        const mortgagePropertyTitles = document.querySelectorAll(".property-mortgage-title");
        mortgagePropertyTitles.forEach((item) => {
            item.innerText = "Simulador de hipotecas imaginBank";
        });

        const mortgagePropertyDescription = document.querySelectorAll(".property-mortgage-description");
        mortgagePropertyDescription.forEach((item) => {
            item.innerText = "Puedes simular la cuota con la calculadora de hipotecas imaginBank .";
        });

        const mortgagePropertyImg = document.querySelectorAll(".property-mortgage-img");
        mortgagePropertyImg.forEach((item) => {
            item.src = '/caixa/images/imagin-feature-logo.webp';
        });
    });
</script>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
    <script>
        if (typeof TealiumTracker !== 'undefined') {
            const tealium_detail_object = new TealiumTracker();
            tealium_detail_object.trackEvent(event_data, 'view');
        }
    </script>
<?php endif; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->html->script('/general/js/wishlist.js', ['defer' => true]); ?>
<?= $this->html->script('/caixa/js/properties-common.js', ['defer' => true]); ?>
<?= $this->html->script('/caixa/js/gallery.js', ['defer' => true]); ?>
<?= $this->html->script('/plugins/glide/glide.min.js', ['defer' => true]); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js', ['defer' => true]); ?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<?= $this->html->script('/caixa/js/property.js', ['defer' => true]); ?>

