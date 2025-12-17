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
<?= $this->Html->css('/Villa/css/tw-property'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[150px] bg-[var(--theme-background-color-1)] pb-10 border-0 border-b border-solid border-b-gray-300">
    <?php echo \App\Utils\Search::render('advance', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6', 'mobile_filter' => true]); ?>
</div>

<div class="mt-10 mx-5 md:mx-10 flex-col relative property-item" id="<?= $property->get('id') ?>" data-sale-rent="<?= $property->getCustomSaleRent() ?>">
    <div class="text-base mb-5">
        <span class="bg-white drop-shadow-[2px_1px_10px_rgba(0,0,0,0.16)] px-5 py-2 mr-3"><?= $property->getField('sale_rent') ?></span>
        <span>#<?= $property->get('ref') ?></span>
    </div>
    <div class="text-4xl font-extralight">
        <?= $property->get('name') ?>
    </div>
    <div class="font-semibold text-lg uppercase">
        <?= $address ?>
    </div>
    <div class="text-2xl font-semibold mt-5 mb-3">
        <?= $property->getWebsitePrice(); ?>
    </div>
    <div class="property-features-section">
        <?= $this->element('property_features/short-layout-1', ['label_prefix' => ':']); ?>
    </div>
    <div class="heart-icon wishlist-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
    </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10 xl:gap-24 mx-5 md:mx-10">
    <div>
        <?= $this->element('gallery/template-1', ['obj' => $property, 'media_names' => ['featured_photo', 'photos'], 'gallery_template' => 'qoetix-gallery--template-3']); ?>
    </div>
    <div>
        <div class="font-medium text-3xl"><?= $page_data_options['property_title'] ?></div>
        <div class="whitespace-pre-line">
            <?= $property->getField('description') ?>
        </div>
        <div class="mt-10 mb-5">
            <a href='/files/pdf/<?= $property->getField('ref') ?>' class="no-underline btn btn-secondary group relative inline-flex justify-center items-center shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[20px] group-hover:cursor-pointer fill-theme-primary-color group-hover:fill-theme-secondary-color group-focus:fill-theme-secondary-color  transition-all duration-100 pr-3"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                <?= $page_data_options['brochure_label'] ?>
            </a>
        </div>
        <div class="a2a_kit my-4 a2a_kit_size_32 a2a_default_style clear-both">
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        </div>
    </div>
</div>

<!-- Features section -->
<div class="mx-5 md:mx-10 pt-10 xl:pt-20 property-features box-border">
    <div class="text-2xl 2xl:text-3xl font-semibold">
        <?= $page_data_options['features_title'] ?>
    </div>
    <div class="mt-6 xl:mt-9 w-full box-border">
        <?= $this->element('property_features/layout-1'); ?>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 xl:gap-24 mx-5 lg:mx-10 mt-10 lg:mt-20 mb-14">
    <div>
        <div class="text-2xl xl:text-3xl font-medium mb-5 lg:mb-10">
            <?= $page_data_options['map_title'] ?>
        </div>
        <div class="box-border w-full responsive-map">
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
    <div>
        <div class="text-2xl xl:text-3xl font-medium mb-5 lg:mb-10">
            <?= $page_data_options['enquiry_title'] ?>
        </div>
        <form id="enquiry-form" action="" class="grid w-full gap-5 enquiry-form" integration-recaptcha=true data-action="lead_form">
            <div class='hidden'>
                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Property - Book a viewing']); ?>
                <?= \App\Utils\Leads::loadPropertyRequiredFields($property); ?>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <input class="input-field" type="text" id="first_name" name="first_name" placeholder="<?= $page_data_options['enquiry_first_name'] ?>" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <input class="input-field" type="text" id="last_name" name="last_name" placeholder="<?= $page_data_options['enquiry_last_name'] ?>" />
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <input class="input-field" type="text" id="email" name="email" placeholder="<?= $page_data_options['enquiry_email'] ?>" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <input class="input-field required-field" type="text" id="phone" name="phone" placeholder="<?= $page_data_options['enquiry_phone_number'] ?>" />
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="form-group">
                <textarea type="text" placeholder="<?= $page_data_options['enquiry_message'] ?>" id="message" name="message" rows="5" class="required-field"></textarea>
                <div class="form-group__helper"></div>
            </div>
        </form>
        <button id="submit-btn" class="mt-5 btn btn-primary g-recaptcha w-full md:w-auto" type="submit" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
            <?= $page_data_options['enquiry_submit_btn'] ?>
        </button>
        <div class="generic-helper"></div>
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