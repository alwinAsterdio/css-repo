<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-pricing'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-10 lg:gap-14">
                <!-- Basic Plan -->
                <div class="p-6 md:p-10 lg:p-14 rounded-xl md:rounded-3xl border border-solid border-[var(--border-light)]">
                    <div class="text-center">
                        <h2 class="m-0 mb-2.5 text-2xl md:text-3xl leading-tight font-bold titleColor">
                            <?= $page_data_options['basicPlan_title'] ?>
                        </h2>
                        <p><?= $page_data_options['basicPlan_sub_title'] ?></p>
                    </div>
                    <div class="my-5 py-7 border border-x-0 border-y-1 border-solid border-[#EFEFEF]">
                        <?= $page_data_options['basicPlan_description'] ?>
                    </div>
                    <div class="text-center">
                        <?= $page_data_options['basicPlan_cta_description'] ?>
                        <a
                            class="btn-pill mt-7"
                            href="<?= $page_data_options['basicPlan_button_link'] ?>"
                            target="_blank">
                            <?= $page_data_options['basicPlan_button_label'] ?>
                        </a>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div class="p-6 md:p-10 lg:p-14 rounded-xl md:rounded-3xl border border-solid border-[var(--border-light)]">
                    <div class="text-center">
                        <h2 class="m-0 mb-2.5 text-2xl md:text-3xl leading-tight font-bold titleColor">
                            <?= $page_data_options['proPlan_title'] ?>
                        </h2>
                        <p><?= $page_data_options['proPlan_sub_title'] ?></p>
                    </div>
                    <div class="my-5 py-7 border border-x-0 border-y-1 border-solid border-[#EFEFEF]">
                        <?= $page_data_options['proPlan_description'] ?>
                    </div>
                    <div class="text-center">
                        <?= $page_data_options['proPlan_cta_description'] ?>
                        <a
                            class="btn-pill mt-7"
                            href="<?= $page_data_options['proPlan_button_link'] ?>"
                            target="_blank">
                            <?= $page_data_options['proPlan_button_label'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>