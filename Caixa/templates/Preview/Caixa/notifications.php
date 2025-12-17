<?php
$token_id = \Caixa\Utils\CaixaToken::getId();

//If not logged in then redirect to homepage.
if (empty($token_id)) {
    header('Location: /');
    exit;
}

$total_saved_searches = \App\Connector\Opportunity::totalSavedSearches();
$lead = \App\Connector\Favorites::findExisting();
$notification_status = $lead['data'][0]['notify_properties_price_drop'] ?? false;
?>
<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-notifications'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<div class="bg-white pt-8 pb-6 lg:hidden">
    <h4 class="container-section m-0 p-0 text-[24px] leading-[24px] text-theme-primary-color font-normal h-[29px] inline-flex items-center box-border"><?= $page_data_options['primary_section_title']; ?></h4>
</div>
<div class="bg-[#FAFAF9] py-6 lg:pt-[40px] lg:pb-[80px]">
    <div class="container-section flex gap-6">
        <div class="min-w-[274px] hidden lg:block">
            <?= $this->element('login-user-menu'); ?>
        </div>
        <div class="flex flex-col gap-6">
            <h3 class="m-0 p-0 text-[28px] leading-[28px] text-theme-primary-color font-normal min-h-[34px] hidden lg:block"><?= $page_data_options['primary_section_title']; ?></h3>
            <h5 class="text-[#333333] m-0 p-0 text-[18px] leading-[18px] font-normal min-h-[22px] hidden lg:block"><?= $page_data_options['primary_section_desc']; ?></h5>
            <div class="flex flex-col gap-4">
                <div class="flex flex-wrap lg:flex-nowrap gap-[10px] bg-white rounded-2xl p-6 box-border">
                    <div class="order-1 flex-1 lg:flex-auto">
                        <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="18" r="16" fill="#E5E7FF"/>
                            <path d="M16.4521 24.424C16.2041 24.5115 15.7958 24.5115 15.5479 24.424C13.4333 23.7021 8.70831 20.6906 8.70831 15.5865C8.70831 13.3334 10.5239 11.5104 12.7625 11.5104C14.0896 11.5104 15.2635 12.1521 16 13.1438C16.7364 12.1521 17.9177 11.5104 19.2375 11.5104C21.476 11.5104 23.2916 13.3334 23.2916 15.5865C23.2916 20.6906 18.5666 23.7021 16.4521 24.424Z" stroke="#003C46" stroke-width="1.27059" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-2 order-3 lg:order-2">
                        <h5 class="m-0 p-0 text-theme-primary-color font-normal text-[18px] leading-[18px] min-h-[22px] flex items-end">
                            <?= $page_data_options['primary_section_fav_title']; ?>
                        </h5>
                        <div class="font-[Roboto] text-[16px] leading-[21px]"><?= $page_data_options['primary_section_fav_desc']; ?></div>
                    </div>
                    <div class="gdpr-container__settings-popup__inner__content__group__description__action order-2 lg:order-3">
                        <label class="relative inline-block w-[50px] [28px]">
                            <input type="checkbox" class="opacity-0 w-0 h-0 peer" name="favorites_notification" id="favorites_notification" <?= $notification_status ? 'checked' : ''?>>
                            <span class="gdpr-container__settings-popup__inner__content__group__description__action__btn"></span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap gap-[10px] bg-white rounded-2xl p-6">
                    <div>
                        <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="18" r="16" fill="#E5E7FF"/>
                            <path d="M15.2347 23.3594C18.6174 23.3594 21.3597 20.6171 21.3597 17.2344C21.3597 13.8516 18.6174 11.1094 15.2347 11.1094C11.8519 11.1094 9.10968 13.8516 9.10968 17.2344C9.10968 20.6171 11.8519 23.3594 15.2347 23.3594Z" stroke="#003C46" stroke-width="1.53126" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.8908 24.8906L19.5604 21.5602" stroke="#003C46" stroke-width="1.53126" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h5 class="m-0 p-0 min-h-[22px] flex items-end">
                            <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('saved_searches'); ?>" class="text-theme-primary-color font-normal text-[18px] leading-[18px] no-underline"><?= $page_data_options['primary_section_saved_search_title']; ?></a>
                        </h5>
                        <div class="font-[Roboto] text-[16px] leading-[130%] notification-desc-section"><?= sprintf($page_data_options['primary_section_saved_search_desc'], $total_saved_searches['total']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-[#E5EBEC] py-[40px] ">
    <div class="container-section">
        <div class="bg-white flex gap-[40px] p-[40px] rounded-3xl">
            <div class="min-w-[140px] min-h-[140px] justify-center items-center rounded-[9.89px] hidden lg:flex" style="background-color: <?= $page_data_options['contact_us_icon_bg_color']; ?>;">
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.93866" y="0.938477" width="32.9816" height="32.9816" rx="16.4908" fill="#BDC3FF"/>
                    <path d="M24.5755 13.3069C24.5755 12.551 23.9571 11.9326 23.2012 11.9326H12.2074C11.4515 11.9326 10.8331 12.551 10.8331 13.3069V21.5522C10.8331 22.3081 11.4515 22.9265 12.2074 22.9265H23.2012C23.9571 22.9265 24.5755 22.3081 24.5755 21.5522V13.3069ZM23.2012 13.3069L17.7043 16.7424L12.2074 13.3069H23.2012ZM23.2012 21.5522H12.2074V14.6811L17.7043 18.1167L23.2012 14.6811V21.5522Z" fill="#003C46"/>
                </svg>
            </div>
            <div>
                <h3 class="m-0 p-0 pb-4 text-[24px] leading-[24px] lg:text-[26px] lg:leading-[26px] font-semibold text-theme-primary-color"><?= $page_data_options['contact_us_title']; ?></h3>
                <h5 class="m-0 p-0 pb-6 text-[18px] leading-[18px] font-normal"><?= $page_data_options['contact_us_desc']; ?></h5>
                <div>
                    <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('contact'); ?>" class="inline-block btn btn-md-c btn-primary btn-pill contact_us_btn_tealium">
                        <?= $page_data_options['contact_us_btn_label']; ?>
                        <svg width="12" height="12" class="pl-[8px]" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.814551 5.99998H11.1854H0.814551Z" fill="white"/>
                            <path d="M0.814551 5.99998H11.1854" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 11.1854L11.1854 5.99998L6 0.814526" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
<?php endif; ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/caixa/js/notifications.js'); ?>