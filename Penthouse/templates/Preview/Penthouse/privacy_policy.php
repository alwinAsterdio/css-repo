<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-privacy_policy'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(34, 31, 32, 0.85) 0%, rgba(34, 31, 32, 0.24) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <span class="text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<div class="xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 py-10 privacy-section">
    <?= $page_data_options['privacy_content'] ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>