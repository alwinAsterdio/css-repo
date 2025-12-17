<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/chateau/css/tw-about'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="pt-[130px] md:pt-[170px] lg:pt-[140px] 2xl:pt-[160px] pb-[40px] md:pb-[100px] lg:pb-[60px] 2xl:pb-[80px] bg-theme-tertiary-color border-0 border-b border-solid border-b-gray-300 relative z-0">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" alt="Primary section image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"/>
    <div class="z-10 text-theme-primary-color-darker font-extralight text-4xl lg:text-5xl text-center uppercase [text-shadow:_0.08em_0.08em_0.08em_rgba(0,0,0,.14)] font-JuliusSansOne">
        <?= $page_data['page_title'] ?>
    </div>
</div>
<div class="about-page">
    <div class="text-[#2d2d2d] px-10 md:px-20 pt-5 md:pt-10 pb-16 max-w-[900px] mx-auto">
        <div class="text-4xl text-black mb-3 font-extralight font-JuliusSansOne">
            <?= $page_data_options['about_team_title'] ?>
        </div>
        <div class="font-light leading-8"><?= $page_data_options['about_team_description'] ?></div>
    </div>
    <div class="py-10 xl:py-12" style="background-color: <?= $page_data_options['contact_form_bg_color'] ?>">
        <div class="mb-6 text-3xl px-[8%] text-center title font-JuliusSansOne">
            <?= $page_data_options['contact_form_title'] ?>
        </div>
        <div class="px-5 max-w-[500px] mx-auto">
            <form id="enquiry-form" action="" class="enquiry-form" integration-recaptcha=true data-action="lead_form">
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