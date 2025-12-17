<?php include __DIR__ . '/../header/header.php' ?>
<div class="blogs-page">
    <div class="h-screen xl:h-[50vh] flex flex-col justify-center !bg-center !bg-cover !bg-no-repeat" style="background: url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <div class="px-10 lg:px-16 xl:pl-20 xl:pr-0 2xl:pl-44 xl:max-w-xl 2xl:max-w-2xl content">
            <div class="text-base font-bold xl:text-lg 2xl:text-xl text-theme-primary-color sub-title">
                <?= $page_data_options['products_primary_subtitle'] ?>
            </div>
            <div class="mt-4 text-xl xl:text-3xl 2xl:text-5xl font-bold text-white title">
                <?= $page_data['page_title'] ?>
            </div>
            <div class="mt-4 ext-base xl:text-lg 2xl:text-2xl text-white description">
                <?= $page_data_options['products_primary_description'] ?>
            </div>
        </div>
    </div>

    <!-- Products Listing -->
    <div class="box-border px-10 lg:px-16 xl:px-20 2xl:px-44 py-10 lg:py-16 xl:py-24 2xl:py-28 blogs-listing" id="items-list">
        <?php if ($data['pagination']['count'] > 0) : ?>
            <div class="relative min-h-[85vh]">
                <div class="box-border grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 lg:gap-16 xl:gap-16 2xl:gap-32 pb-20 blogs">
                    <?php foreach ($data['items'] as $item) { ?>
                        <?php include __DIR__ . '/product-loop.php'; ?>
                    <?php } ?>
                </div>
                <div class="flex justify-center absolute bottom-0 w-full">
                    <?= $this->element('pagination/pagination', ['pagination' => $data['pagination']]); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full not-found"><?= $site_data_options['no_results_label']; ?></div>
        <?php endif ?>
    </div>
</div>
<?php include __DIR__ . '/../footer/footer.php' ?>