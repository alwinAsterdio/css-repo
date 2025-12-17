<?php
$color_list = [];
if (!empty($page_data_options['properties_status_list'])) {
    foreach ($page_data_options['properties_status_list']['status'] as $k => $v) {
        $color_list[$v] = $page_data_options['properties_status_list']['color'][$k];
    }
}
?>
<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/SothebysListing/css/tw-top_properties'); ?>

<!-- Header -->
 <?= $this->render('/Preview/Sothebys/parts/top-menu'); ?>

<!-- Hero section -->
<div class="relative min-h-[calc(100vh-59px)] xl:min-h-[calc(100vh-90px)] w-full flex justify-center items-center p-5 lg:p-10 box-border">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="absolute w-full h-full object-cover z-[-1]" alt="featured-photo" />
    <div class="absolute top-0 left-0 w-full h-full z-[-1]" style="background-color: <?= $page_data_options['primary_section_bg_color'] ?>"></div>
    <div class="basis-[700px] p-5 section text-center">
        <div class="">
            <div class="font-PlayfairDisplay text-white text-4xl md:text-6xl md:max-w-[500px] lg:max-w-none mx-auto leading-[3rem] lg:text-8xl font-medium lg:leading-[127px]"><?= $page_data_options['primary_section_title']; ?></div>
            <div class="mt-2 mb-2 lg:mb-10 font-medium text-theme-secondary-color text-3xl lg:text-5xl border-0 border-t border-solid border-theme-tertiary-color inline-block pt-5"><?= $page_data_options['primary_section_sub_title']; ?></div>
        </div>
    </div>
</div>

<?php
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

$search_params = $query_params;
if (!empty($page_data_options['properties_list'])) {
    $search_params['id'] = array_values($page_data_options['properties_list']);
}

$property_data = \App\Connector\Property::searchProperties($search_params, $page, 12);
?>
<div class="search-section" id="search-section">
    <?php echo \App\Utils\Search::render('sothebys', ['style' => 'inline-labels qcf-container--rounded', 'row_class' => 'grid-cols-1 md:grid-cols-4', 'action' => '/' . $page_data->get('page_slug')]); ?>
</div>

<div class="properties-section" id="options">
    <div class='bg-white px-5 md:px-10 2xl:px-12 py-5 md:py-10 properties-listing-section'>
        <?php if (!empty($property_data['data'])) : ?>
            <div class="qcf-container inline-labels flex flex-wrap m-mobile:flex-row md:items-center gap-5">
                <?php
                    $field_details = [
                        'id' => 'sort',
                        'name' => 'sort',
                        'hide_label' => true,
                        'size' => 'small',
                        'label' => 'Sort By',
                        'default' => $query_params['sort'] ?? '-website_listing_date',
                        'options' => [
                            '-website_listing_date' => 'Recently Added',
                            'price_desc' => 'Price: High to Low',
                            'price_asc' => 'Price: Low to High',
                        ],
                    ];
                    ?>
                <div class="w-[170px] lg:w-[200px] order-1">
                    <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                </div>
                <div class="lg:flex-1 order-3 md:order-2 text-sm lg:text-base">
                    <?= $property_data['pagination']['paginationInfo'] ?>
                </div>
                <div class="flex-1 order-1 m-mobile:order-2 md:order-3 inline-flex justify-end gap-2 items-center ">
                    <span class="text-lg inline-block border border-solid border-[#8e8e8e] px-[20px] pt-[4px] pb-0 rounded-[50px] text-[#8e8e8e] hover:border-theme-primary-color hover:text-theme-primary-color transition-colors view-map-btn hover:cursor-pointer">MAP</span>
                </div>
            </div>
            <div class='grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3'>
                <?php
                if (!empty($property_data['data'])) {
                    foreach ($property_data['data'] as $property) :
                        include __DIR__ . '/parts/property-item.php';
                    endforeach;
                }
                ?>
            </div>
        <?php else : ?>
            <div class="w-full text-center text-theme-primary-color-darker text-3xl opacity-50">No Properties</div>
        <?php endif; ?>
    </div>
    <?php if (!empty($property_data['pagination']['count'])) : ?>
        <div class="flex justify-center w-full bg-white py-5 qcf-search-pagination">
            <?= $this->element('pagination/pagination', ['pagination' => $property_data['pagination']]); ?>
        </div>
    <?php endif; ?>
