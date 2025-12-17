<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Commercial/css/tw-privacy_policy.css'); ?>
<?php include __DIR__ . '/header/header.php' ?>
<div class="h-[50vh] flex flex-col justify-center relative">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="absolute top-0 left-0 object-cover h-full w-full object-center z-0" title='Cookie Policy Image' loading="lazy"/>
    <div class="px-10 lg:px-16 xl:pl-20 xl:pr-0 2xl:pl-44 xl:max-w-xl 2xl:max-w-2xl content z-10">
        <div class="mt-4 text-xl xl:text-3xl 2xl:text-5xl font-bold text-white title">
            <?= $page_data['page_title'] ?>
        </div>
    </div>
</div>
<div class="py-10 px-8 lg:px-16 xl:px-20 2xl:px-32">
    <?= $page_data_options['privacy_content'] ?>
</div>
<?php include __DIR__ . '/footer/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
