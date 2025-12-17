<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/services');
$services_options = json_decode($component_data['options'], true);
?>

<!-- Services Section -->
<div class="services px-6">
    <div class="container xl:max-w-[1140px] mx-auto py-24">
        <div class="grid grid-flow-row-dense gap-[30px] md:gap-[40px] lg:gap-[80px] xl:gap-[120px] sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-[460px,1fr]">
            <div class="section-wrapper">
                <span class="text-primary uppercase">
                    <?= $services_options['services_sub_title'] ?>
                </span>
                <h1 class="mt-5 text-2xl md:text-3xl lg:text-4xl leading-5 titleColor font-semibold">
                    <?= $services_options['services_title'] ?>
                </h1>
                <div class="mt-5 text-lg leading-6">
                    <?= $services_options['services_description'] ?>
                </div>
                <div class="mt-5">
                    <a
                        class="btn-pill"
                        href="#">
                        <?= $services_options['services_button_label'] ?>
                    </a>
                </div>
            </div>
            <div class="section-wrapper flex flex-col gap-5">
                <?php if (!empty($services_options['services_list'])) : ?>
                    <?php foreach ($services_options['services_list']['services_title'] as $uid => $title) : ?>
                        <div class="rounded-xl md:rounded-3xl xl:rounded-[30px] bg-[#002F6D1A] p-5 md:p-6 lg:p-7 xl:p-[30px]">

                            <div class="grid xl:grid-cols-[60px,1fr] gap-5 md:gap-6 lg:gap-7 xl:gap-[30px] items-center">
                                <img
                                    src="<?= \App\Utils\SitesPage::getMediaOptionByKey($services_options['services_list']['services_image'], $uid); ?>"
                                    alt="<?= $title ?>"
                                    class="w-full max-w-[50px] xl:max-w-[60px]"
                                    loading="lazy" />
                                <div class="flex flex-col gap-2.5">
                                    <h2
                                        class="my-0 text-headingSm leading-[27px] text-titleColor font-semibold">
                                        <?= $title ?>
                                    </h2>
                                    <p class="text-base leading-snug">
                                        <?= $services_options['services_list']['services_details'][$uid] ?? '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>