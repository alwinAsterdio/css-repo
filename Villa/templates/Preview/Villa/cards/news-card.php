<?php $options = json_decode($item['options'], true); ?>

<a href='/<?= $item['page_slug'] ?>' class="text-black shadow-lg min-h-[50px] inline-block no-underline group">
    <div class="shadow-lg min-h-[50px] box-border card h-full flex flex-col">
        <div class="relative aspect-video overflow-hidden">
            <img class="absolute top-0 left-0 object-cover w-full h-full duration-300 ease-in-out cursor-pointer group-hover:scale-110" src="<?= \App\Utils\SitesPage::getMediaOptionByKey($options, 'hero_image'); ?>" alt="news-image" />
        </div>
        <div class="px-4 pb-8 box-border flex-1 inline-flex flex-col">
            <div class="text-base mt-4 font-semibold text-left line-clamp-2 h-12">
                <?= $item['page_title'] ?>
            </div>
            <div class="text-base text-[#75716f] leading-[1.875rem] line-clamp-4 mt-2 mb-4 post-data flex-1">
                <?= $options['blog_content'] ?>
            </div>
            <div>
                <button class="btn btn-sm btn-primary">
                    <?= $site_data_options['more_btn_label'] ?>
                </button>
            </div>
        </div>
    </div>
</a>