<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Commercial/css/tw-products_personal.css'); ?>
<?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'product_personal', $current_page, 8); ?>
<?php include __DIR__ . '/parts/products-page.php' ?>
<?= $this->render('/Preview/general/footer');
