<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div>
    <div class="box-border home-page">
    <!-- Hero Section -->
        <div class="relative hero-section h-screen inline-block w-full" style="background: linear-gradient(180deg,rgba(255,255,255,.74) 6%,rgba(255,255,255,0) 30%,rgba(0,0,0,.1) 45%,rgba(0,0,0,.29) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: center; background-size:cover;">
            <div class="relative h-full box-border">
                <div class="inline-flex flex-col justify-center items-center h-full w-full">
                    <span class="pb-10 max-w-[800px] font-[Jaldi] text-center text-white text-4xl lg:text-7xl justify-center items-center inline-flex [text-shadow:_0.08em_0.08em_0.08em_rgba(0,_0,_0,_0.4)]"><?= $page_data_options['primary_title'] ?></span>
                    <?php echo \App\Utils\Search::render('simple', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6']); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Location section -->
    <?php if (!empty($page_data_options['location_list'])) : ?>
        <?php $property_district = \App\Connector\Reports::propertyDistrictList(); ?>
    <div class="flex flex-col px-5 lg:px-10 xl:px-20 py-10">
        <div class="text-theme-primary-color text-lg font-medium text-center mb-3"><?= $page_data_options['location_title'] ?></div>
        <div class="text-3xl font-[Jaldi] font-bold text-center"><?= $page_data_options['location_sub_title'] ?></div>
        <div class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(45%,_1fr))] lg:grid-cols-[repeat(auto-fit,minmax(22%,_1fr))] justify-between content-center pt-5 gap-10">
            <?php foreach ($page_data_options['location_list']['location_district'] as $uid => $title) : ?>
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>?sale_rent=for_sale&district%5B%5D=<?= $title ?>">
                    <div class="flex flex-col justify-center items-center gap-3 relative h-[150px] 2xl:h-[200px] rounded-md group hover:cursor-pointer shadow-md" style="background-image: linear-gradient(180deg,rgba(66,53,35,0) 0%,rgba(25,21,38,.62) 100%);">
                        <div class="overflow-hidden absolute top-0 left-0 h-full w-full rounded-md z-[-1]">
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['location_list']['location_image'], $uid); ?>" class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105" loading="lazy"/>
                        </div>
                        <div>
                            <div class="inline-flex flex-col justify-center items-center gap-3 font-[Jaldi] translate-y-[35px] group-hover:translate-y-0 transition-all duration-700">
                                <div class="text-white text-3xl font-medium z-10 px-3 text-center line-clamp-1" title="<?= $title ?>"><?= $title ?></div>
                                <?php $total = !empty($property_district[$title]) ? $property_district[$title]['total'] : 0; ?>
                                <div class="text-white text-xl font-medium z-10"><?= $total . ( $total > 1 ? ' properties' : ' property' ) ?></div>
                                <div class="z-10 opacity-0 group-hover:opacity-100 transition-all duration-700">
                                    <span class="inline-block btn btn-tertiary no-underline focus:no-underline btn-sm"><?= $page_data_options['location_list']['location_btn_label'][$uid] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Features section -->
    <?php $featured_properties = \App\Connector\Property::getFeaturedProperties(1, 6); ?>
    <?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
        <div class="features-section shadow-none border-none px-5 lg:px-10 xl:px-20 py-10">
            <div class="text-center text-lg mb-3 text-theme-primary-color">
                <?= $page_data_options['feature_properties_title'] ?>
            </div>
            <div class="text-center text-3xl font-[Jaldi] font-bold">
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
    <?php $featured_properties = \App\Connector\Property::searchProperties(['sale_rent' => ['for_sale', 'for_rent', 'for_sale_and_rent'], 'sort' => '-website_listing_date'], 1, 6); ?>
    <div class="bg-white py-10" style="background-color: <?= $page_data_options['carousel_properties_bg_color'] ?>;">
        <div class="text-center text-lg mb-3 text-theme-primary-color">
            <?= $page_data_options['carousel_properties_title'] ?>
        </div>
        <div class="text-center text-3xl mb-5 font-[Jaldi] font-bold">
            <?= $page_data_options['carousel_properties_sub_title'] ?>
        </div>
        <?= $this->element('properties/carousel', [ 'properties' => $featured_properties, 'template_file' => __DIR__ . '/components/property-item.php']); ?>
        <div class="text-center mt-10">
            <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>" class="btn btn-primary no-underline"><?= $page_data_options['carousel_properties_btn_label'] ?></a>
        </div>
    </div>

    <!-- About us section -->
    <div class="flex flex-col md:h-[500px] lg:flex-row m-5 md:m-20 border border-solid border-gray-200 rounded-md overflow-hidden" style="background-color: <?= $page_data_options['about_us_bg_color'] ?>;">
        <div class="lg:basis-1/2">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_image'); ?>" alt="about-us-img" class="w-full h-full object-cover object-center" loading="lazy">
        </div>
        <div class="lg:basis-1/2 inline-flex flex-col justify-center px-10 gap-5 py-10">
            <div class="text-lg text-theme-primary-color-darker"><?= $page_data_options['about_us_title'] ?></div>
            <div class="text-2xl font-[Jaldi] font-bold"><?= $page_data_options['about_us_sub_title'] ?></div>
            <div class="text-lg font-medium"><?= $page_data_options['about_us_description'] ?></div>
            <div>
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('about'); ?>" class="btn btn-primary no-underline inline-block"><?= $page_data_options['about_us_btn_label'] ?></a>
            </div>
        </div>
    </div>

    <!-- Info section -->
    <div class="flex flex-col gap-5 p-20" style="background: linear-gradient(180deg, rgba(0, 0, 0, .59) 28%, rgba(0, 0, 0, .45) 79%, rgba(0, 0, 0, .08) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'info_image'); ?>); background-position: 50%; background-size: cover;">
        <div class="text-white text-lg font-medium"><?= $page_data_options['info_title'] ?></div>
        <div class="text-white text-2xl font-[Jaldi] font-bold max-w-[400px]"><?= $page_data_options['info_sub_title'] ?></div>
        <div class="text-white text-xl font-medium max-w-[600px]"><?= $page_data_options['infos_description'] ?></div>
        <!-- Shortcut links section -->
        <?php if (!empty($page_data_options['services_list'])) : ?>
            <?php ksort($page_data_options['services_list']['service_title']); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 pt-10 gap-10">
                <?php foreach ($page_data_options['services_list']['service_title'] as $uid => $title) : ?>
                    <div class="flex flex-col gap-3">
                        <div>
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['services_list']['service_icon'], $uid); ?>" class="h-[55px]" loading="lazy"/>
                        </div>
                        <div class="font-[Jaldi] text-white text-xl text-medium"><?= $title ?></div>
                        <div class="text-white text-base text-medium"><?= $page_data_options['services_list']['service_description'][$uid] ?></div>
                        <div>
                            <a href="<?= $page_data_options['services_list']['service_url'][$uid] ?>" class="inline-block btn btn-tertiary no-underline focus:no-underline btn-sm"><?= $page_data_options['services_list']['service_btn_label'][$uid] ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php $news_data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', 1, 3); ?>
    <?php if (!empty($news_data['items'])) : ?>
    <div class="bg-white w-full">
        <div class="py-10 px-5 lg:px-10 xl:px-20">
            <div class="text-center text-theme-primary-color-darker mb-3 text-lg"><?= $page_data_options['news_title'] ?></div>
            <div class="text-center text-3xl mb-5 font-[Jaldi] font-bold"><?= $page_data_options['news_sub_title'] ?></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php foreach ($news_data['items'] as $blog) : ?>
                    <?php $blog_options = json_decode($blog['options'] ?? '{}', true); ?>
                    <a href="/<?= $blog['page_slug'] ?>" class="no-underline focus:no-underline text-inherit">
                        <div class="border border-solid border-gray-200 shadow">
                            <div class="h-[200px]">
                                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($blog_options, 'hero_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-10 flex flex-col">
                                <div class="text-lg mb-5 flex-1"><?= $blog['page_title']; ?></div>
                                <div class="line-clamp-[3] text-gray-600 "><?= \App\Utils\CommonFunctions::trimWords($blog_options['blog_content'], 50) ?></div>
                            </div>
                            <div class="border-0 border-t border-solid border-gray-200 px-5 py-3 flex gap-1 items-center">
                                <span class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-[12px] fill-gray-600"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg></span>
                                <span class="text-xs text-gray-600"><?= $blog['publish_from']->format('M d, Y'); ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-10">
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('blogs'); ?>" class="btn btn-primary no-underline inline-block"><?= $page_data_options['news_btn_label'] ?></a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/mansion/js/home.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>
