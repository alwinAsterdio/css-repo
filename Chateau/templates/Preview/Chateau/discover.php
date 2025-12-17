<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-discover'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[130px] md:pt-[170px] lg:pt-[140px] 2xl:pt-[160px] pb-[40px] md:pb-[100px] lg:pb-[60px] 2xl:pb-[80px] bg-theme-tertiary-color border-0 border-b border-solid border-b-gray-300 relative z-0">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="z-10 text-theme-primary-color-darker font-extralight text-4xl lg:text-5xl text-center uppercase [text-shadow:_0.08em_0.08em_0.08em_rgba(0,0,0,.14)] font-JuliusSansOne">
        <?= $page_data['page_title'] ?>
    </div>
</div>
<div class="discover-section flex flex-col gap-10 pt-10 xl:pt-24 xl:pb-16 px-[5%] lg:px-[12%] 2xl:px-[16%] min-[1880px]:px-[20%] mb-10">
    <?php for ($i = 1; $i <= 4; $i++) { ?>
        <?php
        if (empty($page_data_options['discover_row_' . $i . '_title'])) {
            continue;
        }
        ?>
        <div class="discover-section__group flex gap-10 flex-col lg:flex-row group">
            <div class="discover-section__group__col1 order-1 flex-1 inline-flex flex-col justify-center group-even:lg:order-2">
                <div class="discover-section__group__col1__title text-4xl font-extralight pb-3 font-JuliusSansOne"><?= $page_data_options['discover_row_' . $i . '_title']; ?></div>
                <div class="discover-section__group__col1__description font-light leading-8"><?= $page_data_options['discover_row_' . $i . '_description']; ?></div>
            </div>
            <div class="discover-section__group__col2 order-2 group-even:lg:order-1 flex-1 h-[400px]">
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'discover_row_' . $i . '_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center rounded-lg">
            </div>
        </div>
    <?php } ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>