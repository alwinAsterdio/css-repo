<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/contact-us-form');
$component_data_options = json_decode($component_data['options'], true);

$media_names = [
    'featured_photo',
    'photos',
];

$photo_urls = [];
$show_only_one = false;
if (!$obj->get('qoetix_listing_cached')) {
    foreach ($media_names as $field_name) {
        $urls = $obj->getField($field_name, ['size' => 'large', 'default_image' => true]);
        if (empty($urls)) {
            continue;
        }

        $photo_urls = array_merge_recursive($photo_urls, $urls);
    }

    if (!empty($photo_urls)) {
        $photo_urls = array_unique($photo_urls);
    }

    $show_only_one = count($photo_urls) <= 2;
}

$agent_brand = \App\Connector\Brand::getAgentInfo($property->getField('agent'));
$agent_email = '';
$agent_mobile = '';
$brand_logo = '';
$agent_name = '';
if (!empty($agent_brand)) {
    $agent_email = $agent_brand->get('email');
    $agent_mobile = $agent_brand->get('tel_office') ?: $agent_brand->get('tel_mobile');
    $brand_logo = $agent_brand->getPhotoUrl('logo');
    $agent_name = $agent_brand->get('name');
}
?>
<div class="g-section relative flex flex-row gap-6 h-[256.95px] md:h-[400px] 1.5xl:h-[542px] box-border">
    <div class="<?= $show_only_one ? 'full-width ' : '' ?> h-full box-border qoetix-gallery-section qoetix-gallery <?= $property->get('qoetix_listing_cached') ? 'qoetix-gallery-section--single-auto' : '' ?>" data-pagination="1" id="single-gallery-1">
        <img src="<?= $obj->getFeaturedPhotoURL('large'); ?>" alt="Featured Photo" class="w-full h-full object-cover md:rounded-[16px]" onerror="featuredPhotoOnError(this)"/>
    </div>
    <?php if (!$show_only_one) : ?>
        <div class="h-full flex-1 hidden lg:inline-flex flex-col gap-6 box-border gallery-side<?= $property->get('qoetix_listing_cached') ? ' gallery-side--loading' : '' ?>">
            <div class="w-full h-full flex-1 overflow-hidden relative">
                <img src="<?= $photo_urls[1] ?? '' ?>" alt="Featured Photo" class="w-full h-full object-cover rounded-[16px] gallery-second-photo" onerror="featuredPhotoOnError(this)"/>
            </div>
            <div class="w-full h-full flex-1 overflow-hidden relative">
                <img src="<?= $photo_urls[2] ?? '' ?>" alt="Featured Photo" class="w-full h-full object-cover rounded-[16px] gallery-third-photo" onerror="featuredPhotoOnError(this)"/>
            </div>
        </div>
    <?php endif; ?>
    <div class="absolute bottom-5 right-4">
        <button class="btn btn-secondary btn-pill show-gallery" data-contact-btn-label='<?= $contact_label ?>' data-phone-label='<?= $phone_label ?>' data-phone-value="<?= $agent_mobile ?>"><?= $page_data_options['view_all_images_label'] ?></button>
    </div>
</div>
<div class="form-agent-info bg-[#F1F1ED] block md:hidden rounded-b-3xl <?= (empty($brand_logo) && empty($agent_name) ? 'hidden' : '') ?>">
    <div class="form-agent-info__inner text-theme-primary-color py-4 <?= (empty($brand_logo) ? 'justify-center text-center' : '') ?>">
        <div class="text-base leading-tight font-[Roboto]">
            <?= $component_data_options['contact_us_header_label'] ?>
            <span class="font-semibold form-agent-info__inner__name"><?= $agent_name ?></span>
        </div>
        <div
            class="flex-1 pl-6 inline-flex items-center justify-end form-agent-info__inner__logo <?= (empty($brand_logo) ? 'hidden' : '') ?>">
            <?php if (!empty($brand_logo)) : ?>
                <img src="<?= $brand_logo ?>" class="object-contain h-[25px] max-w-[95px]" />
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    const single_page_photo_urls = <?= json_encode($photo_urls, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
</script>
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
<?= $this->html->script('/js/qoetix-gallery.js'); ?>
