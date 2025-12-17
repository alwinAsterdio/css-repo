<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-discover'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(34, 31, 32, 0.85) 0%, rgba(34, 31, 32, 0.24) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <span class="text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<?php if (!empty($page_data_options['discover_list'])) : ?>
    <?php ksort($page_data_options['discover_list']['discover_list_title']); ?>
<div class="discover-section flex flex-col gap-10 pt-10 xl:pt-24 xl:pb-16 px-[5%] lg:px-[12%] 2xl:px-[16%] min-[1880px]:px-[20%] mb-10">
    <?php foreach ($page_data_options['discover_list']['discover_list_title'] as $uid => $title) : ?>
        <div class="discover-section__group flex gap-10 flex-col lg:flex-row group">
            <div class="discover-section__group__col1 order-1 flex-1 inline-flex flex-col justify-center group-even:lg:order-2">
                <div class="discover-section__group__col1__title text-3xl pb-3"><?= $title; ?></div>
                <div class="discover-section__group__col1__description leading-7 text-lg text-[#666]"><?= $page_data_options['discover_list']['discover_list_description'][$uid]; ?></div>
            </div>
            <div class="discover-section__group__col2 order-2 group-even:lg:order-1 flex-1 relative min-h-[400px]">
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['discover_list']['discover_list_img'], $uid); ?>" alt="news-img" class="absolute w-full h-full object-cover object-center rounded-sm">
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>