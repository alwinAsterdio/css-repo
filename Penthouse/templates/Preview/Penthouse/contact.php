<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-contact'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border text-center h-[45vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(34, 31, 32, 0.85) 0%, rgba(34, 31, 32, 0.24) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <span class="text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<div class="contact-us grid lg:grid-cols-2 xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 pt-10 pb-10">
    <div>
        <div class="text-3xl mb-2"><?= $page_data_options['map_title'] ?></div>
        <div class="leading-8 text-base"><?= $page_data_options['map_description'] ?></div>
        <div class="mt-4">
            <div class="flex gap-1 flex-col">
            <?php $phone = $site_data->get('phone'); ?>
                <?php if (!empty($phone)) : ?>
                    <div class="text-base">
                        <span class="font-bold">T:</span>
                        <a href="tel:<?= $site_data->get('phone') ?>" class="text-theme-primary-color-darker no-underline hover:text-[#0d5bdd]">
                            <?= $site_data->get('phone') ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php $email = $site_data->get('email'); ?>
                <?php if (!empty($email)) : ?>
                    <div class="text-base">
                        <span class="font-bold">E:</span>
                        <a href="emailto:<?= $site_data->get('email') ?>" class="text-theme-primary-color-darker no-underline hover:text-[#0d5bdd]">
                            <?= $site_data->get('email') ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-4 mb-10 text-base">
                <?= $site_data->get('address') ?>
            </div>
        </div>
        <div class="box-border map">
            <div class="box-border w-full shadow-lg responsive-map">
                <?php
                $coordinates = $page_data_options['coordinates'];
                $markers = [];
                if (!empty($coordinates)) {
                    $markers = [
                        [
                            'coordinates' => $coordinates,
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
    <style>
        .enquiry-form input,
        .enquiry-form textarea {
            background-color: <?= $page_data_options['contact_form_bg_color']; ?>;
        }
    </style>
    <div class="box-border mb-10">
        <div class="form">
            <div class="text-3xl mb-10"><?= $page_data_options['contact_form_title'] ?></div>
            <form id="enquiry-form" action="" class="enquiry-form grid grid-cols-2 gap-4" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                </div>
                <div class="form-group col-span-2">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border " name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-1">
                    <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border " name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group  col-span-1">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-2">
                    <textarea id="message" name="message" cols="30" rows="10" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                    <div class="form-group__helper"></div>
                </div>
                <div class="col-span-2">
                    <button class="mt-3 btn btn-primary w-full min-[540px]:w-auto" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $page_data_options['contact_form_btn'] ?>
                </button>
                </div>
            </form>
            <div class="generic-helper"></div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>