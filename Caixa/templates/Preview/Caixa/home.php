<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php $sale_rent = $query_params['sale_rent'] ?? 'for_sale'; ?>
<!-- Header -->
<?= $this->element('top-menu', ['theme_type' => 'dark']); ?>
<?php
if (!empty($site_data_options['default_property_featured_photo'])) {
    \App\Utils\Media::setDefaultPropertyPhotoUrl(\App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'default_property_featured_photo'));
}

$page = 1;
if (isset($query_params['page'])) {
    $page = $query_params['page'] ?: 1;
    unset($query_params['page']);
}

$redirect_first_result = false;
if (isset($query_params['single_search'])) {
    $redirect_first_result = true;
    unset($query_params['single_search']);
}

$token = \Caixa\Utils\CaixaToken::getId();

$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/polygonsearch');
$component_data_options = json_decode($component_data['options'], true);

$properties_page_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('properties');
?>
<!-- Hero section -->
<div class="box-border w-full lg:h-[calc(100vh_-_76px)] bg-theme-primary-color">
    <div class="container-section hero-section box-border flex flex-col w-full h-full pt-10 pb-[32px] md:pb-[76px] md:flex-row">
        <div class="box-border z-10 inline-flex flex-col justify-center flex-1">
            <h1 class="hero-title text-theme-secondary-color my-0 text-[28px] md:text-4xl lg:text-5xl xl:text-[54px] xl:leading-[60px] font-normal pb-5 lg:pb-[62px]">
                <?= $page_data_options['primary_title'] ?>
            </h1>
            <div class="w-full">
                <div class="flex gap-4 lg:gap-6 flex-col md:flex-row items-center bg-[#F6F5F3] p-4 lg:p-6 rounded-lg md:w-[120%] z-10 box-border">
                    <div class="box-border flex items-center w-full for-sale-rent-btns lg:w-auto h-[48px] md:h-auto">
                        <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--sale <?= $sale_rent !== 'for_rent' ? 'for-sale-rent-btns__item--active' : '' ?>" data-value="for_sale">Compra</div>
                        <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--rent <?= $sale_rent === 'for_rent' ? 'for-sale-rent-btns__item--active' : '' ?>" data-value="for_rent">Alquiler</div>
                    </div>
                    <div class="box-border relative flex w-full homepage-single-location-section h-auto md:h-[48px]" data-search-placeholder-lg="<?= $page_data_options['primary_search_placeholder'] ?>" data-search-placeholder-sm="<?= $page_data_options['primary_search_placeholder_mobile'] ?>">
                        <div class="w-full">
                            <div class="relative w-full">
                                <?php
                                $field_details = [
                                    'id' => 'location',
                                    'name' => 'location',
                                    'class' => 'qcf-select-ajax--single-location',
                                    'label' => $page_data_options['primary_search_placeholder'],
                                    'search_source' => 'locations',
                                ];
                                ?>
                                <?= \App\Utils\CustomFields::fieldSingleSelectAjax($field_details); ?>
                                <svg width="16" height="16" class="absolute z-10 -translate-y-1/2 fill-theme-primary-color top-1/2 right-5 px-[4px] py-[4px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7301 10.3183H10.9891L10.7265 10.065C11.852 8.75184 12.4336 6.96032 12.1147 5.05624C11.6738 2.44869 9.49772 0.366395 6.87141 0.0474853C2.9038 -0.440259 -0.435376 2.89891 0.0523681 6.86652C0.371278 9.49284 2.45357 11.6689 5.06112 12.1098C6.9652 12.4287 8.75672 11.8471 10.0699 10.7216L10.3231 10.9842V11.7252L14.3095 15.7116C14.6941 16.0961 15.3225 16.0961 15.7071 15.7116C16.0916 15.327 16.0916 14.6986 15.7071 14.314L11.7301 10.3183ZM6.10227 10.3183C3.76673 10.3183 1.88141 8.43293 1.88141 6.09739C1.88141 3.76184 3.76673 1.87653 6.10227 1.87653C8.43781 1.87653 10.3231 3.76184 10.3231 6.09739C10.3231 8.43293 8.43781 10.3183 6.10227 10.3183Z"/>
                                </svg>
                            </div>
                            <div class="search_helper"></div>
                            <div id="polygon_search_modal--btn" class="md:hidden box-border font-[FaktumNeue] font-semibold text-[var(--theme-primary-color)] w-full mt-[9px] md:mt-[10px] relative md:absolute">
                                <div id="polygon_search_modal--open" class="cursor-pointer m-auto p-[15px] rounded-lg bg-[#E5EBEC] flex items-center gap-3 border border-solid border-[var(--theme-primary-color)]">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;">
                                            <path 
                                                d="M15.1139 5.6804L18.3196 8.88603M4.90863 15.8858L3.84009 20.16L8.11425 19.0914L20.0143 7.19132C20.4149 6.79056 20.64 6.24708 20.64 5.6804C20.64 5.11372 20.4149 4.57025 20.0143 4.16948L19.8305 3.98569C19.4297 3.58505 18.8862 3.35999 18.3196 3.35999C17.7529 3.35999 17.2094 3.58505 16.8087 3.98569L4.90863 15.8858Z" 
                                                stroke="#003C46" stroke-width="0.96" stroke-linecap="square" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="text-base leading-none">
                                        <?= $component_data_options['polygon_search_title'] ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border w-full md:w-auto">
                        <button name="search_btn" id="search_btn" class="flex items-center justify-center w-full h-12 md:h-auto font-semibold btn btn-primary btn-pill"><?= $page_data_options['primary_search_btn_label'] ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="z-0 flex-1 hidden md:block xl:pt-[22px]">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="object-contain w-full h-full" alt="Hero Image" loading="lazy"/>
        </div>
    </div>