</div>

<div class="properties-map-section fixed top-0 left-0 w-full h-full hidden z-[999]">
    <div class="relative h-full w-full">
        <span class="close-map-btn inline-block h-[30px] absolute top-[10px] right-[20px] z-10 hover:cursor-pointer hover:scale-110 transition-all ease-linear">
            <div class="h-full before:content-[''] before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:inline-block before:h-[20px] before:w-[20px] before:rounded-full before:bg-white z-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full fill-theme-primary-color relative" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
            </div>
        </span>
        <?php // @codingStandardsIgnoreStart ?>
        <?= $this->element('maps/single', [
            'id' => 'map-listing',
            'map_defaults' => [
                'scrollWheelZoom' => true,
            ],
            'options' => [
                'minWidth' => 300,
                'maxWidth' => 300,
            ],
            'popup_html_callback' => 'sothebysMapPopup',
            'markers' => []]); ?>
        <?php // @codingStandardsIgnoreEnd ?>
    </div>
</div>

<?php $component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/request-call-back'); ?>
<?php if (!empty($page_data_options['book_viewing_section_enabled']) && !empty($component_data)) { ?>
<!-- Book your viewing section -->
<div class="s-book-viewing relative">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'book_viewing_bg_image'); ?>" class="absolute w-full h-full object-cover z-[-2]" alt="Book your viewing image" />
    <div class="absolute w-full h-full top-0 left-0 opacity-50 z-[-1]" style="background: linear-gradient(90deg, #002349 0%, #003A7A 100%);"></div>
    <div class="flex p-5 lg:p-20">
        <div class="basis-2/3">
            <div class="flex flex-col justify-center py-10 lg:py-24 px-5">
                <div class="font-PlayfairDisplay t1 text-theme-tertiary-color pb-6 font-medium"><?= $page_data_options['book_viewing_title'] ?></div>
                <div class="font-medium t3 text-theme-secondary-color pb-6"><?= $page_data_options['book_viewing_sub_title'] ?></div>
                <div class="text-base xl:text-xl text-theme-tertiary-color pb-6"><?= $page_data_options['book_viewing_description'] ?></div>
            </div>
        </div>
        <div class="basis-1/3">
            <?php if (!empty($page_data_options['contact_form_primary_enabled'])) { ?>
                <div class="max-w-[500px]">
                    <div class="form bg-theme-primary-color p-5 lg:p-10">
                        <div class="t3 text-theme-tertiary-color mb-2 lg:mb-6"><?= $page_data_options['contact_form_title'] ?></div>
                        <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form" data-redirect="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('thank-you'); ?>">
                            <div class='hidden'>
                                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                            </div>
                            <div class="mb-4 form-group">
                                <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm focus:outline-none" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <div class="phone-group bg-white border border-solid border-[#bbb] border-opacity-50 rounded-sm">
                                    <?= \App\Utils\CustomFields::fieldSelectAjax(['name' => 'phone_prefix', 'id' => 'phone_prefix', 'label' => '', 'options' => []]); ?>
                                    <input type="text" class="pl-0 pr-3 py-3.5 border-0 focus:outline-none required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                                </div>
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="mb-4 form-group">
                                <input type="email" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm focus:outline-none" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="agreement-group text-theme-tertiary-color text-xs"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'agreement-box', 'label' => $page_data_options['contact_form_agreement']]); ?></div>
                            <button class="mt-5 btn btn-secondary w-full" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})" disabled>
                                <?= $page_data_options['contact_form_btn'] ?>
                            </button>
                        </form>
                        <div class="generic-helper"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php if (!empty($page_data_options['about_us_section_enabled'])) { ?>
<!-- About us section -->
<div class="s-about-us section mt-10 px-5" id="about-us">
    <div class="font-PlayfairDisplay t2 text-theme-primary-color pb-6 font-medium text-center lg:text-left"><?= $page_data_options['about_us_title'] ?></div>
    <div class="flex flex-col lg:flex-row gap-5 lg:gap-20 items-center">
        <div>
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_image'); ?>" class="h-[280px] object-cover" alt="About us image" />
        </div>
        <div class="text-lg text-[#666]"><?= $page_data_options['about_us_description'] ?></div>
    </div>
</div>
<?php } ?>

