<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Commercial/css/tw-products_commercial.css'); ?>
<?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'product_commercial', $current_page, 8); ?>
<?php include __DIR__ . '/parts/products-page.php' ?>
<?= $this->render('/Preview/general/footer');
