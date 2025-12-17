<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-cookie_policy'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<div class="container-section py-5 md:py-10 lg:py-10">
    <h4 class="text-2xl font-semibold text-theme-primary-color my-0"><?= $page_data['page_title'] ?></h4>
    <div class="border-0 border-b border-solid border-[#E8E7E1] mt-[40px]"></div>
    <div class="c-html-content-section">
        <?= $page_data_options['primary_section_content'] ?>
        <div>
            <div class="mt-[40px] mb-[64px]">
                <div class="font-[Roboto] font-semibold text-[14px] leading-[16.41px] text-[#00051A] mb-2"><?= $site_data_options['gdpr_3rd_party_cookies_title'] ?? '' ?></div>
                <div class="flex">
                    <div class="flex-1 font-[Roboto] font-normal text-[12px] leading-[14.06px] text-[#333333]"><?= $site_data_options['gdpr_3rd_party_cookies'] ?? '' ?></div>
                    <div class="gdpr-container__settings-popup__inner__content__group__description__action">
                        <label>
                            <input type="checkbox" class="opacity-0 w-0 h-0 peer" name="third-party-cookies" id="third-party-cookies">
                            <span class="gdpr-container__settings-popup__inner__content__group__description__action__btn"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class='text-center mb-[64px]'>
                <button class="save-cookies"><?= $page_data_options['cookies_saved_btn_label']?></button>
            </div>
        </div>
        <?= $page_data_options['primary_section_content_after'] ?>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/caixa/js/cookie_policy.js'); ?>