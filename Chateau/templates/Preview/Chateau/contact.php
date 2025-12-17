<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-contact'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[130px] md:pt-[170px] lg:pt-[140px] 2xl:pt-[160px] pb-[40px] md:pb-[100px] lg:pb-[60px] 2xl:pb-[80px] bg-theme-tertiary-color border-0 border-b border-solid border-b-gray-300 relative z-0">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="z-10 text-theme-primary-color-darker font-extralight text-4xl lg:text-5xl text-center uppercase [text-shadow:_0.08em_0.08em_0.08em_rgba(0,0,0,.14)] font-JuliusSansOne">
        <?= $page_data['page_title'] ?>
    </div>
</div>

<div class="contact-us grid lg:grid-cols-2 xl:max-w-[1000px] xl:mx-auto gap-10 px-10 md:px-20 pt-10">
    <div>
        <div class="text-3xl font-extralight mb-2 font-JuliusSansOne"><?= $page_data_options['map_title'] ?></div>
        <div class="font-light leading-8 text-base"><?= $page_data_options['map_description'] ?></div>
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
    <div class="box-border mb-10">
        <div class="form">
            <div class="text-3xl font-extralight mb-10 font-JuliusSansOne"><?= $page_data_options['contact_form_title'] ?></div>
            <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                </div>
                <div class="mb-4 form-group">
                    <label for="full_name" class="text-lg pb-1 inline-block text-[#2d2d2d]"><?= $page_data_options['contact_form_name'] ?></label>
                    <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="full_name" id="full_name">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="email" class="text-lg pb-1 inline-block text-[#2d2d2d]"><?= $page_data_options['contact_form_email'] ?></label>
                    <input type="email" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="email" id="email">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="phone" class="text-lg pb-1 inline-block text-[#2d2d2d]"><?= $page_data_options['contact_form_phone'] ?></label>
                    <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" name="phone" id="phone">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <label for="message" class="text-lg pb-1 inline-block text-[#2d2d2d]"><?= $page_data_options['contact_form_message'] ?></label>
                    <textarea id="message" name="message" cols="30" rows="10" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field"></textarea>
                    <div class="form-group__helper"></div>
                </div>
                <button class="mt-5 btn btn-bg-black w-full min-[540px]:w-auto" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $page_data_options['contact_form_btn'] ?>
                </button>
            </form>
            <div class="generic-helper"></div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>