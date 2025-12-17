<?php
$district = $property->getField('state');
$municipality = $property->getField('municipality');

$address = $district;
if ($district && $municipality) {
    $address .= ', ' . $municipality;
} elseif ($municipality) {
    $address = $municipality;
}
?>
<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-property'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<div class="pt-[155px] pb-[60px] relative property-item" id="<?= $property->get('id') ?>" data-sale-rent="<?= $property->getCustomSaleRent() ?>">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'primary_bg_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="flex flex-col lg:flex-row gap-5 lg:gap-10 lg:justify-center lg:items-center h-full px-10 max-w-[1600px] mx-auto">
        <div class="flex-1">
            <span class="inline-block text-theme-primary-color-darker text-lg uppercase py-1 px-4 border border-solid border-theme-primary-color-darker bottom-3 right-3 rounded-[50px]"><?= $property->getField('sale_rent') ?></span>
            <div class="mt-5 text-theme-primary-color-darker text-4xl font-JuliusSansOne"><?= $property->get('name') ?></div>
            <div class="mt-5 text-lg font-medium text-[#160301]"><?= $address ?></div>
            <div class="mt-5 text-xl text-[#666]"><?= $property->getWebsitePrice() ?></div>
            <div class="mt-5 property-features-section border border-solid border-gray-200 bg-[#ffffff80] p-5 rounded-[10px]">
                <?= $this->element('property_features/short-layout-1', ['label_prefix' => ':']); ?>
            </div>
            <div class="mt-5 flex flex-col lg:flex-row lg:items-center justify-between">
                <div>
                    <a href='/files/pdf/<?= $property->getField('ref') ?>' class="no-underline btn btn-primary-alt group relative inline-flex justify-center items-center shadow-md">
                        <?= $page_data_options['brochure_label'] ?>
                    </a>
                </div>
                <div>
                    <div class="a2a_kit my-4 a2a_kit_size_32 a2a_default_style clear-both">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_email"></a>
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:basis-1/2 xl:basis-3/5 md:h-[350px] xl:h-[500px] relative">
            <div class="heart-icon wishlist-btn z-[10]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
            </div>
            <img src="<?= $property->getPhotoUrl('featured_photo', 'large', true); ?>" alt="Featured Photo" class="w-full h-full object-cover rounded-xl"/>
        </div>
    </div>
</div>
<div class="px-5 md:px-10 pt-16 max-w-[1600px] mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10 xl:gap-24">
        <div class="h-[250px] md:h-[450px] xl:h-[500px]">
            <?= $this->element('gallery/template-1', ['obj' => $property, 'media_names' => ['featured_photo', 'photos'], 'gallery_template' => 'qoetix-gallery--template-3']); ?>
        </div>
        <div>
            <div class="font-JuliusSansOne text-[#333] text-3xl mb-5"><?= $page_data_options['property_desc_title'] ?></div>
            <div class="whitespace-pre-line text-lg leading-8 text-[#2d2d2d]"><?= $property->getField('description') ?></div>
        </div>
    </div>
    <!-- Features section -->
    <div class="pt-10 property-features box-border w-full">
        <?= $this->element('property_features/layout-1'); ?>
    </div>
    <!-- Enquiry section -->
    <div class="text-center py-10 my-10 rounded-xl border border-solid border-gray-200" style="background-color: <?= $page_data_options['enquiry_bg_color'] ?>;">
        <div class="text-2xl xl:text-3xl font-JuliusSansOne text-theme-primary-color-darker mb-5 lg:mb-10">
            <?= $page_data_options['enquiry_title'] ?>
        </div>
        <div class="max-w-[700px] mx-auto px-10 box-border">
            <form id="enquiry-form" action="" class="grid w-full gap-5 enquiry-form" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Property - Book a viewing']); ?>
                    <?= \App\Utils\Leads::loadPropertyRequiredFields($property); ?>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="form-group">
                        <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999]" type="text" id="first_name" name="first_name" placeholder="<?= $page_data_options['enquiry_first_name'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999]" type="text" id="last_name" name="last_name" placeholder="<?= $page_data_options['enquiry_last_name'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="form-group">
                        <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999]" type="text" id="email" name="email" placeholder="<?= $page_data_options['enquiry_email'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999] required-field" type="text" id="phone" name="phone" placeholder="<?= $page_data_options['enquiry_phone_number'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" placeholder="<?= $page_data_options['enquiry_message'] ?>" id="message" name="message" rows="5" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999]"></textarea>
                    <div class="form-group__helper"></div>
                </div>
            </form>
            <div class="text-left">
                <button id="submit-btn" class="min-w-[150px] mt-5 btn btn-secondary g-recaptcha w-full md:w-auto" type="submit" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $page_data_options['enquiry_submit_btn'] ?>
                </button>
                <div class="generic-helper"></div>
            </div>
        </div>
    </div>
    <!-- Map Section -->
    <div class="box-border w-full responsive-map mb-10">
        <?php
        $coordinates = $property->getField('coordinates');
        $markers = [];
        if (!empty($coordinates)) {
            $markers = [
                [
                    'coordinates' => $coordinates,
                    'popupDetails' => [
                        'title' => $property->get('name'),
                        'description' => $property->get('description'),
                        'price' => [
                            'label' => 'Starting From:',
                            'value' => $property->getWebsitePrice(),
                        ],
                        'url' => $property->getUrl(),
                        'image' => $property->getPhotoUrl('featured_photo', 'medium', true),
                    ],
                ],
            ];
        }
        ?>
        <?= $this->element('maps/single', ['markers' => $markers]); ?>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>