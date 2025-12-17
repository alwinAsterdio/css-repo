<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div>
    <div class="box-border home-page">
    <!-- Hero Section -->
        <div class="relative hero-section h-screen inline-block w-full" style="background: linear-gradient(180deg,rgba(28,0,14,0.59) 3%,rgba(0,0,0,0.37) 49%,rgba(0,0,0,0) 98%),url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: center;">
            <div class="relative h-full pt-32 box-border">
                <div class="flex flex-col justify-center items-center h-full w-full text-white text-4xl lg:text-6xl">
                    <span class="flex-1 max-w-[700px] text-center justify-center items-center inline-flex [text-shadow:_0.08em_0.08em_0.08em_rgba(0,_0,_0,_0.4)]"><?= $page_data_options['primary_title'] ?></span>
                    <div class="md:w-[400px] lg:w-[500px] flex flex-row gap-20 justify-between h-[150px]">
                        <?php if (!empty($site_data['phone'])) { ?>
                            <a href="tel:<?= $site_data['phone'] ?>" class="no-underline text-inherit inline-flex">
                                <div class="flex flex-row items-center gap-3">
                                    <span class="text-sm italic hidden md:inline-block lg:order-3"><?= $site_data['phone'] ?></span>
                                    <span class="h-[1px] w-[30px] bg-white hidden md:inline-block lg:order-2"></span>
                                    <div class="home-page-icon-item lg:order-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class=""><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path></svg>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                        <?php if (!empty($site_data['email'])) { ?>
                            <a href="email:<?= $site_data['email'] ?>" class="no-underline text-inherit inline-flex">
                                <div class="flex flex-row items-center gap-3">
                                    <div class="home-page-icon-item lg:order-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path></svg>
                                    </div>
                                    <span class="hidden md:inline-block h-[1px] w-[30px] bg-white lg:order-2"></span>
                                    <span class="text-sm italic hidden md:inline-block lg:order-1"><?= $site_data['email'] ?></span>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shortcut links section -->
    <?php if (!empty($page_data_options['shortcut_links_list'])) : ?>
        <?php ksort($page_data_options['shortcut_links_list']['shortcut_title']); ?>
        <div class="shortcut-section flex flex-col lg:flex-row flex-wrap gap-10 py-10 justify-around px-10">
            <?php foreach ($page_data_options['shortcut_links_list']['shortcut_title'] as $uid => $title) : ?>
                <a href="<?= $page_data_options['shortcut_links_list']['shortcut_url'][$uid] ?>" class="no-underline flex-1 group">
                    <div class="relative h-[190px] lg:h-[400px] overflow-hidden bg-gradient-to-t from-[#191526c0] to-60%">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['shortcut_links_list']['shortcut_image'], $uid); ?>" class="absolute top-0 left-0 w-full h-full object-cover z-[-1] group-hover:scale-110 transition-all duration-300 ease-linear"/>
                        <div class="inline-flex flex-col p-10 h-full box-border">
                            <div class="text-white flex-1 inline-flex items-end text-2xl font-medium"><?= $title ?></div>
                            <div class="text-white text-lg font-medium grid grid-rows-[0fr] group-hover:grid-rows-[1fr] transition-all ease-linear duration-300 ">
                                <div class="overflow-hidden opacity-0 group-hover:opacity-100 transition-all duration-700">
                                    <div><?= $page_data_options['shortcut_links_list']['shortcut_description'][$uid] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Features section -->
    <?php $featured_properties = \App\Connector\Property::getFeaturedProperties(1, 6); ?>
    <?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
        <div class="features-section shadow-none border-none px-5 lg:px-10 xl:px-20 py-10" style="background-color: <?= $page_data_options['feature_properties_bg_color'] ?>;">
            <div class="text-center text-lg mb-3 text-theme-primary-color">
                <?= $page_data_options['feature_properties_title'] ?>
            </div>
            <div class="text-center text-3xl">
                <?= $page_data_options['feature_properties_sub_title'] ?>
            </div>
            <div class="mt-5 grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($featured_properties['data'] as $property) { ?>
                    <?php include __DIR__ . '/components/property-item.php' ?>
                <?php } ?>
            </div>
            <div class="text-center box-border pt-10">
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>?sale_rent=for_sale&featured=1" class="inline-block btn btn-primary no-underline"><?= $page_data_options['feature_properties_btn_label'] ?></a>
            </div>
        </div>
    <?php endif ?>

    <!-- Carousel section -->
    <?php $featured_properties = \App\Connector\Property::searchProperties(['sale_rent' => 'for_sale'], 1, 6); ?>
    <div class="bg-white py-10">
        <div class="text-center text-lg mb-3 text-theme-primary-color">
            <?= $page_data_options['carousel_properties_title'] ?>
        </div>
        <div class="text-center text-3xl mb-5">
            <?= $page_data_options['carousel_properties_sub_title'] ?>
        </div>
        <?= $this->element('properties/carousel', [ 'properties' => $featured_properties, 'template_file' => __DIR__ . '/components/property-item.php']); ?>
        <div class="text-center mt-10">
            <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>" class="btn btn-primary no-underline"><?= $page_data_options['carousel_properties_btn_label'] ?></a>
        </div>
    </div>

    <?php if (!empty($page_data_options['info_section_list'])) : ?>
        <?php ksort($page_data_options['info_section_list']['info_section_title']); ?>
        <div class="info-section" style="background-color: <?= $page_data_options['info_section_bg_color'] ?>;">
            <?php foreach ($page_data_options['info_section_list']['info_section_title'] as $uid => $title) : ?>
                <div class="info-section__row flex flex-col lg:flex-row py-5 lg:py-14 px-5 lg:px-10 xl:px-20 gap-10">
                    <div class="info-section__row__description flex-1 basis-1/3 inline-flex justify-center flex-col items-center text-center">
                        <div class="text-theme-primary-color-darker mb-3 text-lg font-semibold"><?= $title ?></div>
                        <div class="text-3xl mb-5"><?= $page_data_options['info_section_list']['info_section_sub_title'][$uid] ?></div>
                        <div class="text-gray-600 leading-7"><?= $page_data_options['info_section_list']['info_section_description'][$uid] ?></div>
                        <div class="flex mt-10 justify-center">
                            <a href="<?= $page_data_options['info_section_list']['info_section_btn_url'][$uid] ?>" class="no-underline btn btn-primary text-center w-full md:w-auto"><?= $page_data_options['info_section_list']['info_section_btn_label'][$uid] ?></a>
                        </div>
                    </div>
                    <div class="info-section__row__image relative flex-1 basis-2/3 h-[200px] lg:h-[500px]">
                        <div class="info-section__row__image__line1"></div>
                        <div class="info-section__row__image__line2"></div>
                        <div class="info-section__row__image__line3"></div>
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['info_section_list']['info_section_image'], $uid); ?>" class="xl:absolute top-0 left-0 w-full h-full object-cover"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php $news_data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', 1, 3); ?>
    <?php if (!empty($news_data['items'])) : ?>
    <div class="bg-white w-full">
        <div class="py-10 px-5 lg:px-10 xl:px-20">
            <div class="text-center text-theme-primary-color-darker mb-3 text-lg"><?= $page_data_options['news_title'] ?></div>
            <div class="text-center text-3xl mb-5"><?= $page_data_options['news_sub_title'] ?></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php foreach ($news_data['items'] as $blog) : ?>
                    <?php $blog_options = json_decode($blog['options'] ?? '{}', true); ?>
                    <div class="border border-solid border-gray-200 shadow">
                        <div class="h-[200px]">
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($blog_options, 'hero_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-5 pb-10 flex flex-col">
                            <div class="text-lg mb-5 flex-1"><?= $blog['page_title']; ?></div>
                            <div class="line-clamp-[3] text-gray-600 "><?= \App\Utils\CommonFunctions::trimWords($blog_options['blog_content'], 50) ?></div>
                        </div>
                        <div class="border-0 border-t border-solid border-gray-200 px-5 py-3 flex gap-1 items-center">
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-[12px] fill-gray-600"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg></span>
                            <span class="text-xs text-gray-600"><?= $blog['publish_from']->format('M d, Y'); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <style>
        .enquiry-form input,
        .enquiry-form textarea {
            background-color: <?= $page_data_options['contact_form_bg_color']; ?>;
        }
    </style>
    <!-- About us section -->
    <div class="p-5 lg:p-10" style="background-color: <?= $page_data_options['about_us_bg_color'] ?>;">
        <div class="grid grid-cols-1 lg:grid-cols-3 overflow-hidden lg:py-10">
            <div class="h-[200px] lg:h-full xl:h-[500px] pb-5 lg:pb-0">
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_image'); ?>" class="w-full h-full object-cover"/>
            </div>
            <div class="px-5 md:px-10 my-auto text-center">
                <div class="font-light text-lg mb-3 text-gray-600"><?= $page_data_options['about_us_title'] ?></div>
                <div class="text-3xl font-light mb-5"><?= $page_data_options['about_us_sub_title'] ?></div>
                <div class="font-light leading-7 text-gray-600"><?= $page_data_options['about_us_description'] ?></div>
            </div>
            <div class="flex items-center flex-col">
                <form id="enquiry-form" action="" class="enquiry-form grid grid-cols-2 gap-4 w-full" integration-recaptcha=true data-action="lead_form">
                    <div class='hidden'>
                        <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Homepage - Request a callback']); ?>
                    </div>
                    <div class="form-group col-span-2">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border " name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-1">
                        <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border " name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group  col-span-1">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-2">
                        <textarea id="message" name="message" cols="30" rows="10" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="col-span-2">
                        <button class="mt-3 btn btn-primary w-full min-[540px]:w-auto" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                        <?= $page_data_options['contact_form_btn'] ?>
                    </button>
                    </div>
                </form>
                <div class="generic-helper"></div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>