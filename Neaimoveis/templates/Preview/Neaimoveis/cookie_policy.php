<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-cookie_policy'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<!-- Hero Section -->
<div class="bg-[#002F6D]" style="background:url('<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>'); background-position:center; background-size:cover;">
    <div class="px-6">
        <div class="container xl:max-w-[1140px] mx-auto pt-48 pb-20 lg:pb-24">
            <div>
                <div class="max-w-2xl">
                    <h1 class="mt-5 text-4xl leading-tight font-bold text-white">
                        <?= $page_data['page_title'] ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="px-6 p-20 lg:p-24">
    <div class="container xl:max-w-[1140px] mx-auto">
        <?= $page_data_options['cookie_content'] ?>
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>