</div>

<?php if (empty($token)) : ?>
    <!-- Properties section -->
    <?php $featured_properties = \App\Connector\Property::getBestDiscountLastDays(15, 1, 6, ['sale_rent' => $sale_rent]); ?>
    <?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
        <div class="bg-[#F6F5F3]">
            <div class="container-section properties-section shadow-none border-none py-[40px] lg:py-[97.5px]">
                <h2 class="text-[18px] leading-[21.6px] min-h-[44px] md:min-h-0 lg:text-2xl xl:leading-[28.8px] font-medium mb-[32px] lg:mb-8 xl:mb-[48px] text-theme-primary-color pr-[85px] lg:pr-0 mt-0 flex items-center">
                    <?= $page_data_options['feature_properties_title'] ?>
                </h2>
                <div class="glide glide-properties">
                    <div class="pb-8 glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                        <?php foreach ($featured_properties['data'] as $property) { ?>
                            <li class="flex flex-col gap-10 glide__slide">
                                <?= $this->element('property-item', ['property' => $property]) ?>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="glide__arrows flex absolute w-full top-[-71px] md:top-[-60px] 1.5xl:top-[-78px]" data-glide-el="controls">
                        <div class="glide__arrow absolute right-[48px] lg:right-[100px] bg-[#E8E7E1] hover:bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[32px] h-[32px] rounded-full hover:cursor-pointer glide__arrow--left group" data-glide-dir="<">
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
<?php else : ?>
    <!-- Saved Searches section -->
    <?php
    $savedSearchedData = \App\Connector\Opportunity::findSavedSearches(page: 1, limit: 3);
    ?>
    <?php if (!empty($savedSearchedData['data']) && $savedSearchedData['pagination']['count'] > 0) : ?>
        <div class="bg-[#F6F5F3]">
            <div class="container-section home-saved-search-section shadow-none border-none py-[40px] lg:py-[97.5px]">
                <h4 class="pb-2 my-0 text-2xl font-normal text-theme-primary-color">
                    <?= $page_data_options['saved_searches_title'] ?>
                </h4>
                <a href="<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('saved_searches') ?>" data-num-saved="<?= $savedSearchedData['pagination']['count'] ?? 0 ?>" alt="Saved Searches link" class="saved-searches-link font-[Roboto] text-base font-semibold text-[#333] underline pb-10 inline-block pr-[85px] lg:pr-0">
                    <?= $page_data_options['saved_searches_description'] ?> (<?= $savedSearchedData['pagination']['count'] ?? 0 ?>)
                </a>
                <div class="glide glide-saved-searches">
                    <div class="pb-5 glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ($savedSearchedData['data'] as $obj) : ?>
                            <li class="flex flex-col gap-10 glide__slide">
                                <?= $this->element('saved-search-item', ['item' => $obj]); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="glide__arrows flex absolute w-full top-[-60px] md:top-[-45px] lg:top-[-60px]" data-glide-el="controls">
                        <div class="glide__arrow absolute right-[48px] lg:right-[100px] bg-[#E8E7E1] hover:bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[32px] h-[32px] rounded-full hover:cursor-pointer glide__arrow--left group" data-glide-dir="<">
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
                        <?php foreach ($savedSearchedData['data'] as $k => $v) { ?>
                            <div class="glide__bullet" data-glide-dir="=<?= $k ?>"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endif; ?>

<!-- Features section -->
<?= $this->element('features-services-list'); ?>

<!-- Location section -->
<?php if (!empty($page_data_options['popular_location_list'])) : ?>
    <div class="bg-[#FAFAF9] <?= count($page_data_options['popular_location_list']['location_title']) < 7 ? 'block lg:hidden' : '' ?>">
        <div class="container-section popular-locations-section text-center">
            <div class="popular-locations-title px-10 pt-10 mb-6 text-2xl font-normal text-center lg:text-[38px] lg:leading-[45.6px] text-theme-primary-color lg:pt-[96px]">
                <?= $page_data_options['popular_location_section_title'] ?>
            </div>
            <div class="location-group location-section-lg">
                <?php $location_string = '' ?>
                <?php foreach (array_keys($page_data_options['popular_location_list']['location_title']) as $k => $uid) : ?>
                    <?php
                    ob_start();
                    ?>
                        <div class="cursor-pointer location-group__item location-group__item--<?= $k ?>" data-url="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?><?= h($page_data_options['popular_location_list']['location_qobrix_url'][$uid]) ?>">
                            <div class="location-group__item__inner">
                                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['popular_location_list']['location_img'], $uid); ?>" class="w-full h-[160px] object-cover z-0" alt="<?= $page_data_options['popular_location_list']['location_title'][$uid] ?>" loading="lazy"/>
                                <div class="location-group__item__inner__label">
                                    <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?><?= h($page_data_options['popular_location_list']['location_qobrix_url'][$uid]) ?>">
                                        <?= $page_data_options['popular_location_list']['location_title'][$uid] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    $location_string .= ob_get_clean();
                    if (in_array($k, [0,2,3,5,6])) { ?>
                        <div class="col col--<?= $k ?>"><?= $location_string ?></div>
                        <?php
                        $location_string = '';
                    }
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="location-group location-section-sm"></div>
        </div>
    </div>
