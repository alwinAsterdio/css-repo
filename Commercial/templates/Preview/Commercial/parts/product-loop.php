<?php $options = json_decode($item['options'], true); ?>
<div class="product flex flex-col">
    <div class="h-[50px]">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($options, 'product_feature_photo'); ?>" alt='product-image' class="h-full object-contain object-left"/>
    </div>
    <div class="mt-5 text-lg leading-5 font-bold line-clamp-1">
        <?= $item['page_title'] ?>
    </div>
    <div class="text-sm 2xl:text-base text-[#858585] font-bold line-clamp-1">
        <?= $options['product_primary_sub_title'] ?>
    </div>
    <div class="mt-2 text-sm 2xl:text-base line-clamp-4 flex-1">
        <?= $options['product_primary_description'] ?>
    </div>
    <div class="mt-6">
        <a href="/<?= $item['page_slug'] ?>" class="btn btn-sm btn-bg-white">
            <?= $site_data_options['more_btn_label']; ?>
        </a>
    </div>
</div>