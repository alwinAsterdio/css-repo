<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-wishlist'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="search-menu pt-[90px] md:pt-[75px] lg:pt-[90px] pb-5 md:pb-0 border-0 border-b border-solid border-b-gray-300">
    <?php echo \App\Utils\Search::render('advance-2', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6', 'mobile_filter' => true]); ?>
</div>
<div class="bg-white">
    <div class='px-5 md:px-10 2xl:px-12 py-10 max-w-[1600px] mx-auto'>
        <div class="font-extralight text-3xl text-center mb-10"><?= $page_data_options['section_title'] ?></div>
        <div class="wishlist-list"></div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/Penthouse/js/wishlist.js'); ?>
