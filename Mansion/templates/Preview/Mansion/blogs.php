<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-blogs'); ?>
<?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', $current_page, 8); ?>


<div class="news-listing-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[30vh] md:h-[35vh] lg:h-[45vh] xl:h-[50vh] 2xl:h-[60vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, .66) 0, rgba(0, 0, 0, 0) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: 50%; background-size: cover;">
            <div class="font-[Jaldi] text-center">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="box-border grid gap-10 lg:gap-16 py-8 xl:pt-24 xl:pb-16 px-[5%] lg:px-[12%] 2xl:px-[16%] min-[1880px]:px-[20%] news-list">
        <?php if ($data['pagination']['count'] > 0) : ?>
            <?php foreach ($data['items'] as $key => $item) { ?>
                <?php $item_options = json_decode($item['options'], true); ?>
                <div class="shadow-card-shadow lg:shadow-none abox-border flex flex-col lg:flex-row items-center w-full news-list-card">
                    <div class="lg:shadow-card-shadow w-full box-border lg:z-20 lg:w-1/2 px-5 py-7 lg:px-10 lg:py-14 bg-white order-2  <?= $key % 2 === 0 ? 'lg:-ml-20 lg:order-1' : 'lg:-mr-20 lg:order-first' ?> post-content rounded-lg">
                        <a href="<?= $item['page_slug'] ?>" class="no-underline text-black hover:text-[#0d5bdd]">
                            <div class="text-[20px] mb-5 leading-[100%] font-[Jaldi] font-medium title">
                                <?= $item['page_title'] ?>
                            </div>
                        </a>
                        <div class="text-base mb-5 line-clamp-3 text-[#666] content">
                            <?= $item_options['blog_content'] ?>
                        </div>
                        <div class="read-more-btn">
                            <a href="<?= $item['page_slug'] ?>" class="text-lg no-underline text-[#666] inline-flex items-center gap-2">
                                <?= $page_data_options['blogs_card_btn'] ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" fill="#666"/></svg>
                            </a>
                        </div>
                        <div class="text-[#666] text-sm mt-5">
                            <?= $item['publish_from']->format('M d, Y') ?>
                        </div>
                    </div>
                    <div class="w-full lg:w-[calc(50%+100px)] h-[225px] md:h-auto lg:h-[400px] media hover:opacity-70">
                        <a href="<?= $item['page_slug'] ?>">
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($item_options, 'hero_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center rounded-lg">
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
