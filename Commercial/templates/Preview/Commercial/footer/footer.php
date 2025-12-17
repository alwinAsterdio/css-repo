<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/footer');
$footer_options = json_decode($component_data['options'], true);
?>
<div class="box-border grid grid-cols-1 xl:grid-cols-2 contact-us-section" id="contact-us">
    <div class="box-border pt-32 pb-10 text-white left-section" style="background:radial-gradient(78.88% 61.21% at 77.45% 52.04%, #301644 0%, #21112E 100%);">
        <div class="px-10 lg:px-16 2xl:px-32">
            <div class="text-base font-bold xl:text-lg 2xl:text-xl subtitle">
                <?= $footer_options['contact_us_subtitle'] ?>
            </div>
            <div class="mt-3 font-bold text-xl xl:text-3xl 2xl:text-5xl title">
                <?= $footer_options['contact_us_title'] ?>
            </div>
            <form id="enquiry-form" action="" class="grid w-full gap-7 mt-4 xl:mt-8" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(); ?>
                </div>
                <div class="grid grid-cols-2 gap-7">
                    <div class="form-group">
                        <input class="input-field" type="text" id="first_name" name="first_name" placeholder="Ονομα*" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="input-field" type="text" id="last_name" name="last_name" placeholder="Επώνυμο" />
                        <div class="form-group__helper"></div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-7">
                    <div class="form-group">
                        <input class="input-field" type="text" id="email" name="email" placeholder="Email*" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group">
                        <input class="input-field required-field" type="text" id="phone" name="phone" placeholder="Τηλέφωνο*" />
                        <div class="form-group__helper"></div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="textarea-field" placeholder="Το μήνυμά σας…" id="message" name="message"></textarea>
                    <div class="form-group__helper"></div>
                </div>
            </form>
            <div class="mt-4 flex flex-col md:flex-row items-end">
                <button class="mr-4 xl:mt-5 btn btn-lg btn-bg-theme" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $footer_options['contact_us_btn_text'] ?>
                </button>
                <div class="mt-8 flex flex-col md:flex-row items-center xl:mt-0">
                    <?php if ($site_data->get('address')) : ?>
                        <div class="text-sm md:mr-4 w-full address">
                            <?= $site_data->get('address'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-sm w-full contact-details">
                        T: <?= $site_data->get('phone'); ?><br />
                        E: <?= $site_data->get('email'); ?>
                    </div>
                </div>
            </div>
            <div class="generic-helper"></div>
            <?php $has_partner_logo_details = $footer_options['partner_1_img'] || $footer_options['partner_2_img'] || $footer_options['partner_3_img']; ?>
            <?php if ($has_partner_logo_details) : ?>
                <div class="w-full mt-16 box-border md:max-xl:px-20 cooperation">
                    <div class="flex items-center justify-center">
                        <div class="separator w-[25rem] text-sm text-white"><?= $footer_options['partners_section_title'] ?></div>
                    </div>
                    <div class="mt-8 flex flex-col md:flex-row justify-between associations">
                        <?php if ($footer_options['partner_1_img']) : ?>
                            <div class="flex flex-col text-xs text-center association">
                                <div class="h-16">
                                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'partner_1_img'); ?>" alt="brand-logo" class="max-h-16 object-contain">
                                </div>
                                <span class="mt-2 phone">
                                    <?= $footer_options['partner_1_phone'] ?>
                                </span>
                                <span class="email">
                                    <?= $footer_options['partner_1_email'] ?>
                                </span>
                                <span class="website">
                                    <?= $footer_options['partner_1_website'] ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <?php if ($footer_options['partner_2_img']) : ?>
                            <div class="flex flex-col mt-5 xl:mt-0 text-xs text-center association">
                                <div class="h-16">
                                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'partner_2_img'); ?>" alt="brand-logo" class="max-h-16 object-contain">
                                </div>
                                <span class="mt-2 phone">
                                    <?= $footer_options['partner_2_phone'] ?>
                                </span>
                                <span class="email">
                                    <?= $footer_options['partner_2_email'] ?>
                                </span>
                                <span class="website">
                                    <?= $footer_options['partner_2_website'] ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <?php if ($footer_options['partner_3_img']) : ?>
                            <div class="flex flex-col mt-5 xl:mt-0 text-xs text-center association">
                                <div class="h-16">
                                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'partner_3_img'); ?>" alt="brand-logo" class="max-h-16 object-contain">
                                </div>
                                <span class="mt-2 phone">
                                    <?= $footer_options['partner_3_phone'] ?>
                                </span>
                                <span class="email">
                                    <?= $footer_options['partner_3_email'] ?>
                                </span>
                                <span class="website">
                                    <?= $footer_options['partner_3_website'] ?>
                                </span>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="mt-20 px-10 2xl:px-16 text-sm copyright">
            <span class="mr-4 pr-4 [&:not(:last-child)]:border-solid border-0 border-r border-white/40">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script>
                <?= $site_data->get('site_title') ?>
            </span>
            <?php $privacy_policy = \App\Utils\SitesPage::getFirstPageByTemplate('privacy_policy'); ?>
            <?php if (!empty($privacy_policy)) : ?>
                <span class="mr-4 pr-4 [&:not(:last-child)]:border-solid border-0 border-r border-white/40">
                    <a href="/<?= $privacy_policy->get('page_slug') ?>" class="text-white no-underline"><?= $privacy_policy->get('page_title'); ?></a>
                </span>
            <?php endif; ?>
            <?php $cookie_policy = \App\Utils\SitesPage::getFirstPageByTemplate('cookie_policy'); ?>
            <?php if (!empty($cookie_policy)) : ?>
                <span>
                    <a href="/<?= $cookie_policy->get('page_slug') ?>" class="text-white no-underline"><?= $cookie_policy->get('page_title'); ?></a>
                </span>
            <?php endif; ?>
        </div>

    </div>
    <div class="text-base xl:text-lg h-full 2xl:text-2xl map right-section">
        <div class="box-border w-full responsive-map h-[450px] xl:h-full">
            <?php
            $coordinates = $footer_options['coordinates'];
            $markers = [];
            if (!empty($coordinates)) {
                $markers = [
                    [
                        'coordinates' => $coordinates,
                        'popupDetails' => [
                            'description' => $footer_options['map_popup_desc'],
                            'image' => \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'map_popup_img'),
                        ],

                    ],
                ];
            }
            ?>
            <?= $this->element('maps/single', ['template' => 'qoetix-map-container--style-2', 'markers' => $markers]); ?>
        </div>
    </div>
</div>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>