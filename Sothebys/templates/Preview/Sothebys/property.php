<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Sothebys/css/tw-property'); ?>

<!-- Header -->
<?php include __DIR__ . '/parts/top-menu.php'; ?>

<!-- Property Details -->
<div class="flex flex-col lg:flex-row w-full">
    <div class="order-2 lg:order-1 lg:w-2/5 box-border relative property-section-space inline-flex flex-col justify-center">
        <div class="text-sm xl:text-xl text-theme-secondary-color font-medium property-ref"> Ref: <?= $property->get('legacy_id') ?></div>
        <div class="font-PlayfairDisplay t1 font-medium text-theme-primary-color property-title mb-4"> <?= $property->get('name') ?> </div>
        <div>
            <?php if ($property->get('sale_rent') === 'for_sale_and_rent') : ?>
                <?php if ($property->get('price_qualifier') === 'poa') { ?>
                    <div class="mt-1 font-bold text-xl text-theme-primary-color">
                        <?= __('POA') ?>
                    </div>
                <?php } else { ?>
                    <div class="flex items-end gap-1">
                        <div class="mt-1 font-bold text-xl text-theme-primary-color">
                            <?= $property->getField('list_selling_price_amount', ['default_value' => '--', 'plus_vat_class' => 'font-normal']) ?>
                        </div>
                        <div class="text-theme-primary-color text-xs">/ For Sale</div>
                    </div>
                    <div class="flex items-end gap-1">
                        <div class="mt-1 font-bold text-xl text-theme-primary-color">
                            <?= $property->getField('list_rental_price_amount', ['default_value' => '--', 'plus_vat_class' => 'font-normal']) ?>
                        </div>
                        <div class="text-theme-primary-color text-xs">/ For Rent</div>
                    </div>
                <?php } ?>
            <?php else : ?>
                <div class="mt-1 font-bold text-xl text-theme-primary-color">
                    <?= $property->getWebsitePrice(['default_value' => '--', 'plus_vat_class' => 'font-normal']) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="flex mt-5 property-intro flex-wrap">
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
        <?php $component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/request-call-back'); ?>
        <?php if (!empty($component_data)) { ?>
            <div>
                <a href="#enquiry-form-section" class="inline-block no-underline mt-10 btn btn-secondary"><?= $page_data_options['primary_section_btn_text'] ?></a>
            </div>
        <?php } ?>
    </div>
    <div class="order-1 lg:order-2 lg:w-3/5 w-full box-content property-photos-section">
        <div class="block box-border h-[50vh] lg:h-[70vh] property-gallery w-full relative">
            <?= $this->element('gallery/template-2', ['obj' => $property,'media_names' => ['featured_photo','photos',],'show_circle' => false,]); ?>
        </div>
    </div>
</div>

<div class="flex flex-col lg:flex-row my-10">
    <div class="mb-5 lg:mb-0 lg:basis-2/5 box-border text-theme-primary-color font-PlayfairDisplay t2 font-medium property-section-space">
        <span class="inline-block border-0 border-b pb-5 border-solid border-theme-secondary-color min-w-[250px]"><?= $page_data_options['description_section_title'] ?></span>
    </div>
    <div class="px-5 sm:px-10 md:px-10 lg:px-0 lg:basis-3/5 whitespace-pre-line text-base lg:text-xl text-[#666]"><?= $property->getField('description') ?></div>
</div>

<?php if (!empty($page_data_options['property_essentials_section_enabled'])) { ?>
    <!-- Property Essentials -->
    <div class="bg-theme-primary-color property-section property-features box-border">
        <div class="t2 text-theme-tertiary-color font-PlayfairDisplay font-medium text-center">
            <?= $page_data_options['property_essentials_section_title'] ?>
        </div>
        <div class="mt-6 xl:mt-9 w-full box-border">
            <?= $this->element('property_features/layout-1'); ?>
        </div>
    </div>
<?php } ?>

