<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-privacy_policy'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<div class="container-section py-5 md:py-10 lg:py-10">
    <h4 class="text-2xl font-semibold text-theme-primary-color my-0"><?= $page_data['page_title'] ?></h4>
    <div class="border-0 border-b border-solid border-[#E8E7E1] my-5"></div>
    <div class="c-html-content-section">
        <?= $page_data_options['primary_section_content'] ?>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>