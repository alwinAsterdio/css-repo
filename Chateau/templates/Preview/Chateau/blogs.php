<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-blogs'); ?>
<?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', $current_page, 9); ?>

<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[130px] md:pt-[170px] lg:pt-[140px] 2xl:pt-[160px] pb-[40px] md:pb-[100px] lg:pb-[60px] 2xl:pb-[80px] bg-theme-tertiary-color border-0 border-b border-solid border-b-gray-300 relative z-0">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="z-10 text-theme-primary-color-darker font-extralight text-4xl lg:text-5xl text-center uppercase [text-shadow:_0.08em_0.08em_0.08em_rgba(0,0,0,.14)] font-JuliusSansOne">
        <?= $page_data['page_title'] ?>
    </div>
</div>

<div class="">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-[1000px] min-w-0 p-5 md:p-10 mx-auto">
        <?php if ($data['pagination']['count'] > 0) : ?>
            <?php foreach ($data['items'] as $key => $item) { ?>
                <?php $item_options = json_decode($item['options'], true); ?>
                <a href="/<?= $item['page_slug'] ?>" class='no-underline text-inherit rounded-lg overflow-hidden shadow-card-shadow'>
                    <div class="aspect-video overflow-hidden">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($item_options, 'hero_image'); ?>" alt="news-img" class="w-full h-full object-cover object-center hover:scale-105 transition-all ease-linear duration-300">
                    </div>
                    <div class="p-5 flex flex-col gap-5 h-[220px]">
                        <div class="line-clamp-3 font-extralight text-xl leading-5 font-JuliusSansOne text-[#666]"><?= $item['page_title'] ?></div>
                        <div class="line-clamp-4 text-base font-light text-[#666]"><?= mb_strimwidth(strip_tags($item_options['blog_content']), 0, 500) ?></div>
                        <div class="test__details__action mt-auto text-theme-primary-color-darker">
                            <?= $page_data_options['blogs_card_btn'] ?>
                        </div>
                    </div>
                </a>
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