<?php endif; ?>

<!-- User search section -->
<?php if (!empty($page_data_options['user_search_list'])) : ?>
    <?php ksort($page_data_options['user_search_list']['user_search_list_descr']); ?>
    <div class="container-section user-search-section xl:px-[120px] py-10 1.5xl:py-[96px]">
        <h2 class="user-search-title mb-[24px] 1.5xl:mb-10 mt-0 text-[28px] leading-[33.6px] 1.5xl:text-[38px] 1.5xl:leading-[45.6px] font-normal text-center lg:text-[38px] text-theme-primary-color lg:leading-[45.6px]">
            <?= $page_data_options['user_search_section_title'] ?>
        </h2>
        <div class="user-search-list flex flex-col flex-wrap justify-center gap-6 shortcut-section lg:flex-row">
            <?php foreach ($page_data_options['user_search_list']['user_search_list_descr'] as $uid => $descr) : ?>
                <div class="user-search-list__item relative xl:w-[384px] xl:min-h-[327px] flex flex-col md:flex-row lg:flex-col flex-1 items-center justify-center rounded-[24px] bg-[#F1F1ED] cursor-pointer group box-border min-h-[295px]" data-search-string="<?= h($page_data_options['user_search_list']['user_search_list_qobrix_url'][$uid]) ?>">
                    <div class="p-6 xl:px-[42px] xl:pt-10 xl:pb-6 md:group-even:order-2 md:group-odd:order-1 lg:group-even:order-1 inline-flex">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['user_search_list']['user_search_list_img'], $uid); ?>" class="w-full h-[160px] object-fill" alt="<?= $page_data_options['user_search_list']['user_search_list_img_label'][$uid] ?: 'User custom search logo' ?>" loading="lazy"/>
                    </div>
                    <div class="flex flex-col items-center justify-center flex-1 px-6 pb-6 xl:px-[42px] md:pb-0 lg:pb-6 xl:pb-10 md:group-even:order-1 md:group-odd:order-2 lg:group-even:order-2">
                        <span class="no-underline text-[#333333] leading-[20.8px] flex flex-1 justify-center items-start text-center text-base font-[Roboto] box-border">
                            <?= $descr ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<!-- Mortgage Section -->
