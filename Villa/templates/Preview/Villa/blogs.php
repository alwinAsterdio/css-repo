<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-blogs'); ?>
<?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', $current_page, 8); ?>

<div class="news-listing-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <div class="box-border  mt-6 pl-[5%] lg:pl-[12%] 2xl:pl-[16%] min-[1880px]:px-[20%]">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="box-border grid gap-10 lg:gap-16 py-8 xl:pt-24 xl:pb-16 px-[5%] lg:px-[12%] 2xl:px-[16%] min-[1880px]:px-[20%] news-list">
        <?php if ($data['pagination']['count'] > 0) : ?>
            <?php foreach ($data['items'] as $key => $item) { ?>
                <?php $item_options = json_decode($item['options'], true); ?>
                <div class="shadow-card-shadow lg:shadow-none abox-border flex flex-col lg:flex-row items-center w-full news-list-card">
                    <div class="lg:shadow-card-shadow w-full box-border lg:z-20 lg:w-1/2 px-5 py-7 lg:px-10 lg:py-14 bg-white order-2  <?= $key % 2 === 0 ? 'lg:-ml-20 lg:order-1' : 'lg:-mr-20 lg:order-first' ?> post-content">
                        <a href="<?= $item['page_slug'] ?>" class="no-underline text-black hover:text-[#0d5bdd]">
                            <div class="text-[17px] mb-5 leading-[120%] font-medium title">
                                <?= $item['page_title'] ?>
                            </div>
                        </a>
                        <div class="text-base mb-5 line-clamp-3 text-[#666666] content">
                            <?= $item_options['blog_content'] ?>
                        </div>
                        <div class="read-more-btn">
                            <a href="<?= $item['page_slug'] ?>">
                                <button class="btn btn-primary btn-sm shadow-none">
                                    <?= $page_data_options['blogs_card_btn'] ?>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="w-full lg:w-[calc(50%+100px)] h-[225px] md:h-auto lg:h-[400px] media hover:opacity-70">
                        <a href="<?= $item['page_slug'] ?>">
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($item_options, 'hero_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center">
                        </a>
                    </div>
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full not-found"><?= $site_data_options['no_results_label']; ?></div>
        <?php endif ?>
    </div>
    <?php if (!empty($data['pagination']['count'])) : ?>
        <div class="flex justify-center w-full bg-white py-5 qcf-search-pagination">
            <?= $this->element('pagination/pagination', ['pagination' => $data['pagination']]); ?>
        </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>