<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-discover'); ?>

<div class="news-listing-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <div class="box-border  mt-6 pl-[5%] lg:pl-[12%] 2xl:pl-[16%] min-[1880px]:px-[20%]">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="discover-section">
        <?php for ($i = 1; $i <= 4; $i++) { ?>
            <?php
            if (empty($page_data_options['discover_row_' . $i . '_title'])) {
                continue;
            }
            ?>
            <div class="discover-section__group">
                <div class="discover-section__group__col1">
                    <div class="discover-section__group__col1__title"><?= $page_data_options['discover_row_' . $i . '_title']; ?></div>
                    <div class="discover-section__group__col1__description"><?= $page_data_options['discover_row_' . $i . '_description']; ?></div>
                </div>
                <div class="discover-section__group__col2">
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'discover_row_' . $i . '_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center">
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>