<!-- International Realty section -->
<?php if (
    !empty($page_data_options['international_section_enabled']) &&
    !empty($page_data_options['international_realty_list'])
) : ?>
    <?php ksort($page_data_options['international_realty_list']['int_realty_title']); ?>
<div class="section">
    <div class="font-PlayfairDisplay t2 text-theme-primary-color font-medium pt-5 lg:pt-16 pb-4"><?= $page_data_options['international_realty_title'] ?></div>
    <div class="text-base lg:text-xl text-theme-secondary-color pb-8 font-medium"><?= $page_data_options['international_realty_sub_title'] ?></div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-14">
        <?php foreach ($page_data_options['international_realty_list']['int_realty_title'] as $uid => $title) : ?>
            <div class="inline-flex gap-5">
                <div>
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['international_realty_list']['int_realty_img'], $uid); ?>" class="object-cover w-[56px] h-[56px]" alt="featured-photo" />
                </div>
                <div class="mb-5">
                    <div class="font-PlayfairDisplay text-2xl text-theme-primary-color font-medium pb-3"><?= $title ?></div>
                    <div class="text-[#666]"><?= $page_data_options['international_realty_list']['int_realty_description'][$uid]; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Footer section -->
<?php if (!empty($page_data_options['footer_section_enabled']) && !empty($page_data_options['footer_item_list'])) : ?>
    <?php ksort($page_data_options['footer_item_list']['footer_item_title']); ?>
    <div class="s-footer mt-5 xl:mt-32 bg-theme-primary-color">
        <div class="section text-center py-5 lg:py-16 px-5">
            <div class="font-PlayfairDisplay t2 text-theme-tertiary-color pb-6 font-medium"><?= $page_data_options['footer_title'] ?></div>
            <div class="text-xl text-theme-secondary-color pb-5 lg:pb-16 font-medium"><?= $page_data_options['footer_sub_title'] ?></div>
            <div class="flex flex-row flex-wrap justify-between gap-8">
                <?php foreach ($page_data_options['footer_item_list']['footer_item_title'] as $uid => $title) : ?>
                    <div class="inline-flex flex-col justify-center flex-1">
                        <div class="font-PlayfairDisplay t2 text-theme-tertiary-color border-0 border-b border-solid border-theme-tertiary-color pb-1 lg:pb-5 mb-1 lg:mb-5"><?= $page_data_options['footer_item_list']['footer_item_value'][$uid]; ?></div>
                        <div class="text-base lg:text-xl text-theme-tertiary-color"><?= $title ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php unset($query_params['sort']); ?>
<script>
    var query_params = '<?= http_build_query($query_params ?: ['sale_rent' => \App\Utils\CommonFunctions::getQueryParam('sale_rent', 'for_sale')]) ?>'
</script>
<!-- Footer -->
<?= $this->render('/Preview/Sothebys/parts/footer'); ?>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<script defer src="/js/newsletter.js"></script>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/sothebys/js/home.js'); ?>
<?= $this->html->script('/sothebys/js/lead.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/SothebysListing/js/top-properties.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>