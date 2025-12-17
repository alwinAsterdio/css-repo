<div class="bg-theme-primary-color py-10">
    <div class="grid grid-cols-1 md:grid-cols-5 section">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 px-5 md:col-span-3">
            <div class="text-center lg:text-left">
                <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'footer_logo'); ?>" class="object-contain object-left h-7 w-44 xl:w-52 xl:h-9"/>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 justify-center items-center text-center lg:text-left">
                <?php
                $privacy = \App\Utils\SitesPage::getFirstPageByTemplate('privacy_policy');
                $cookies = \App\Utils\SitesPage::getFirstPageByTemplate('cookie_policy');
                ?>
                <?php if (!empty($privacy)) { ?>
                    <a href="/<?= $privacy->get('page_slug') ?>" class="no-underline text-theme-tertiary-color text-sm">Terms and conditions</a>
                <?php } ?>
                <?php if (!empty($cookies) && \App\Utils\IntegrationsGdpr::isEnabled($site_data_options)) { ?>
                    <a href="/<?= $cookies->get('page_slug') ?>" class="no-underline text-theme-tertiary-color text-sm">Cookie policy</a>
                <?php } ?>
            </div>
            <div class="lg:col-span-2 text-center lg:text-left text-xs text-theme-tertiary-color">
                &copy; <?= date('Y'); ?> <?= $site_data->get('site_title') ?> <?= $site_data->get('address'); ?>
            </div>
        </div>
        <div class="justify-center items-center gap-5 inline-flex flex-wrap xl:ml-auto social-media-icons mt-5 md:mt-0 md:col-span-2">
            <?php if ($site_data_options['social_media_facebook']) : ?>
            <a href="<?= $site_data_options['social_media_facebook'] ?>" target="_blank">
                <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                    class="stroke-theme-secondary-color fill-theme-secondary-color"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="facebook-app-symbol">
                        <g id="Group">
                            <path id="f 1"
                                d="M15.1885 25.4545V13.8444H19.2138L19.8177 9.31833H15.1885V6.42913C15.1885 5.11915 15.5628 4.22642 17.5061 4.22642L19.9807 4.22543V0.177201C19.5527 0.123385 18.0838 0 16.3741 0C12.804 0 10.3598 2.10886 10.3598 5.98088V9.31833H6.32231V13.8444H10.3598V25.4545H15.1885Z" />
                        </g>
                    </g>
                </svg>
            </a>
            <?php endif; ?>

            <?php if ($site_data_options['social_media_twitter']) : ?>
            <a href="<?= $site_data_options['social_media_twitter'] ?>" target="_blank">
                <svg width="26" height="27" viewBox="0 0 26 27" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                    <g id="twitter">
                        <g id="Group">
                            <g id="Group_2">
                                <path id="Vector"
                                    d="M25.9695 5.6931C25.023 6.12217 24.0143 6.40657 22.9627 6.54466C24.0445 5.87722 24.8702 4.82839 25.2584 3.56421C24.2498 4.18561 23.1361 4.62454 21.9493 4.86949C20.9916 3.81573 19.6266 3.16309 18.1375 3.16309C15.2484 3.16309 12.9225 5.58625 12.9225 8.55684C12.9225 8.98426 12.9575 9.39525 13.0434 9.7865C8.70503 9.56786 4.86617 7.41924 2.28731 4.14616C1.83709 4.95333 1.573 5.87722 1.573 6.8718C1.573 8.73932 2.50368 10.3948 3.89095 11.3532C3.05254 11.3367 2.23004 11.0852 1.53323 10.689C1.53323 10.7055 1.53323 10.7268 1.53323 10.7482C1.53323 13.3686 3.34209 15.5452 5.71413 16.0466C5.28935 16.1666 4.8264 16.2242 4.34595 16.2242C4.01186 16.2242 3.67458 16.2044 3.35799 16.1321C4.03413 18.2676 5.95276 19.8375 8.23412 19.8885C6.45867 21.3236 4.20436 22.1884 1.76391 22.1884C1.33595 22.1884 0.925499 22.1686 0.515045 22.1144C2.82663 23.6547 5.56617 24.5343 8.52049 24.5343C18.1232 24.5343 23.3732 16.3146 23.3732 9.18975C23.3732 8.95138 23.3652 8.72123 23.3541 8.49273C24.3898 7.73323 25.26 6.78468 25.9695 5.6931Z" />
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
            <?php endif; ?>

            <?php if ($site_data_options['social_media_youtube']) : ?>
            <a href="<?= $site_data_options['social_media_youtube'] ?>" target="_blank">
                <svg width="27" height="28" viewBox="0 0 27 28" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                    <g id="youtube">
                        <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.0184 5.36798C25.145 5.6714 26.0334 6.55959 26.3366 7.68638C26.9001 9.7445 26.8784 14.0345 26.8784 14.0345C26.8784 14.0345 26.8784 18.3027 26.3368 20.361C26.0334 21.4876 25.1452 22.376 24.0184 22.6792C21.9601 23.221 13.727 23.221 13.727 23.221C13.727 23.221 5.51538 23.221 3.43558 22.6577C2.30879 22.3543 1.4206 21.4659 1.11718 20.3393C0.575562 18.3027 0.575562 14.0129 0.575562 14.0129C0.575562 14.0129 0.575562 9.7445 1.11718 7.68638C1.4204 6.55979 2.33046 5.64973 3.43538 5.34651C5.4937 4.80469 13.7268 4.80469 13.7268 4.80469C13.7268 4.80469 21.9601 4.80469 24.0184 5.36798ZM17.9518 14.0129L11.1053 17.9562V10.0696L17.9518 14.0129Z" />
                    </g>
                </svg>
            </a>
            <?php endif; ?>

            <?php if ($site_data_options['social_media_instagram']) : ?>
            <a href="<?= $site_data_options['social_media_instagram'] ?>"
                target="_blank">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                    class="stroke-theme-secondary-color fill-theme-secondary-color"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="instagram">
                        <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                            d="M23.1733 7.52714C23.1175 6.2627 22.9238 5.3992 22.6407 4.64373C22.3532 3.8511 21.9022 3.13314 21.3195 2.53971C20.7475 1.9354 20.055 1.46758 19.2906 1.16924C18.562 0.875784 17.7295 0.675134 16.5102 0.617676C15.2887 0.559674 14.8984 0.545898 11.7876 0.545898C8.67682 0.545898 8.28653 0.559674 7.06498 0.617313C5.8457 0.675134 5.01321 0.875965 4.28454 1.1696C3.52022 1.46776 2.82791 1.9354 2.25567 2.53971C1.67295 3.13296 1.22184 3.85091 0.934145 4.64355C0.651172 5.3992 0.457689 6.2627 0.402283 7.52696C0.346352 8.79394 0.333069 9.1985 0.333069 12.4245C0.333069 15.6507 0.346352 16.0554 0.402283 17.3222C0.457863 18.5865 0.651522 19.45 0.934669 20.2056C1.22219 20.9981 1.67312 21.7162 2.25585 22.3094C2.82791 22.9138 3.5204 23.3814 4.28472 23.6796C5.01321 23.9734 5.84587 24.174 7.06515 24.2318C8.28688 24.2897 8.677 24.3033 11.7878 24.3033C14.8985 24.3033 15.2888 24.2897 16.5104 24.2318C17.7297 24.174 18.5622 23.9734 19.2908 23.6796C20.8294 23.0626 22.0457 21.8012 22.6407 20.2056C22.924 19.45 23.1175 18.5865 23.1733 17.3222C23.2288 16.0552 23.2421 15.6507 23.2421 12.4247C23.2421 9.1985 23.2288 8.79394 23.1733 7.52714ZM11.7875 6.32468C8.53898 6.32468 5.90554 9.05584 5.90554 12.4247C5.90554 15.7935 8.53898 18.5245 11.7875 18.5245C15.0362 18.5245 17.6696 15.7935 17.6696 12.4247C17.6696 9.05584 15.0362 6.32468 11.7875 6.32468ZM11.7875 16.3842C9.67891 16.384 7.96937 14.6113 7.96954 12.4245C7.96954 10.2378 9.67891 8.46495 11.7877 8.46495C13.8964 8.46513 15.6058 10.2378 15.6058 12.4245C15.6058 14.6113 13.8962 16.3842 11.7875 16.3842ZM17.902 7.5092C18.6611 7.5092 19.2765 6.871 19.2765 6.08381C19.2765 5.29644 18.6611 4.65823 17.902 4.65823C17.1427 4.65823 16.5273 5.29644 16.5273 6.08381C16.5273 6.871 17.1427 7.5092 17.902 7.5092Z" />
                    </g>
                </svg>
            </a>
            <?php endif; ?>

            <?php if ($site_data_options['social_media_linkedin']) : ?>
            <a href="<?= $site_data_options['social_media_linkedin'] ?>" target="_blank">
                <svg  width="24" height="25" xmlns="http://www.w3.org/2000/svg" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                </svg>
            </a>
            <?php endif; ?>

            <?php if ($site_data_options['social_media_tiktok']) : ?>
            <a href="<?= $site_data_options['social_media_tiktok'] ?>" target="_blank">
                <svg width="24" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/request-call-back');
