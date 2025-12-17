<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-privacy_policy'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border h-[30vh] md:h-[35vh] lg:h-[45vh] xl:h-[50vh] 2xl:h-[60vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, .66) 0, rgba(0, 0, 0, 0) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: 50%; background-size: cover;">
        <span class="font-[Jaldi] text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<div class="xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 py-10 privacy-section">
    <?= $page_data_options['privacy_content'] ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
