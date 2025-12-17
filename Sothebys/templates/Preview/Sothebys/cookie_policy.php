<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Sothebys/css/tw-cookie_policy.css'); ?>
<?php include __DIR__ . '/parts/top-menu.php' ?>
<div class="flex flex-col min-h-[calc(100vh_-_57px)] xl:min-h-[calc(100vh_-_89px)] 2xl:min-h-[calc(100vh_-_91px)]">
    <div class="h-[50vh] flex flex-col justify-center relative">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="absolute top-0 left-0 object-cover h-full w-full object-center z-[-2]" title='Cookie Policy Image' loading="lazy"/>
        <div class="absolute w-full h-full top-0 left-0 opacity-50 z-[-1]" style="background: linear-gradient(90deg, #002349 0%, #003A7A 100%);"></div>
        <div class="content z-10 text-center">
            <div class="mt-4 t1 font-PlayfairDisplay font-medium text-white title">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="py-10 flex-1 section cookie-section">
        <?= $page_data_options['cookie_content'] ?>
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