if (empty($component_data)) {
    return;
}
$component_options = json_decode($component_data['options'] ?: '{}', true);

$lead_params = [
    'form_name' => $component_options['request_callback_title'] ?? '',
];

if (!empty($site_data_options['lead_campaign_id'])) {
    $lead_params['options[campaign_id]'] = $site_data_options['lead_campaign_id'];
}

if (!empty($site_data_options['lead_owner_email'])) {
    $lead_params['options[owner]'] = \App\Connector\Users::findUserIdByEmail($site_data_options['lead_owner_email']);
}
?>
<div class="modal">
    <div class="form">
        <span class="close-modal-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
        </span>
        <div class="t3 text-theme-primary-color mb-2"><?= $component_options['request_callback_title'] ?? '' ?></div>
        <form id="request-callback-form" action="" integration-recaptcha=true data-action="lead_form" data-redirect="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('thank-you'); ?>">
            <div class='hidden'>
                <?= \App\Utils\Leads::loadDefaultRequiredFields($lead_params); ?>
            </div>
            <div class="max-h-[70vh] overflow-y-auto">
                <div class="mb-4 form-group">
                    <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm" name="full_name" id="full_name" placeholder="<?= $component_options['request_callback_name'] ?? '' ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <div class="phone-group bg-white border border-solid border-[#bbb] border-opacity-50 rounded-sm">
                        <?= \App\Utils\CustomFields::fieldSelectAjax(['name' => 'phone_prefix', 'id' => 'phone_prefix', 'label' => '', 'options' => []]); ?>
                        <input type="text" class="pl-0 pr-3 py-3.5 border-0 focus:outline-none" name="phone" id="phone" placeholder="<?= $component_options['request_callback_phone'] ?>">
                    </div>
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <input type="email" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm" name="email" id="email" placeholder="<?= $component_options['request_callback_email'] ?? '' ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm required-field" placeholder="<?= $component_options['request_callback_message'] ?? '' ?>" id="message" name="message"></textarea>
                    <div class="form-group__helper"></div>
                </div>
                <div class="agreement-group text-[#666] text-xs"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'options[accept_privacy_policy]', 'label' => $component_options['request_callback_agreement'] ?? '', 'default' => 'yes']); ?></div>
                <div class="newsletter-group text-[#666] text-xs"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'options[email_consent]', 'label' => $component_options['request_callback_newsletter'] ?? '', 'checked' => true, 'default' => 'yes']); ?></div>
            </div>
            <div>
                <button class="mt-5 btn btn-secondary w-full" disabled type="submit" id="request-callback-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'request-callback-form'})">
                <?= $component_options['request_callback_btn'] ?? '' ?>
                </button>
            </div>
            <div class="generic-helper"></div>
        </form>
    </div>
</div>