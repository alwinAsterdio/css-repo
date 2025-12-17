<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-contact'); ?>
<div class="contact-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <div class="box-border pl-[5%] mt-6 xl:pl-[12%] lg:pl-[12%] 2xl:pl-[23%]">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>

    <div class="box-border grid lg:grid-cols-2 gap-[5.5%] px-[5%] lg:px-[12%] 2xl:px-[23%] pt-12 pb-24 md:pt-16 md:pb-32 contact-form">
        <div class="form">
            <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                </div>
                <div class="mb-4 form-group">
                    <label for="full_name" class="text-base text-[#2d2d2d]"><?= $page_data_options['contact_form_full_name'] ?></label>
                    <input type="text" class=" field-text w-full bg-[#f6f6f4]" name="full_name" id="full_name">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="email" class="text-base text-[#2d2d2d]"><?= $page_data_options['contact_form_email'] ?></label>
                    <input type="email" class="field-text w-full bg-[#f6f6f4]" name="email" id="email">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="phone" class="text-base text-[#2d2d2d]"><?= $page_data_options['contact_form_phone'] ?></label>
                    <input type="text" class="field-text w-full bg-[#f6f6f4] required-field" name="phone" id="phone">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <label for="message" class="text-base text-[#2d2d2d]"><?= $page_data_options['contact_form_message'] ?></label>
                    <textarea id="message" name="message" cols="25" rows="10" class="field-textarea w-full bg-[#f6f6f4] required-field"></textarea>
                    <div class="form-group__helper"></div>
                </div>

                <button class="mt-5 btn btn-bg-black theme-btn w-full min-[540px]:w-auto" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $page_data_options['contact_form_btn'] ?>
                </button>
            </form>
            <div class="generic-helper"></div>
        </div>
        <div class="box-border pt-5 contact-info">
            <div class="text-4xl mb-4 font-medium title">
                <?= $page_data_options['contact_form_title'] ?>
            </div>
            <div class="mb-5 text-base">
                <?= $site_data->get('site_title') ?>,
                <br />
                <?= $site_data->get('address') ?>
            </div>
            <?php $phone = $site_data->get('phone'); ?>
            <?php if (!empty($phone)) : ?>
                <div class="mb-2 text-base">
                    <span class="font-bold">Tel:</span>
                    <a href="tel:<?= $site_data->get('phone') ?>" class="text-[#75716f] no-underline hover:text-[#0d5bdd]">
                        <?= $site_data->get('phone') ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php $email = $site_data->get('email'); ?>
            <?php if (!empty($email)) : ?>
                <div class="text-base">
                    <span class="font-bold">Email:</span>
                    <a href="emailto:<?= $site_data->get('email') ?>" class="text-[#75716f] no-underline hover:text-[#0d5bdd]">
                        <?= $site_data->get('email') ?>
                    </a>
                </div>
            <?php endif; ?>


        </div>
    </div>

    <div class="bg-[#f4f5f9] box-border px-[5%] py-12 xl:p-[5%] md:pt-16 md:pb-[10%] map">
        <div class="box-border w-full shadow-lg responsive-map">
            <?php
            $coordinates = $page_data_options['coordinates'];
            $markers = [];
            if (!empty($coordinates)) {
                $markers = [
                    [
                        'coordinates' => $coordinates,
                        'popupDetails' => [
                            'description' => $page_data_options['map_popup_desc'],
                            'image' => \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'map_popup_img'),
                        ],
                    ],

                ];
            }
            ?>
            <div class="contact-us-map">
                <?= $this->element('maps/single', ['template' => 'qoetix-map-container--style-2', 'markers' => $markers, 'options' => ['circle' => false, 'cluster' => false]]); ?>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>