<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Sothebys/css/tw-thank-you.css'); ?>
<?php include __DIR__ . '/parts/top-menu.php' ?>
<div class="flex flex-col 2xl:min-h-[calc(100vh_-_91px)]">
    <div class="min-h-[calc(100vh_-_57px)] xl:min-h-[calc(100vh_-_89px)] inline-flex flex-col justify-center relative items-center">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="absolute top-0 left-0 object-cover h-full w-full object-center z-[-2]" title='Cookie Policy Image' loading="lazy"/>
        <div class="max-w-[650px] bg-white z-10 flex-grow-0 mx-5 md:mx-10 xl:mx-48 p-5 md:p-5 lg:p-10 xl:p-20">
            <div class="mt-4 text-black title thank-you-content">
                <div class="t1 font-PlayfairDisplay font-medium text-theme-primary-color mb-5"><?= $page_data_options['thank_you_title'] ?></div>
                <div class="text-2xl text-theme-primary-color font-medium mb-5"><?= $page_data_options['thank_you_sub_title'] ?></div>
                <div class="text-xl font-medium text-theme-secondary-color mb-4"><?= $page_data_options['thank_you_descr_1'] ?></div>
                <div class="w-full h-[1px] bg-theme-secondary-color mb-4"></div>
                <div class="text-base text-theme-primary-color"><?= $page_data_options['thank_you_descr_2'] ?></div>
            </div>
        </div>
    </div>
    <div>
        <?php include __DIR__ . '/parts/footer.php' ?>
    </div>
</div>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->html->script('/Sothebys/js/lead.js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        QoetixCustomFields.eventActions();
    });
</script>