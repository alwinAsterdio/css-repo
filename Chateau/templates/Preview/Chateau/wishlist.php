<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-wishlist'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="search-menu pt-[100px] bg-theme-tertiary-color pb-2 border-0 border-b border-solid border-b-gray-300 relative">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover"/>
    <div class="px-10 max-w-[1600px] mx-auto">
        <?php echo \App\Utils\Search::render('advance', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6', 'mobile_filter' => true]); ?>
    </div>
</div>
<div class='bg-white px-5 md:px-10 2xl:px-12 py-10 max-w-[1600px] mx-auto'>
    <div class="font-extralight text-3xl text-center mb-10"><?= $page_data_options['section_title'] ?></div>
    <div class="wishlist-list"></div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/chateau/js/wishlist.js'); ?>