<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-contact'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<script>
    const form_options = {
        success: {
            icon: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="12" fill="#D7DBFF"/><path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/></svg>`,
            message: '<?= __('Your message has been sent successfully. We will respond to your inquiry shortly.') ?>',
            hide_form: true,
        },
        failed: {
            icon: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="12" fill="#EEADBE"/><path d="M8 8.26667L15.7333 15.7333" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 15.7333L15.7333 8.26667" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
            message: '<?= __('Your message could not be sent, please try again.') ?>',
        },
    };
</script>
<div class="bg-[#FAFAF9] py-10 lg:py-10 box-border">
    <div class="container-section">
        <div class="flex flex-col lg:flex-row gap-4 box-border">
            <div>
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'primary_section_icon'); ?>" class="object-cover object-center aspect-square w-[40px] lg:w-[80px]" alt="Contact us Icon" loading="lazy"/>
            </div>
            <div>
                <h1 class="text-[32px] lg:text-[38px] font-medium text-theme-primary-color p-0 m-0 pb-2 lg:pb-0"><?= $page_data_options['primary_section_title'] ?></h1>
                <h5 class="text-lg leading-none text-[#333] font-normal p-0 m-0"><?= $page_data_options['primary_section_sub_title'] ?></h5>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row">
            <div class="flex-1">
                <div class="enquiry-form-section">
                    <form id="enquiry-form" action="" class="flex flex-col w-full enquiry-form rounded-3xl overflow-hidden" integration-recaptcha=true data-action="lead_form" data-title="<?= $page_data_options['contact_us_title'] ?>" data-error-helper="Tu mensaje no se ha podido enviar, por favor inténtalo de nuevo.">
                        <div class='hidden'>
                            <?php
                            $default_fields = [
                                'form_name' => 'Contact Us',
                            ];
                            ?>
                            <?= \App\Utils\Leads::loadDefaultRequiredFields($default_fields); ?>
                            <?php if (!empty($page_data_options['owner_id'])) { ?>
                                <input type="hidden" name="options[owner]" value="<?= $page_data_options['owner_id'] ?>">
                            <?php } ?>
                        </div>
                        <div class="flex items-center p-5">
                            <h4 class="text-theme-primary-color text-2xl font-semibold flex-1 form-title p-0 m-0"><?= $page_data_options['contact_us_title'] ?></h4>
                            <span class="close-form">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 6.9L17.6 18.1" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 18.1L17.6 6.9" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                        <div class="form-group px-5 pb-5 form-fields">
                            <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md font-[Roboto] placeholder:text-[#999]" type="text" id="first_name" name="first_name" placeholder="<?= $page_data_options['contact_us_name_label'] ?>" />
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="form-group px-5 pb-5 form-fields">
                            <input class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md font-[Roboto] placeholder:text-[#999]" type="text" id="email" name="email" placeholder="<?= $page_data_options['contact_us_email_label'] ?>" />
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="form-group px-5 mb-5 form-fields">
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
                                <input type="text" class="pl-0 pr-3 py-3.5 border-0 focus:outline-none phone-input rounded-[8px] font-[Roboto] required-field" name="options[phone_2]" id="phone_2" placeholder="<?= $page_data_options['contact_us_phone_label'] ?>">
                            </div>
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="px-5 mb-5 form-fields">
                            <div class="form-group pt-3 form-message">
                                <textarea type="text" placeholder="<?= $page_data_options['contact_us_message_label'] ?>" id="message" name="message" rows="3" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md font-[Roboto] placeholder:text-[#999]"></textarea>
                                <div class="form-group__helper"></div>
                            </div>
                        </div>
                        <div class="px-5 text-xs font-[Roboto] pb-5 form-fields">
                            <?= $page_data_options['contact_us_description'] ?>
                        </div>
                        <div class="px-5 pb-5 flex flex-col gap-6">
                            <button id="submit-btn" class="min-w-[150px] btn btn-primary g-recaptcha w-full btn-pill font-semibold form-fields" type="submit" onClick="javascript:submit_lead_form({ obj: this, form_id: 'enquiry-form', form_options: form_options})">
                                <?= $page_data_options['contact_us_btn_label'] ?>
                            </button>
                            <div class="generic-helper"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex-1 p-5">
                <h4 class="text-theme-primary-color text-2xl font-semibold p-0 mb-6 m-0"><?= $page_data_options['contact_us_second_column_title'] ?></h4>
                <div class="flex flex-col gap-8">
                    <?php if (!empty($site_data->get('email'))) : ?>
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="#003C46">
                                <path d="M17.7365 2.82007L18.0963 2.5501H17.6465H4.3535H3.90369L4.26347 2.82007L10.91 7.80757L11 7.87513L11.09 7.80757L17.7365 2.82007ZM2.69 3.8926L2.45 3.7126V4.0126V14.2501C2.45 14.5684 2.57643 14.8736 2.80147 15.0986C3.02652 15.3237 3.33174 15.4501 3.65 15.4501H18.35C18.6683 15.4501 18.9735 15.3237 19.1985 15.0986C19.4236 14.8736 19.55 14.5684 19.55 14.2501V4.0126V3.7126L19.31 3.8926L11.54 9.7201C11.3842 9.83694 11.1947 9.9001 11 9.9001C10.8053 9.9001 10.6158 9.83694 10.46 9.7201L2.69 3.8926ZM3.65 0.750098H18.35C19.1456 0.750098 19.9087 1.06617 20.4713 1.62878C21.0339 2.19139 21.35 2.95445 21.35 3.7501V14.2501C21.35 15.0457 21.0339 15.8088 20.4713 16.3714C19.9087 16.934 19.1456 17.2501 18.35 17.2501H3.65C2.85435 17.2501 2.09129 16.934 1.52868 16.3714C0.966071 15.8088 0.65 15.0457 0.65 14.2501V3.7501C0.65 2.95445 0.966071 2.19139 1.52868 1.62878C2.09129 1.06617 2.85435 0.750098 3.65 0.750098Z" fill="#003C46" stroke="#F1F1ED" stroke-width="0.3"/>
                            </svg>
                            <a href="emailto:<?= $site_data->get('email') ?>" class="text-[#003C46] text-base font-medium leading-[18px] m-0 p-0 no-underline">
                                <?= $site_data->get('email') ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M12.5396 4.16671C13.3535 4.32551 14.1016 4.72359 14.688 5.30999C15.2744 5.89639 15.6724 6.64443 15.8312 7.45837M12.5396 0.833374C14.2306 1.02124 15.8076 1.77852 17.0114 2.98088C18.2153 4.18324 18.9746 5.75922 19.1646 7.45004M18.3312 14.1V16.6C18.3322 16.8321 18.2846 17.0618 18.1917 17.2745C18.0987 17.4871 17.9623 17.678 17.7913 17.8349C17.6203 17.9918 17.4184 18.1113 17.1985 18.1856C16.9787 18.26 16.7457 18.2876 16.5146 18.2667C13.9503 17.9881 11.4871 17.1118 9.32291 15.7084C7.30943 14.4289 5.60236 12.7219 4.32291 10.7084C2.91456 8.53438 2.03811 6.0592 1.76458 3.48337C1.74375 3.25293 1.77114 3.02067 1.84499 2.80139C1.91885 2.58211 2.03755 2.38061 2.19355 2.20972C2.34954 2.03883 2.53941 1.9023 2.75107 1.80881C2.96272 1.71532 3.19153 1.66693 3.42291 1.66671H5.92291C6.32733 1.66273 6.7194 1.80594 7.02604 2.06965C7.33269 2.33336 7.53297 2.69958 7.58958 3.10004C7.6951 3.9001 7.89079 4.68565 8.17291 5.44171C8.28503 5.73998 8.3093 6.06414 8.24283 6.37577C8.17637 6.68741 8.02196 6.97347 7.79791 7.20004L6.73958 8.25837C7.92587 10.3447 9.65329 12.0721 11.7396 13.2584L12.7979 12.2C13.0245 11.976 13.3105 11.8216 13.6222 11.7551C13.9338 11.6887 14.258 11.7129 14.5562 11.825C15.3123 12.1072 16.0979 12.3029 16.8979 12.4084C17.3027 12.4655 17.6724 12.6694 17.9367 12.9813C18.201 13.2932 18.3414 13.6914 18.3312 14.1Z" stroke="#003C46" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="flex items-center gap-2">
                            <a href="tel:<?= $site_data->get('phone') ?>" class="text-[#003C46] text-base font-medium leading-[18px] m-0 p-0 no-underline">
                                <?= $site_data->get('phone') ?>
                            </a>
                            <?php if (!empty($site_data_options['phone_2'])) : ?>
                                <span>|</span>
                                <a href="tel:<?= $site_data_options['phone_2'] ?>" class="text-[#003C46] text-base font-medium leading-[18px] m-0 p-0 no-underline">
                                    <?= $site_data_options['phone_2'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<script>
    const form_sucess_tealium_subcategory = 'contactar enviado';
    const form_error_tealium_subcategory = 'contactar no enviado';
</script>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
<?php endif; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/caixa/js/contact.js'); ?>
