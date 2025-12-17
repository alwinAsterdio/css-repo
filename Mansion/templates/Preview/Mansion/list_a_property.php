<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-list_a_property'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border h-[30vh] md:h-[35vh] lg:h-[45vh] xl:h-[50vh] 2xl:h-[60vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, .66) 0, rgba(0, 0, 0, 0) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: 50%; background-size: cover;">
        <span class="font-[Jaldi] text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<div class="bg-[#f0efef]">
    <div class="xl:max-w-[600px] xl:mx-auto gap-10 px-10 md:px-20 py-10 cookies-section">
        <div class="text-xl font-medium mb-5"><?= $page_data_options['contact_form_title'] ?></div>
        <div class="form">
            <form id="list-property-form" action="" class="enquiry-form grid grid-cols-6 gap-4" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'List a property form']); ?>
                </div>
                <div class="form-group col-span-6">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-3">
                    <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group  col-span-3">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-3">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][bedrooms]" id="bedrooms" placeholder="<?= $page_data_options['contact_form_beds'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group  col-span-3">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][bathrooms]" id="bathrooms" placeholder="<?= $page_data_options['contact_form_baths'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-3 custom-select">
                    <?php
                        $field_details = [
                            'id' => 'sale_rent',
                            'name' => 'options[extra][sale_rent]',
                            'size' => 'small',
                            'placeholder' => '',
                            'label' => $page_data_options['contact_form_property_sale_rent'],
                            'default' => '',
                            'options' => [
                                'FOR SALE' => 'FOR SALE',
                                'FOR RENT' => 'FOR RENT',
                                'FOR SALE OR RENT' => 'FOR SALE OR RENT',
                            ],
                        ];
                        ?>
                        <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>


                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-3">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][property_type]" id="property_type" placeholder="<?= $page_data_options['contact_form_property_type'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-2">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][location]" id="location" placeholder="<?= $page_data_options['contact_form_location'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-2">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][covered_area]" id="covered_area" placeholder="<?= $page_data_options['contact_form_covered_area'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-2">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="options[extra][plot_size]" id="plot_size" placeholder="<?= $page_data_options['contact_form_plot_size'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-6">
                    <textarea id="message" name="message" cols="30" rows="10" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                    <div class="form-group__helper"></div>
                </div>
                <div class="col-span-2">
                    <button class="mt-3 btn btn-primary w-full min-[540px]:w-auto" type="submit" id="list-property-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'list-property-form'})">
                    <?= $page_data_options['contact_form_btn'] ?>
                </button>
                </div>
                <div class="generic-helper col-span-6"></div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        QoetixCustomFields.eventActions();
    });
</script>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
