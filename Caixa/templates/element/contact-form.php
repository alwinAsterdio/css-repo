<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/contact-us-form');
$component_data_options = json_decode($component_data['options'], true);

$brand_logo = '';
$agent_name = '';
$agent_mobile = '';
$form_name = 'enquiry-form';
if (!empty($property)) {
    $form_name .= '-' . $property->get('ref');
    $agent_brand = \App\Connector\Brand::getAgentInfo($property->getField('agent'));
    if (!empty($agent_brand)) {
        $agent_mobile = $agent_brand->get('tel_office') ?: $agent_brand->get('tel_mobile');
        $brand_logo = $agent_brand->getPhotoUrl('logo');
        $agent_name = $agent_brand->get('name');
    }
}
?>
<script>
    const contact_form_options = {
        success: {
            icon: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="12" fill="#D7DBFF"/><path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/></svg>`,
            message: `<p><?= __('Your request has been successfully sent to the advertiser. They will contact you shortly.') ?></p>`,
            hide_form: true,
            showAgentNumber: true,
        },
        failed: {
            icon: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="12" fill="#EEADBE"/><path d="M8 8.26667L15.7333 15.7333" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 15.7333L15.7333 8.26667" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
            message: '<?= __('Your message could not be sent, please try again.') ?>',
        },
    };
</script>
<div class="enquiry-form-section">
    <form id="<?= $form_name ?>" action=""
        class="flex flex-col w-full enquiry-form property-enquiry-form bg-white rounded-t-3xl md:rounded-3xl overflow-hidden"
        integration-recaptcha=true data-action="lead_form"
        data-title="<?= $component_data_options['contact_us_title'] ?>"
        data-title-counter="<?= $component_data_options['contact_us_counteroffer_title'] ?>">
        <div class='hidden hidden-fields'>
            <?php if (!empty($property)) : ?>
                <?php
                $default_fields = [
                    'form_name' => 'Property - Book a viewing',
                    'options[custom_property_ref]' => $property->get('ref'),
                    'options[custom_property_original_ref]' => $property->get('original_ref'),
                    'options[source]' => 'agent',
                    'options[agent]' => $property->get('agent'),
                ];
                ?>
                <?= \App\Utils\Leads::loadDefaultRequiredFields($default_fields); ?>
                <?= \App\Utils\Leads::loadPropertyRequiredFields($property); ?>
            <?php endif; ?>
        </div>
        <div class="form-details flex flex-col gap-[16px] p-6">
            <div class="flex items-center">
                <div class="text-theme-primary-color text-2xl font-semibold flex-1 form-title">
                    <?= $component_data_options['contact_us_title'] ?>
                </div>
                <span class="close-form">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6.9L17.6 18.1" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M6 18.1L17.6 6.9" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
            <div class="form-group form-fields flex items-center contact-form-sub-title <?= (empty($agent_mobile) ? 'hidden' : '') ?>">
                <div class="text-theme-primary-color text-sm leading-tight font-normal font-[Roboto]">
                    <?= $component_data_options['contact_us_sub_title'] ?>
                </div>
            </div>
            <div class="form-group form-fields pt-2">
                <input
                    class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-[10px] h-[40px] box-border rounded-md font-[Roboto] placeholder:text-[#666666] text-[14px] leading-[14px]"
                    type="text" id="first_name" name="first_name"
                    placeholder="<?= $component_data_options['contact_us_name_label'] ?>" />
                <div class="form-group__helper"></div>
            </div>
            <div class="form-group form-fields">
                <input
                    class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-[10px] h-[40px] box-border rounded-md font-[Roboto] placeholder:text-[#666666] text-[14px] leading-[14px]"
                    type="text" id="email" name="email"
                    placeholder="<?= $component_data_options['contact_us_email_label'] ?>" />
                <div class="form-group__helper"></div>
            </div>
            <div class="form-group form-fields">
                <div class="phone-group font-[Roboto]">
                    <?php
                    $field_params = [
                        'name' => 'phone_prefix',
                        'id' => 'phone_prefix',
                        'label' => '',
                        'options' => [],
                        'class' => 'phone_prefix--number',
                        'default' => [
                            'value' => 'ES',
                            'data' => [
                                'prefix' => '+34',
                                'id' => 'ES',
                                'label' => 'Spain',
                                'mask' => '### ### ###',
                            ],
                        ],
                    ];
                    ?>
                    <?= \App\Utils\CustomFields::fieldSelectAjax($field_params); ?>
                    <input type="text"
                        class="pl-0 pr-3 h-[40px] box-border border-0 focus:outline-none phone-input rounded-[8px] font-[Roboto] required-field placeholder:text-[#666666] text-[14px] leading-[14px]"
                        name="options[phone_2]" id="phone_2"
                        placeholder="<?= $component_data_options['contact_us_phone_label'] ?>">
                </div>
                <div class="form-group__helper"></div>
            </div>
            <div class="form-group hidden form-fields">
                <input
                    class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md placeholder:text-[#999]"
                    type="text" id="counter_offer_price" name="options[extra][counter_offer_price]"
                    placeholder="<?= $component_data_options['contact_us_counteroffer_label'] ?>" />
                <div class="form-group__helper"></div>
            </div>
            <div class="contact-reason form-fields">
                <?php
                $radio_field_params = [
                    'name' => 'options[custom_contact_topic]',
                    'id' => 'custom_contact_topic',
                    'label' => 'Selecciona el motivo de contacto',
                    'size' => 'small',
                    'options' => [
                        'Solicitar información del inmueble y financiación' => 'Solicitar información del inmueble y financiación',
                        'Solicitar información del inmueble' => 'Solicitar información del inmueble',
                        'Otro motivo de contacto' => 'Otro motivo de contacto',
                    ],
                    'class_input' => 'required-field',
                    'data_attr' => [
                        'helper' => 'Se debe seleccionar un motivo de contacto.',
                    ],
                ];
                ?>
                <div class="form-group">
                    <div class="contact-topic-list">
                        <?= \App\Utils\CustomFields::fieldSelect($radio_field_params); ?>
                        <div class="form-group__helper"></div>
                    </div>
                </div>
            </div>
            <div class="custom_caixa_customer-group form-fields hidden">
                <div class="font-[Roboto] text-[12px] leading-[100%] pb-[16px]"><?= $component_data_options['contact_us_caixa_customer_description'] ?></div>
                <div class="text-xs text-[#2d2d2d]"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'options[custom_caixabank_customer]', 'label' => $component_data_options['contact_us_caixa_customer_label'], 'default' => '1', 'single_field' => true]); ?></div>
            </div>
            <div class="form-fields">
                <div class="flex items-center gap-2 form-add-comment hover:cursor-pointer select-none">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="7.54053" y="11.9326" width="8.78378" height="0.675676" rx="0.337838" fill="#003C46"
                            stroke="#003C46" stroke-width="0.540541" />
                        <rect x="12.27" y="7.87842" width="8.78378" height="0.675675" rx="0.337838"
                            transform="rotate(90 12.27 7.87842)" fill="#003C46" stroke="#003C46"
                            stroke-width="0.540541" />
                        <circle cx="12" cy="12" r="9.45946" stroke="#003C46" stroke-width="1.08108" />
                    </svg>
                    <?= $component_data_options['contact_us_message_title'] ?>
                </div>
                <div class="form-group pt-3 form-message hidden">
                    <textarea type="text" placeholder="<?= $component_data_options['contact_us_message_label'] ?>"
                        id="message" name="message" rows="5"
                        class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-[10px] py-3.5 box-border rounded-md placeholder:text-[#666666] text-[14px] leading-[14px]"></textarea>
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="px-5 text-xs font-[Roboto] contact_us_description form-fields">
                <?= $component_data_options['contact_us_description'] ?>
            </div>
            <div class="px-5 text-xs font-[Roboto] hidden contact_us_description_alt form-fields">
                <?= $component_data_options['contact_us_description_alt'] ?>
            </div>
        </div>
        <div class="px-6 pb-6 flex flex-col gap-6">
            <button id="submit-btn"
                class="min-w-[150px] btn btn-primary g-recaptcha w-full btn-pill font-semibold form-fields"
                type="submit"
                data-default-label="<?= $component_data_options['contact_us_btn_label'] ?>"
                data-default-label-mobile="<?= $component_data_options['contact_us_btn_label_mobile'] ?>">
                <?= $component_data_options['contact_us_btn_label'] ?>
            </button>
            <div class="generic-helper"></div>
        </div>
        <div class="show-agent-number-container <?= (empty($agent_mobile) ? 'hidden' : '') ?>">
            <div class="show-agent-number px-6 flex flex-col gap-[20px]">
            <div class="show-agent-wrapper">
                <div class="block w-full mb-4">
                    <?= __('If you prefer, you can also call them at the following number.') ?>
                    </div>
                    <span data-tel="<?= $agent_mobile ?>" class="agent-phone-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.5396 6.16634C15.3535 6.32515 16.1016 6.72322 16.688 7.30962C17.2744 7.89602 17.6724 8.64406 17.8312 9.45801M14.5396 2.83301C16.2306 3.02087 17.8076 3.77815 19.0114 4.98051C20.2153 6.18287 20.9746 7.75885 21.1646 9.44967M20.3312 16.0997V18.5997C20.3322 18.8318 20.2846 19.0615 20.1917 19.2741C20.0987 19.4868 19.9623 19.6777 19.7913 19.8346C19.6203 19.9915 19.4184 20.1109 19.1985 20.1853C18.9787 20.2596 18.7457 20.2872 18.5146 20.2663C15.9503 19.9877 13.4871 19.1115 11.3229 17.708C9.30943 16.4286 7.60236 14.7215 6.32291 12.708C4.91456 10.534 4.03811 8.05884 3.76458 5.48301C3.74375 5.25256 3.77114 5.02031 3.84499 4.80103C3.91885 4.58175 4.03755 4.38025 4.19355 4.20936C4.34954 4.03847 4.53941 3.90193 4.75107 3.80844C4.96272 3.71495 5.19153 3.66656 5.42291 3.66634H7.92291C8.32733 3.66236 8.7194 3.80557 9.02604 4.06929C9.33269 4.333 9.53297 4.69921 9.58958 5.09967C9.6951 5.89973 9.89079 6.68528 10.1729 7.44134C10.285 7.73961 10.3093 8.06377 10.2428 8.37541C10.1764 8.68705 10.022 8.9731 9.79791 9.19967L8.73958 10.258C9.92587 12.3443 11.6533 14.0717 13.7396 15.258L14.7979 14.1997C15.0245 13.9756 15.3105 13.8212 15.6222 13.7548C15.9338 13.6883 16.258 13.7126 16.5562 13.8247C17.3123 14.1068 18.0979 14.3025 18.8979 14.408C19.3027 14.4651 19.6724 14.669 19.9367 14.9809C20.201 15.2928 20.3414 15.691 20.3312 16.0997Z"
                                stroke="#003C46" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="agent-phone-btn__label"><?= $agent_mobile ?></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-agent-info <?= (empty($brand_logo) && empty($agent_name) ? 'hidden' : '') ?>">
            <div class="form-agent-info__inner text-theme-primary-color py-6 border-0 border-solid border-t border-[#bbb] <?= (empty($brand_logo) ? 'justify-center text-center' : '') ?>">
                <div class="text-lg leading-tight font-[FaktumNeue]">
                    <?= $component_data_options['contact_us_header_label'] ?>
                    <span class="font-semibold form-agent-info__inner__name"><?= $agent_name ?></span>
                </div>
                <div class="flex-1 pl-6 inline-flex items-center justify-end form-agent-info__inner__logo <?= (empty($brand_logo) ? 'hidden' : '') ?>">
                    <?php if (!empty($brand_logo)) : ?>
                        <img src="<?= $brand_logo ?>" class="object-contain h-[25px] max-w-[95px]" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>