<div class="bg-[#E5EBEC]">
    <div class="container-section p-5 lg:py-[96px]">
        <div class="flex gap-6 p-6 bg-white rounded-2xl lg:p-10">
            <div class="items-center hidden lg:inline-flex">
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'mortgage_img'); ?>" class="w-[300px] h-[300px] object-cover rounded-[16px]" alt="Mortgage image" loading="lazy"/>
            </div>
            <div class="flex flex-col justify-center flex-1">
                <div class="inline-flex flex-row flex-wrap gap-2 md:gap-0 pb-4 md:items-center lg:pb-5">
                    <div class="flex items-center order-2 md:order-1">
                        <h2 class="text-[24px] leading-[28.8px] font-semibold 1.5xl:text-[28px] 1.5xl:leading-[33.6px] text-theme-primary-color my-0 mortgage-title"><?= $page_data_options['mortgage_title'] ?></h2>
                    </div>
                    <?php if (!empty($page_data_options['mortgage_title_img'])) { ?>
                        <div class="inline-flex order-3 md:order-2">
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'mortgage_title_img'); ?>" class="h-[40px] w-[119px] 1.5xl:h-[48px] 1.5xl:w-[142.8px] object-contain" alt="Mortgage logo" loading="lazy"/>
                        </div>
                    <?php } ?>
                    <?php if (!empty($page_data_options['mortgage_sub_title'])) { ?>
                        <div class="order-1 md:order-3 basis-full md:basis-auto mb-[8px] md:mb-0 md:ml-[16px]">
                            <span class="rounded-2xl p-[8px] font-[Roboto] font-medium text-[14px] bg-[#EBF5EF] text-[#03873C] leading-[16.41px]"><?= $page_data_options['mortgage_sub_title'] ?>
                            </span>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-[14px] leading-[16.41px] lg:text-[18px] lg:leading-[21.6px] text-[#333333] pb-4 mb-4 font-[Roboto] mortgage-description <?= !empty($page_data_options['mortgage_services_list']) ? 'border-0 border-b border-solid border-[#E8E7E1]' : '' ?>"><?= $page_data_options['mortgage_descr'] ?></div>
                <div class="">
                    <!-- Mortgage services -->
                    <?php if (!empty($page_data_options['mortgage_services_list'])) : ?>
                        <div class="flex flex-col lg:flex-row flex-wrap gap-2 1.5xl:gap-6 pb-5 lg:pb-10">
                            <?php foreach ($page_data_options['mortgage_services_list']['mortgage_services_list_title'] as $uid => $title) : ?>
                                <div class="inline-flex lg:justify-center items-center gap-2 1.5xl:gap-4 text-[18px] leading-[20.8px] 1.5xl:leading-[21.6px] font-semibold text-[#003C46] font-[Roboto]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#E5E7FF"/>
                                        <path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <?= $title ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <a target="_blank" href="<?= $page_data_options['mortgage_btn_link'] ?>" class="inline-block btn btn-md-c btn-primary btn-pill mortgage-btn caixa-utm-params">
                        <?= $page_data_options['mortgage_btn_label'] ?>
                        <svg width="12" height="12" class="pl-[8px]" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.814551 5.99998H11.1854H0.814551Z" fill="white"/>
                            <path d="M0.814551 5.99998H11.1854" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 11.1854L11.1854 5.99998L6 0.814526" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location section -->
<?= $this->element('location-zones'); ?>
<div class="contact-form-popup">
    <div class="contact-form-popup__inner">
        <?= $this->element('contact-form') ?>
    </div>
</div>
<!-- Polygon Search Modal -->
<div id="polygon_search_modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-end md:items-center opacity-0 pointer-events-none transition-opacity duration-200 z-[1001]">
    <div class="w-full md:container-section">
        <div class="bg-white pt-[18px] px-0 md:px-6 pb-0 md:pb-10 rounded-none md:rounded-3xl min-h-[300px] overflow-y-auto">
            <div id="polygon_search_modal--close" class="flex justify-end p-2 pr-[26px] md:pr-2 cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="display:block;">
                        <path d="M3.5 3.49988L20.4 20.4" stroke="#333333" stroke-linecap="square"
                            stroke-linejoin="round" />
                        <path d="M3.5 20.4994L20.4 3.59949" stroke="#333333" stroke-linecap="square"
                            stroke-linejoin="round" />
                    </svg>
            </div>
            <div id="polygon_search_modal--title"
                    class="px-6 md:px-0 text-lg md:text-[28px] text-black font-medium leading-[1.3] mb-4 md:mb-6">
                    <?= $component_data_options['polygon_search_title'] ?>
            </div>
            <div class="relative w-full h-[full]">
            <?php // @codingStandardsIgnoreStart ?>
                <?= $this->element('maps/polygon', [
                    'id' => 'map-polygon',
                    'map_defaults' => [
                        'scrollWheelZoom' => true,
                        'center' => [
                            40.39842296004511,
                            -3.6977145712057866,
                        ],
                        'zoom' => 5,
                    ],
                    'popup_html_callback' => 'exampleFunction',
                    'markers' => []
                ]); ?>
                <?php // @codingStandardsIgnoreEnd ?>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?= $this->element('footer'); ?>
<?php $component_imagin_data_options = \Caixa\Utils\CaixaFunctions::getImaginDetails(); ?>
<script>
    const location_properties = <?= !empty($page_data_options['popular_location_list']) ? json_encode($page_data_options['popular_location_list']) : '{}' ?>;
    const properties_slug = '/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>';
    const page_category = '<?= \App\Utils\IntegrationsTealium::getPageCategory($this->getRequest()); ?>';

    document.addEventListener('caixa-imagin-detected', function(){
        const mortgageFeatureItems = document.querySelectorAll(".mortgage-feature-item");
        mortgageFeatureItems.forEach((item) => {
            item.querySelector('.feature-title').innerText = '<?= $component_imagin_data_options['imagin_title'] ?>';
            item.querySelector('.feature-description').innerText = '<?= $component_imagin_data_options['imagin_description'] ?>';
            item.querySelector('img').src = '<?= $component_imagin_data_options['imagin_img'] ?>';
        });

        const mortgageTitles = document.querySelectorAll(".mortgage-title");
        mortgageTitles.forEach((title) => {
            title.innerText = '<?= $component_imagin_data_options['imagin_title'] ?>.';
        });

        const mortgageDescriptions = document.querySelectorAll(".mortgage-description");
        mortgageDescriptions.forEach((descr) => {
            descr.innerText = '<?= $component_imagin_data_options['imagin_description'] ?>';
        });
    });

    const componentDataOptions = <?= json_encode($component_data_options ?? []) ?>;
    const polygon_search_enabled_text = componentDataOptions['polygon_search_enabled_text'];
    const polygon_search_disabled_text = componentDataOptions['polygon_search_disabled_text'];
    const polygon_search_enabled_button_text = componentDataOptions['polygon_search_enabled_button_text'];
    const polygon_search_cancel_button_text = componentDataOptions['polygon_search_cancel_button_text'];
    const polygon_search_draw_again_text = componentDataOptions['polygon_search_draw_again_text'];
    const properties_url = <?= json_encode($properties_page_url) ?>;
</script>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
<?php endif; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/config.js'); ?>
<?= $this->html->script('/general/js/routing.js'); ?>
<?= $this->html->script('/caixa/js/home.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
<?= $this->html->script('/caixa/js/contact-us-form.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/caixa/js/properties-common.js'); ?>
<?= $this->html->script('/caixa/js/polygon-search.js'); ?>