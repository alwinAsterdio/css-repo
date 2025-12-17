<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="box-border home-page pb-10 xl:pb-20">
<!-- Hero Section -->
    <div class="relative hero-section min-h-[100vh] md:h-screen inline-block w-full">
        <div class="relative h-full" style="background: linear-gradient(180deg,rgba(28,0,14,0.59) 3%,rgba(0,0,0,0.37) 49%,rgba(0,0,0,0) 98%),url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: center; background-size:cover;">
            <div class="mx-auto 2xl:w-[1200px] px-5 flex flex-col lg:flex-row h-full justify-center items-center">
                <div class="text-white mt-32 mb-10 lg:mt-0 lg:mb-0 md:px-20 lg:px-0 lg:pl-10 text-3xl md:text-4xl lg:text-5xl md:leading-[3rem] lg:leading-[4rem] font-extralight lg:flex-1 text-center lg:text-left font-JuliusSansOne">
                    <?= $page_data_options['primary_title'] ?>
                </div>
                <div class='flex-1 w-full'>
                    <?php echo \App\Utils\Search::render('simple', ['style' => 'inline-labels qcf-container--rounded', 'row_class' => 'grid-cols-1 md:grid-cols-2']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features section -->
<?php $featured_properties = \App\Connector\Property::getFeaturedProperties(1, 6); ?>
<?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
    <div class="features-section shadow-none border-none px-5 lg:px-10 xl:px-20">
        <div class="text-center text-4xl font-extralight mb-6 text-theme-primary-color-darker font-JuliusSansOne">
            <?= $page_data_options['feature_properties_title'] ?>
        </div>
        <div class="text-black text-center text-lg font-extralight max-w-[550px] mx-auto">
            <?= $page_data_options['feature_properties_description'] ?>
        </div>
        <div class="mt-10 lg:mt-14 grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($featured_properties['data'] as $property) { ?>
                <?php include __DIR__ . '/components/property-item.php' ?>
            <?php } ?>
        </div>
        <div class="text-center box-border py-14">
            <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>?sale_rent=for_sale&featured=1" class="btn btn-secondary no-underline"><?= $page_data_options['feature_properties_btn_label'] ?></a>
        </div>
    </div>
<?php endif ?>

<!-- Info section -->
<?php if (!empty($page_data_options['info_sub_title']) && !empty($page_data_options['info_title'])) : ?>
    <div class="relative py-20">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'info_bg_image'); ?>" class="absolute top-0 left-0 w-full h-full z-[-1] object-cover"/>
        <div class="bg-[#ffffffb3] backdrop-blur-md py-10 mx-5 lg:ml-[70px] 2xl:ml-[100px] px-5 lg:px-10 lg:w-[350px] xl:w-[450px] 2xl:w-[600px] rounded-lg">
            <div class="mb-3 text-lg"><?= $page_data_options['info_sub_title'] ?></div>
            <div class="text-theme-primary-color-darker text-3xl font-light mb-5 font-JuliusSansOne"><?= $page_data_options['info_title'] ?></div>
            <div class="font-light leading-7"><?= $page_data_options['info_description'] ?></div>
            <div class="flex mt-10">
                <a href="<?= $page_data_options['info_btn_url'] ?>" class="no-underline btn btn-secondary text-center w-full md:w-auto"><?= $page_data_options['info_btn_label'] ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- About us section -->
<div class="py-5 lg:py-10 xl:py-24 px-5 md:px-10 xl:px-20 2xl:px-32">
    <div class="flex flex-col lg:flex-row rounded-xl overflow-hidden lg:py-10" style="background-color: <?= $page_data_options['about_us_bg_color'] ?? '' ?>">
        <div class="lg:basis-3/5 m-5 md:m-10 h-[200px] lg:h-[300px] xl:h-[500px] rounded-xl overflow-hidden ">
            <?= $this->element('youtube/iframe', ['youtube_link' => $page_data_options['about_us_youtube_link']]); ?>
        </div>
        <div class="lg:basis-2/5 px-5 md:px-10 my-auto">
            <div class="font-light text-lg mb-3"><?= $page_data_options['about_us_sub_title'] ?></div>
            <div class="text-theme-primary-color-darker text-3xl font-light mb-5 font-JuliusSansOne"><?= $page_data_options['about_us_title'] ?></div>
            <div class="font-light leading-7"><?= $page_data_options['about_us_description'] ?></div>
            <div class="flex my-10">
                <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('about'); ?>" class="no-underline btn btn-secondary"><?= $page_data_options['about_us_btn_label'] ?></a>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials section -->
<div class="px-10 testimonials-section">
    <div class="relative w-full xl:w-[1000px] xl:mx-auto mb-8 text-center">
        <div class="text-md mb-3 font-light"><?= $page_data_options['testimonials_sub_title'] ?></div>
        <div class="text-3xl xl:text-4xl text-theme-primary-color-darker font-light mb-6 font-JuliusSansOne"><?= $page_data_options['testimonials_title'] ?></div>
        <div class="glide glide-testimonials">
            <div class="glide__track pb-5" data-glide-el="track">
                <ul class="glide__slides">
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <?php
                        if (empty($page_data_options['testimonials_name_' . $i])) {
                            continue;
                        }
                        ?>
                        <li class="glide__slide flex flex-col gap-10">
                            <div class="font-light text-sm"><?= $page_data_options['testimonials_description_' . $i] ?></div>
                            <div class="font-JuliusSansOne text-theme-primary-color-darker text-lg"><?= $page_data_options['testimonials_name_' . $i] ?></div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="glide__arrows flex md:w-[500px] mx-auto justify-between mt-10" data-glide-el="controls">
                <div class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</div>
                <div class="glide__arrow glide__arrow--right" data-glide-dir=">">›</div>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <?php for ($i = 1; $i <= 4; $i++) { ?>
                    <?php
                    if (empty($page_data_options['testimonials_name_' . $i])) {
                        continue;
                    }
                    ?>
                    <div class="glide__bullet" data-glide-dir="=<?= $i ?>"></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/chateau/js/home.js'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>