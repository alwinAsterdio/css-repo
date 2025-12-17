<?php
$media_names = [
    'featured_photo',
    'photos',
];

$photo_urls = [];
foreach ($media_names as $field_name) {
    $urls = $obj->getField($field_name, ['size' => 'large', 'default_image' => true]);
    if (empty($urls)) {
        continue;
    }

    $photo_urls = array_merge_recursive($photo_urls, $urls);
}

if (empty($photo_urls)) {
    return;
}

$photo_urls = array_unique($photo_urls);
$show_only_one = count($photo_urls) <= 2;
$gallery_id = !empty($gallery_id) ? $gallery_id : 'gallery-1';
?>
<div class="g-section relative flex flex-row gap-6 h-[256.95px] md:h-[400px] 1.5xl:h-[542px] box-border">
    <div class="<?= $show_only_one ? 'w-full' : 'w-full lg:w-4/6' ?> h-full box-border" data-pagination="1">
        <img src="<?= $obj->getPhotoUrl('featured_photo', 'large', true); ?>" alt="Featured Photo" class="w-full h-full object-cover md:rounded-[16px]"/>
    </div>
    <?php if (!$show_only_one) : ?>
        <div class="h-full flex-1 hidden lg:inline-flex flex-col gap-6 box-border">
            <div class="w-full h-full flex-1 overflow-hidden">
                <img src="<?= $photo_urls[1]; ?>" alt="Featured Photo" class="w-full h-full object-cover rounded-[16px]"/>
            </div>
            <div class="w-full h-full flex-1 overflow-hidden">
                <img src="<?= $photo_urls[2]; ?>" alt="Featured Photo" class="w-full h-full object-cover rounded-[16px]"/>
            </div>
        </div>
    <?php endif; ?>
    
</div>