<?php if (!empty($page_data_options['floor_plan_section_enabled'])) { ?>
    <?php $floor_plans = $property->getField('floor_plans', ['size' => 'medium', 'single' => true,]); ?>
    <?php if (!empty($floor_plans)) { ?>
        <!-- Floor Plan -->
        <div class="my-10 xl:my-20">
            <div class="text-4xl text-theme-primary-color font-PlayfairDisplay font-medium text-center pb-10 xl:pb-20"><?= $page_data_options['floor_plan_section_title'] ?></div>
            <div class="w-full h-[70vh] property-gallery">
                <?= $this->element('gallery/template-2', ['obj' => $property,'media_names' => ['floor_plans',],'show_circle' => false, 'image_class' => 'object-contain']); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php if (!empty($page_data_options['contact_us_section_enabled'])) { ?>
    <!-- Contact Us -->
    <div class="box-border relative">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'contact_us_section_image'); ?>" class="object-cover absolute top-0 left-0 w-full h-full z-[-1]" alt="featured-photo" />
        <div class="flex flex-col lg:flex-row items-center property-section">
            <div class="lg:basis-4/6 pb-5 text-center lg:text-left">
                <div class="t1 text-theme-tertiary-color font-PlayfairDisplay font-medium pb-5"><?= $page_data_options['contact_us_section_title'] ?></div>
                <div class="t3 text-theme-secondary-color font-medium pb-5"><?= $page_data_options['contact_us_section_sub_title'] ?></div>
                <div class="text-theme-tertiary-color"><?= $page_data_options['contact_us_section_description'] ?></div>
            </div>
            <div class="lg:basis-2/6 inline-flex justify-center">
                <div class="form bg-theme-primary-color p-10 max-w-[250px] scroll-mt-[70px] lg:scroll-mt-[90px]" id="enquiry-form-section">
                    <div class="text-xl text-theme-tertiary-color mb-6 font-medium"><?= $page_data_options['contact_form_title'] ?></div>
                    <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form" data-redirect="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('thank-you'); ?>">
                        <div class='hidden'>
                            <?php
                            $lead_params = [
                                'form_name' => $page_data_options['contact_form_title'],
                            ];

                            if (!empty($site_data_options['lead_campaign_id'])) {
                                $lead_params['options[campaign_id]'] = $site_data_options['lead_campaign_id'];
                            }

                            if (!empty($site_data_options['lead_owner_email'])) {
                                $lead_params['options[owner]'] = \App\Connector\Users::findUserIdByEmail($site_data_options['lead_owner_email']);
                            }

                            $lead_params['options[next_follow_up_date]'] = (new \Datetime('tomorrow 09:00'))->format('Y-m-d H:i:s');
                            ?>
                            <?= \App\Utils\Leads::loadDefaultRequiredFields($lead_params); ?>
                            <?= \App\Utils\Leads::loadPropertyRequiredFields($property); ?>
                            <input type="hidden" name="options[extra][legacy_id]" id="legacy_id" value="<?= $property->get('legacy_id') ?>">
                        </div>
                        <div class="mb-4 form-group">
                            <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="mb-4 form-group">
                            <div class="phone-group bg-white border border-solid border-[#bbb] border-opacity-50 rounded-sm">
                                <?= \App\Utils\CustomFields::fieldSelectAjax(['name' => 'phone_prefix', 'id' => 'phone_prefix', 'label' => '', 'options' => []]); ?>
                                <input type="text" class="pl-0 pr-3 py-3.5 border-0 focus:outline-none required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                            </div>
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="mb-4 form-group">
                            <input type="email" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="agreement-group text-theme-tertiary-color text-xs"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'options[accept_privacy_policy]', 'label' => $page_data_options['contact_form_agreement'], 'default' => 'yes']); ?></div>
                        <button class="mt-5 btn btn-secondary w-full" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})" disabled>
                            <?= $page_data_options['contact_form_btn'] ?>
                        </button>
                    </form>
                    <div class="generic-helper"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Footer -->
<?php include __DIR__ . '/parts/footer.php'; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/Sothebys/js/property.js'); ?>
<?= $this->html->script('/Sothebys/js/lead.js'); ?>