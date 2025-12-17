<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-services'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/services');
$services_options = json_decode($component_data['options'], true);
?>

<div>
    <div class="bg-[var(--accent-color)]">
        <div class="px-6 pt-48 pb-20 lg:pb-24">
            <div class="container xl:max-w-[1140px] mx-auto text-white">
                <div class="max-w-2xl">
                    <h1 class="m-0 text-3xl md:text-4xl lg:text-5xl leading-tight font-bold">
                        <?= $page_data_options['hero_title'] ?>
                    </h1>
                    <div class="mt-5">
                        <?= $page_data_options['hero_description'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-20 lg:py-24">
        <div class="container xl:max-w-[1140px] mx-auto">
            <div class="section-wrapper grid gap-5 md:gap-6 lg:gap-7 xl:gap-8">
                <?php if (!empty($services_options['services_list'])) : ?>
                    <?php foreach ($services_options['services_list']['services_title'] as $uid => $title) : ?>
                        <div class="p-6 md:p-10 lg:p-14 rounded-xl md:rounded-3xl border border-solid border-[var(--border-light)] service-card">
                            <div class="grid gap-5 md:gap-6 lg:gap-7 xl:gap-8 items-center">
                                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($services_options['services_list']['services_image'], $uid); ?>"
                                    alt="<?= $title ?>" class="w-full max-w-12 xl:max-w-16" loading="lazy" />
                                <div class="flex flex-col gap-2.5">
                                    <h2 class="m-0 text-2xl md:text-4xl leading-tight font-bold titleColor">
                                        <?= $title ?>
                                    </h2>
                                    <div class="text-base leading-snug">
                                        <?= $services_options['services_list']['services_description'][$uid] ?? '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>