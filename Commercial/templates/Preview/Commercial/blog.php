<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Commercial/css/tw-blog'); ?>
<?php include __DIR__ . '/header/header.php' ?>
<div class="blog-page">
    <div class="h-screen xl:h-[50vh] flex flex-col justify-center !bg-center !bg-cover !bg-no-repeat" style="background: url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <div class="px-10 lg:px-16 xl:pl-20 xl:pr-0 2xl:pl-44 xl:max-w-xl 2xl:max-w-2xl content">
            <div class="text-base font-bold xl:text-lg 2xl:text-xl text-white sub-title">
                <div id="blog-publish"></div>
                <script>
                    let elem = document.getElementById('blog-publish')
                    let publish_date = new Date('<?= $page_data['publish_from']->format('Y-m-d\TH:i:s\Z') ?>')
                    let month = publish_date.toLocaleString('default', { month: 'long' });
                    let publish_date_str = month + ' ' +  String(publish_date.getDate()) + ', ' + publish_date.getFullYear()
                    elem.innerHTML = publish_date_str;
                </script>
            </div>
            <div class="mt-4 text-xl xl:text-3xl 2xl:text-5xl font-bold text-white">
                <?= $page_data['page_title'] ?>
            </div>
            <div class="mt-4 ext-base xl:text-lg 2xl:text-2xl text-white">
                <?= $page_data_options['blog_primary_sub_title'] ?>
            </div>
        </div>
    </div>
    <div class="px-10 md:px-32 lg:px-40 xl:px-72 2xl:px-96 py-14 text-base xl:text-lg 2xl:text-xl">
        <?= $page_data_options['blog_primary_description'] ?>
        <div class="mt-10">
            <?php $previous_page = \App\Utils\SitesPage::getPreviousRecordByPublishDate($site_data->get('id'), $page_data); ?>
            <?php if (!empty($previous_page)) : ?>
                <a href="/<?= $previous_page['page_slug'] ?>" class="mt-6 btn btn-bg-white"><?= $site_data_options['previous_btn_label'] ?? '' ?></a>
            <?php endif; ?>
            <?php $next_page = \App\Utils\SitesPage::getNextRecordByPublishDate($site_data->get('id'), $page_data); ?>
            <?php if (!empty($next_page)) : ?>
                <a href="/<?= $next_page['page_slug'] ?>" class="mt-6 btn btn-bg-theme"><?= $site_data_options['next_btn_label'] ?? '' ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include __DIR__ . '/footer/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>