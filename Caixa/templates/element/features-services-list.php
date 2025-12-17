<?php if (!empty($page_data_options['features_list'])) : ?>
    <div class="container-section features-section py-[40px] 1.5xl:py-[93.5px]">
        <h2 class="features-title px-3 mb-10 mt-0 text-[28px] leading-[33.6px] text-center lg:text-[38px] 1.5xl:leading-[45.6px] text-theme-primary-color font-normal">
            <?= $page_data_options['features_section_title'] ?>
        </h2>
        <?php ksort($page_data_options['features_list']['feature_list_title']); ?>
        <div class="flex flex-col flex-wrap justify-center gap-[24px] shortcut-section lg:flex-row">
            <?php foreach ($page_data_options['features_list']['feature_list_title'] as $uid => $title) : ?>
                <a href="<?= $page_data_options['features_list']['feature_list_url'][$uid] ?? '' ?>" target="_blank" class="feature-service-item relative min-h-[280px] lg:min-h-[337px] lg:max-w-[410px] flex flex-col flex-1 items-center justify-center rounded-[24px] py-[40px] px-[24px] box-border no-underline text-inherit <?= $page_data_options['features_list']['feature_list_class_name'][$uid] ?? '' ?>" style="background-color: <?= $page_data_options['features_list']['feature_list_bg_color'][$uid] ?>">
                    <div class="inline-flex pb-[24px] 1.5xl:pb-[40px]">
                        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['features_list']['feature_list_img'], $uid); ?>" class="w-[40px] h-[40px] lg:w-[80px] lg:h-[80px] rounded-[40px] object-cover" alt="Feature Image" loading="lazy"/>
                    </div>
                    <div class="flex flex-col items-center flex-1">
                        <h3 class="flex items-center justify-center pb-2 text-[18px] leading-[21.6px] 1.5xl:text-[24px] 1.5xl:leading-[28.8px] font-semibold text-center lg:pb-4 text-theme-primary-color my-0 min-h-[44px] feature-title"><?= $title ?></h3>
                        <div class="flex flex-1 justify-center items-center text-center text-[16px] leading-[20.8px] font-[Roboto] feature-description">
                            <?= $page_data_options['features_list']['feature_list_descr'][$uid] ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
