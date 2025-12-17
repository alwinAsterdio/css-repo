<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-privacy_policy'); ?>

<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[130px] md:pt-[170px] lg:pt-[140px] 2xl:pt-[160px] pb-[40px] md:pb-[100px] lg:pb-[60px] 2xl:pb-[80px] bg-theme-tertiary-color border-0 border-b border-solid border-b-gray-300 relative z-0">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="z-10 text-theme-primary-color-darker font-extralight text-4xl lg:text-5xl text-center uppercase [text-shadow:_0.08em_0.08em_0.08em_rgba(0,0,0,.14)] font-JuliusSansOne">
        <?= $page_data['page_title'] ?>
    </div>
</div>

<div class="xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 py-10 privacy-section">
    <?= $page_data_options['privacy_content'] ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>