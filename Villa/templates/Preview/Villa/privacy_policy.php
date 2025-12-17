<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-privacy_policy'); ?>

<div class="relative hero-section">
    <?php include __DIR__ . '/components/top-menu.php' ?>
    <div class="box-border pl-[10%] 2xl:pl-[20%] h-[40vh] lg:h-[55vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
        <?= $page_data['page_title'] ?>
    </div>
</div>

<div class="xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 py-10 privacy-section">
    <?= $page_data_options['privacy_content'] ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>