<?php $options = json_decode($item['options'], true); ?>
<div class="blog flex flex-col">
    <div class="text-base text-theme-primary-color date">
        <div class="datetime-show" data-date="<?= $item['publish_from']->format('Y-m-d\TH:i:s\Z') ?>"></div>
    </div>
    <div class="mt-2 text-lg font-bold leading-5 line-clamp-3 md:h-[62px]">
        <?= $item['page_title'] ?>
    </div>
    <div class="mt-2 line-clamp-6 flex-1">
        <?= $options['blog_primary_description'] ?>
    </div>
    <a href="/<?= $item['page_slug'] ?>">
        <button class="mt-6 btn btn-bg-white"><?= $site_data_options['more_btn_label'] ?></button>
    </a>
</div>