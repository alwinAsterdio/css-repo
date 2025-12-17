<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-contact'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="relative hero-section">
    <div class="box-border text-center h-[30vh] md:h-[35vh] lg:h-[45vh] xl:h-[50vh] 2xl:h-[60vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, .66) 0, rgba(0, 0, 0, 0) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: 50%; background-size: cover;">
        <span class="font-[Jaldi] text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
    </div>
</div>
<div class="contact-us bg-[#f0efef]">
    <div class="grid lg:grid-cols-2 xl:max-w-[1000px] xl:mx-auto  gap-10 px-10 md:px-20 pt-10 pb-10">
        <div>
            <div class="font-[Jaldi] text-3xl"><?= $page_data_options['address_title'] ?></div>
            <div class="font-[SourceSansPro]">
                <div class="flex gap-1 flex-col">
                    <div class="my-5 text-base">
                        <?= $site_data->get('address') ?>
                    </div>
                    <?php $phone = $site_data->get('phone'); ?>
                    <?php if (!empty($phone)) : ?>
                        <div class="text-base">
                            <span class="font-bold">Tel:</span>
                            <a href="tel:<?= $site_data->get('phone') ?>" class="text-theme-primary-color-darker no-underline hover:text-[#0d5bdd]">
                                <?= $site_data->get('phone') ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php $email = $site_data->get('email'); ?>
                    <?php if (!empty($email)) : ?>
                        <div class="text-base">
                            <span class="font-bold">Email:</span>
                            <a href="emailto:<?= $site_data->get('email') ?>" class="text-theme-primary-color-darker no-underline hover:text-[#0d5bdd]">
                                <?= $site_data->get('email') ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="box-border mb-10">
            <div class="form">
                <form id="enquiry-form" action="" class="enquiry-form grid grid-cols-2 gap-4" integration-recaptcha=true data-action="lead_form">
                    <div class='hidden'>
                        <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Contact us form']); ?>
                    </div>
                    <div class="form-group col-span-2">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-1">
                        <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group  col-span-1">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-2">
                        <textarea id="message" name="message" cols="30" rows="10" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="col-span-2">
                        <button class="mt-3 btn btn-primary w-full min-[540px]:w-auto" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                        <?= $page_data_options['contact_form_btn'] ?>
                    </button>
                    </div>
                    <div class="col-span-2">
                        <div class="generic-helper"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
