<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/VidiGroup/css/tw-property'); ?>

<!-- Header -->
<?php include __DIR__ . '/parts/top-menu.php'; ?>

<!-- Property Details -->
<div class="box-border relative w-full p-[30px] sm:p-10 md:p-16 2xl:p-20 overflow-hidden property-intro">
    <div class="text-sm xl:text-base text-theme-primary-color property-ref"> Ref: <?= $property->get('ref') ?></div>
    <div>
        <?php if ($property->get('sale_rent') === 'for_sale_and_rent') : ?>
            <?php if ($property->get('price_qualifier') === 'poa') { ?>
                <div class="mt-1 text-[27px] xl:text-4xl 2xl:text-[2.75rem] font-bold">
                    <?= __('POA') ?>
                </div>
            <?php } else { ?>
                <div class="flex items-end gap-1 pb-3">
                    <div class="mt-1 text-[27px] xl:text-4xl 2xl:text-[2.75rem] font-bold">
                        <?= $property->getField('list_selling_price_amount', ['default_value' => '--']) ?>
                    </div>
                    <div class="text-theme-primary-color text-xs">/ For Sale</div>
                </div>
                <div class="flex items-end gap-1 pb-3">
                    <div class="mt-1 text-[27px] xl:text-4xl 2xl:text-[2.75rem] font-bold">
                        <?= $property->getField('list_rental_price_amount', ['default_value' => '--']) ?>
                    </div>
                    <div class="text-theme-primary-color text-xs">/ For Rent</div>
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="mt-1 text-[27px] xl:text-4xl 2xl:text-[2.75rem] font-bold">
                <?= $property->getWebsitePrice(['default_value' => '--']) ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mt-1 text-[#172D30] font-light text-2xl 2xl:text-3xl property-title"> <?= $property->get('name') ?> </div>
    <div class="flex mt-5 property-intro">
        <div class="pr-6 mr-6 border-solid border-0 border-r border-[#D5E0E1]">
            <div class="text-xs font-light xl:text-sm text-theme-primary-color">Property Type</div>
            <div class="text-[13px] capitalize xl:text-base"><?= $property-> getField('property_type', ['default_value' => '--'])?></div>

        </div>
        <div class="pr-6  mr-6 border-solid border-0 border-r border-[#D5E0E1]">
            <div class="text-xs font-light xl:text-sm text-theme-primary-color">Internal Area</div>
            <div class="text-[13px] xl:text-base"><?= $property->getField('internal_area_amount', ['default_value' => '--']) ?></div>

        </div>
        <div class="pr-6 mr-6 border-solid border-0 border-r border-[#D5E0E1]">
            <div class="text-xs font-light xl:text-sm text-theme-primary-color">Beds</div>
            <div class="text-[13px] xl:text-base"><?= $property->getField('bedrooms', ['default_value' => '--']) ?></div>

        </div>
        <div class="pr-6 mr-6 ">
            <div class="text-xs font-light xl:text-sm text-theme-primary-color">Baths</div>
            <div class="text-[13px] xl:text-base"><?= $property->getField('bathrooms', ['default_value' => '--']) ?></div>

        </div>
    </div>
    <div class="mt-5 text-[13px] xl:text-base font-light leading-5 text-[#172D30] property-description whitespace-pre-line">
        <?= $property->getField('description') ?>
    </div>
    <div class="flex gap-5 mt-6 justify-between lg:justify-normal flex-wrap">
        <button class="btn btn-primary" onClick="document.getElementById('contact-us').scrollIntoView();">
            <?= $page_data_options['primary_section_btn_text'] ?>
        </button>
        <a href='/files/pdf/<?= $property->getField('ref') ?>' class=" text-black no-underline inline-block btn btn-secondary group relative !pr-[35px]">
            <?= $page_data_options['primary_section_brochure_label'] ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="absolute top-1/2 right-[10px] -translate-y-1/2 h-[20px] group-hover:cursor-pointer fill-theme-primary-color group-hover:fill-theme-secondary-color group-focus:fill-theme-secondary-color  transition-all duration-100"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
        </a>
    </div>
</div>

<!-- Gallery -->
<div class="w-full h-screen property-gallery">
    <?= $this->element('gallery/template-1', [
    'obj' => $property,
    'media_names' => [
        'featured_photo',
        'photos',
    ],
]); ?>
</div>

<!-- Property Essentials -->
<div class="p-[30px] sm:p-10 md:p-16 xl:p-0 xl:px-20 xl:pt-20 property-features box-border">
    <div class="text-2xl 2xl:text-3xl">
        <?= $page_data_options['property_essentials_section_title'] ?>
    </div>
    <div class="text-lg 2xl:text-xl lg:mt-2 text-theme-primary-color">
        <?= $page_data_options['property_essentials_section_sub_title'] ?>
    </div>
    <div class="mt-6 xl:mt-9 w-full box-border">
        <?= $this->element('property_features/layout-1'); ?>
    </div>
</div>

<!-- Contact Us -->
<div class="xl:m-20 bg-[#1C2526] xl:relative xl:h-[45rem] box-border xl:rounded-xl contact-us">
    <img class="hidden object-cover w-full h-full xl:absolute xl:top-0 xl:block xl:rounded-xl" src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'contact_us_section_image'); ?>" alt="contact-us-bg-image">
    <div class="box-border z-20 px-6 py-16 text-center xl:absolute xl:text-left xl:py-40 xl:w-1/2 xl:pl-36 form" >
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'contact_us_section_mobile_image'); ?>" class="h-12 mb-4 xl:hidden" alt="mobile-icon">
        <div class="text-2xl text-white xl:text-3xl form-title">
            <?= $page_data_options['contact_us_section_title'] ?>
        </div>
        <div class="mt-2 text-xl font-light text-white form-subtitle">
            <?= $page_data_options['contact_us_section_sub_title'] ?>
        </div>
        <form id="enquiry-form" action="" class="grid w-full gap-5 mt-10" integration-recaptcha=true data-action="lead_form">
            <div class='hidden'>
                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Property - Book a viewing']); ?>
                <?= \App\Utils\Leads::loadPropertyRequiredFields($property); ?>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <input class="input-field" type="text" id="first_name" name="first_name" placeholder="First Name" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <input class="input-field" type="text" id="last_name" name="last_name" placeholder="Last Name" />
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <input class="input-field" type="text" id="email" name="email" placeholder="Email" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <input class="input-field" type="text" id="phone" name="phone" placeholder="Phone" />
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="form-group">
                <textarea type="text" class="w-full box-border text-base placeholder-gray-500 xl:border-none border-solid border border-[#EBEBEB] resize-none text-[#687F82] h-32 bg-[#F0F4F4] rounded-3xl px-4 pt-4 focus:outline-none focus:border-none required-field" placeholder="Say Something..." id="message" name="message"></textarea>
                <div class="form-group__helper"></div>
            </div>
        </form>
        <button id="submit-btn" class="mt-5 btn btn-primary g-recaptcha" type="submit" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
            <?= $page_data_options['contact_us_section_lead_btn_text'] ?>
        </button>
        <div class="generic-helper"></div>
    </div>
</div>

<!-- Footer -->
<?php include __DIR__ . '/parts/footer.php'; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
