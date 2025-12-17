<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-wishlist'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[150px] bg-[var(--theme-background-color-1)] pb-10 border-0 border-b border-solid border-b-gray-300">
    <?php echo \App\Utils\Search::render('advance', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6', 'mobile_filter' => true]); ?>
</div>
<div class='bg-white px-5 md:px-10 2xl:px-12 py-10'>
    <div class="font-medium text-3xl"><?= $page_data_options['section_title'] ?></div>
    <div class="wishlist-list"></div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/Villa/js/wishlist.js'); ?>