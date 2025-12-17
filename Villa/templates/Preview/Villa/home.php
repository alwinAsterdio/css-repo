<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-home'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="box-border home-page">
    <!-- Hero Section -->
    <div class="relative hero-section">
        <div class="relative min-h-[100vh] md:h-[80vh] lg:h-screen !bg-center text-start !bg-cover !bg-no-repeat flex justify-center items-center pt-20 md:pt-0" style="background: linear-gradient(180deg,rgba(28,0,14,0.59) 3%,rgba(0,0,0,0.37) 49%,rgba(0,0,0,0) 98%),url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
            <div class="max-w-[1600px] w-[80%] py-5 lg:mt-5">
                <div class="text-xs md:text-base font-semibold sub-title text-white">
                    <?= $page_data_options['primary_subtitle'] ?>
                </div>
                <div class="text-[34px] mt-8 md:text-6xl max-w-3xl !leading-[120%] !font-extralight title text-white mb-10" style="text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.4);">
                    <?= $page_data_options['primary_title'] ?>
                </div>
                <?php echo \App\Utils\Search::render('simple', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6']); ?>
            </div>
        </div>
    </div>
    <!-- Villa Section -->
    <div class="box-border px-5 md:px-20 lg:px-8 xl:px-10 py-14 bg-[#f4f5f9] villa-section">
        <div class="xl:pt-10 px-4 text-center top-content">
            <div class="text-[#2d2d2d] mb-2.5 text-base font-semibold sub-title">
                <?= $page_data_options['villas_subtitle'] ?>
            </div>
            <div class="text-4xl mb-4 font-medium title">
                <?= $page_data_options['villas_title'] ?>
            </div>
            <div class="text-base text-[#2d2d2d] max-w-2xl mx-auto mb-2.5 description">
                <?= $page_data_options['villas_description'] ?>
            </div>
        </div>


        <?php if (!empty($page_data_options['luxury_list'])) : ?>
            <?php $property_district = \App\Connector\Reports::propertyDistrictList(); ?>
        <div class="mt-10 lg:mt-16 grid gap-5 md:gap-10 grid-cols-2 lg:grid-cols-4">
            <?php foreach ($page_data_options['luxury_list']['luxury_title'] as $uid => $title) : ?>
                <a href="<?= $page_data_options['luxury_list']['luxury_url'][$uid] ?>" class="no-underline">
                    <div class="relative min-h-[15rem] sm:h-[18rem] md:h-[24rem] 2xl:h-[32rem] text-white bg-gray-400 group">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['luxury_list']['luxury_image'], $uid) ?>" alt="add" class="absolute left-0 top-0 w-full h-full object-cover object-center" loading="lazy">
                        <div class="transition-all duration-300 ease-linear relative w-full h-full outline outline-2 outline-white/20 outline-offset-[-15px] hover:bg-black/20 hover:outline-transparent">
                            <div class="flex h-full justify-center items-center flex-col text-center px-2 md:px-6">
                                <div class="flex-1 group-hover:flex-none md:group-hover:flex-1 transition-all duration-300 ease-linear md:flex-1 justify-center inline-flex">
                                    <div class='pt-5 mt-auto transition-all duration-300 ease-linear'>
                                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['luxury_list']['luxury_icon'], $uid) ?>" alt="add" class="w-10" loading="lazy">
                                    </div>
                                </div>
                                <div class="flex-1 py-2 min-h-[130px]">
                                    <div class="text-xl transition-all duration-300 ease-linear font-semibold group-hover:scale-75 uppercase [text-shadow:rgba(0,_0,_0,_0.4)_1.28px_1.28px_1.28px]">
                                        <?= $title ?>
                                    </div>
                                    <div class="transition-all duration-300 ease-linear translate-y-5 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 text-base leading-5">
                                        <?= $page_data_options['luxury_list']['luxury_description'][$uid] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php $featured_properties = \App\Connector\Property::getFeaturedProperties(1, 6); ?>
    <!-- Featured Section -->
    <?php if ($featured_properties && $featured_properties['pagination']['count'] > 0) : ?>
        <div class="px-5 md:px-10 2xl:px-12 py-14 text-center featured-properties">
            <div class="text-center top-content">
                <div class="text-[#2d2d2d] mb-2.5 uppercase text-base font-semibold sub-title">
                    <?= $page_data_options['featured_subtitle'] ?>
                </div>
                <div class="text-4xl mb-4 font-medium title">
                    <?= $page_data_options['featured_title'] ?>
                </div>
            </div>
            <div class="mt-10 lg:mt-14 grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($featured_properties['data'] as $property) { ?>
                    <?php include __DIR__ . '/components/property-item.php' ?>
                <?php } ?>
            </div>
            <div class="mt-10">
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>?sale_rent=for_sale&featured=1" class="btn btn-primary no-underline"><?= $page_data_options['featured_btn'] ?></a>
            </div>
        </div>
    <?php endif ?>

    <div class="bg-[#f4f5f9] box-border px-7 py-12 md:px-20 md:pt-12 md:pb-20 xl:px-36 xl:py-24 2xl:px-44 overflow-hidden">
        <!-- Team Section -->
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 xl:gap-20 xl:items-center box-border monitor-visibility group">
            <div class="box-border team-img p-10 order-last lg:order-first">
                <div class="h-[30vw] min-h-[300px] shadow-action-menu divider relative outline outline-[4px] outline-white/90 outline-offset-[-25px] z-0 opacity-0 group-[.visible]:opacity-100 transition-all duration-700 ease-in -translate-x-1/2 group-[.visible]:translate-x-0">
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'team_image') ?>" alt="add" class="absolute left-0 top-0 w-full h-full object-cover object-center -z-10" loading="lazy">
                </div>
            </div>
            <div class="box-border xl:mt-0 slide-up text-center md:text-left opacity-0 group-[.visible]:opacity-100 transition-all duration-700 ease-in translate-y-1/2 group-[.visible]:translate-y-0">
                <div class="mb-2.5 text-[#2d2d2d] uppercase text-base font-semibold subtitle">
                    <?= $page_data_options['team_subtitle'] ?>
                </div>
                <div class="mb-5 text-4xl font-medium title">
                    <?= $page_data_options['team_title'] ?>
                </div>
                <div class="text-[#2d2d2d] text-base 2xl:max-w-lg description">
                    <?= $page_data_options['team_description'] ?>
                </div>
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('about'); ?>" class="mt-5 xl:mb-8 btn btn-primary shadow-btn-shadow inline-block no-underline"><?= $page_data_options['team_btn'] ?></a>
            </div>
        </div>

        <!-- Quality Section -->
        <div class="mt-8 xl:mt-14 grid lg:grid-cols-2 gap-10 lg:gap-14 xl:gap-20 xl:items-center box-border monitor-visibility group">
            <div class="box-border text-center md:text-left opacity-0 group-[.visible]:opacity-100 transition-all duration-700 ease-in translate-y-1/2 group-[.visible]:translate-y-0">
                <div class="mb-2.5 text-[#2d2d2d] text-base font-semibold uppercase subtitle">
                    <?= $page_data_options['quality_section_subtitle'] ?>
                </div>
                <div class="mb-5 text-4xl font-medium title">
                    <?= $page_data_options['quality_section_title'] ?>
                </div>
                <div class="text-[#2d2d2d] text-base 2xl:max-w-lg description">
                    <?= $page_data_options['quality_section_description'] ?>
                </div>
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('about'); ?>" class="mt-5 xl:mb-8 btn btn-primary shadow-btn-shadow inline-block no-underline"><?= $page_data_options['quality_section_btn'] ?></a>
            </div>
            <div class="box-border team-img p-10">
                <div class="h-[30vw] min-h-[300px] shadow-action-menu divider relative outline outline-[4px] outline-white/90 outline-offset-[-25px] z-0 opacity-0 group-[.visible]:opacity-100 transition-all duration-700 ease-in translate-x-1/2 group-[.visible]:translate-x-0">
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'quality_section_image') ?>" alt="add" class="absolute left-0 top-0 w-full h-full object-cover object-center -z-10" loading="lazy">
                </div>
            </div>
        </div>
    </div>

    <!-- Memories Section -->
    <div class="z-10 min-h-[600px] h-[75vh] flex justify-end md:justify-start lg:justify-end text-white relative [clip-path:_inset(0)]">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'memories_bg_img') ?>" alt="add" class="fixed left-0 top-0 w-full h-full object-cover object-top -z-10" loading="lazy">
        <div class="box-border text-center md:text-left p-6 md:pl-10 md:pr-28 xl:w-1/2 flex flex-col h-full justify-center content">
            <div class="mb-2.5 text-base font-semibold uppercase subtitle">
                <?= $page_data_options['memories_subtitle'] ?>
            </div>
            <div class="mb-5 text-4xl font-medium title">
                <?= $page_data_options['memories_title'] ?>
            </div>
            <div class="text-base px-2 lg:max-w-xs xl:max-w-lg description">
                <?= $page_data_options['memories_description'] ?>
            </div>
        </div>
    </div>

    <!-- News Section -->
    <?php $news = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', 1, 3); ?>
    <div class="news-section">
        <div class="pt-14 px-6 box-border text-center top-content">
            <div class="text-[#2d2d2d] mb-2.5 text-base font-semibold sub-title">
                <?= $page_data_options['news_subtitle'] ?>
            </div>
            <div class="text-4xl mb-4 font-medium title">
                <?= $page_data_options['news_title'] ?>
            </div>
            <div class="text-base px-1 text-[#2d2d2d] description">
                <?= $page_data_options['news_description'] ?>
            </div>
        </div>
        <div class="mt-10 mb-20 lg:mt-12 lg:mb-28 px-3 md:px-5 lg:px-8 xl:px-10 2xl:px-12 cards">
            <?php if ($news['pagination']['count'] > 0) : ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12 2xl:gap-16">
                    <?php foreach ($news['items'] as $item) { ?>
                        <?php include __DIR__ . '/cards/news-card.php' ?>
                    <?php } ?>
                </div>
            <?php else : ?>
                <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full not-found"><?= $site_data_options['no_results_label']; ?></div>
            <?php endif ?>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="flex flex-col md:flex-row contact-form" style="background: url('data:image/svg+xml;base64,PHN2ZyAgZmlsbD0icmdiYSgxNzcsMTcwLDE1NiwwLjA4KSIgaGVpZ2h0PSI4cHgiIHdpZHRoPSI4cHgiIHZpZXdCb3g9IjAgMCA4IDgiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjQiIGhlaWdodD0iNCIvPjwvc3ZnPg=='), #f4f5f9;">
        <div class="box-border md:w-1/2 px-12 pb-24 md:pl-24 md:pt-20 lg:pl-32 lg:pr-20 xl:pl-44 xl:pr-24 2xl:pl-52 order-last md:order-first form">
            <div class="text-[29px] mb-5 font-medium form-title">
                <?= $page_data_options['contact_form_title'] ?>
            </div>
            <form action="" id="enquiry-form" integration-recaptcha=true data-action="lead_form" class="grid gap-5">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Homepage - Request a callback']); ?>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div class="form-group">
                        <input class="field-text field-lg w-full bg-[#ecedef]" type="text" id="first_name" name="first_name" placeholder="<?= $page_data_options['contact_form_first_name'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="field-text field-lg w-full bg-[#ecedef]" type="text" id="last_name" name="last_name" placeholder="<?= $page_data_options['contact_form_last_name'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="field-text field-lg w-full bg-[#ecedef]" type="text" id="email" name="email" placeholder="<?= $page_data_options['contact_form_email'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="field-text field-lg w-full bg-[#ecedef] required-field" type="text" id="phone" name="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                </div>
                <div class="flex justify-center md:justify-start">
                    <button class="btn flex items-center justify-center btn-primary shadow-btn-shadow w-full md:w-auto form-btn" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                        <?= $page_data_options['contact_form_btn'] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.1em" class="fill-white ml-1" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z" />
                        </svg>
                    </button>
                </div>
                <div class="generic-helper"></div>
            </form>
        </div>
        <div class="md:w-1/2 mt-20 mb-16 md:my-0 text-center md:text-left flex flex-col justify-center box-border px-6 md:pl-5 md:pr-16 xl:pr-28 2xl:pr-44 info">
            <div class="text-[#2d2d2d] mb-2.5 text-base font-semibold sub-title">
                <?= $page_data_options['list_your_property_subtitle'] ?>
            </div>
            <div class="text-3xl mb-6 font-medium title">
                <?= $page_data_options['list_your_property_title'] ?>
            </div>
            <div class="text-base mb-6 max-w-sm lg:max-w-lg mx-auto lg:mx-0 !leading-8 text-[#2d2d2d] description">
                <?= $page_data_options['list_your_property_description'] ?>
            </div>
            <div>
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('list_a_property'); ?>" class="btn btn-primary shadow-btn-shadow no-underline inline-block"><?= $page_data_options['list_your_property_btn'] ?></a>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/Villa/js/home.js'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
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