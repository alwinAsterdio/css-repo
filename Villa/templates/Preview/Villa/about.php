<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-about'); ?>
<div class="about-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border pl-[10%] 2xl:pl-[20%] h-[40vh] lg:h-[55vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <?= $page_data['page_title'] ?>
        </div>
    </div>
    <div class="box-border mx-[10%] 2xl:mx-[20%] my-10 lg:my-14 2xl:my-16 about">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center lg:gap-14 2xl:gap-16 box-border text-base leading-7 mb-12 content-1">
            <div class="text-[#2d2d2d]">
                <div class="text-4xl text-black mb-3 title">
                    <?= $page_data_options['about_team_title'] ?>
                </div>
                <?= $page_data_options['about_content_1'] ?>
            </div>
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_1'); ?>" class="h-full min-h-[40vh] object-cover w-full" alt="team-img">
        </div>
        <div class="text-[#2d2d2d] grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 2xl:gap-16 items-center box-border text-base leading-7 content-2">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_2'); ?>" class="h-full min-h-[40vh] object-cover w-full order-last lg:order-first" alt="team-img">
            <div>
                <?= $page_data_options['about_content_2'] ?>
            </div>
        </div>
    </div>

    <div class="py-10 xl:py-12 bg-[#f4f5f9] form">
        <div class="mb-6 text-3xl px-[8%] text-center font-medium title">
            <?= $page_data_options['contact_form_title'] ?>
        </div>
        <div class="px-[12%] lg:px-[15%] xl:px-[22%] 2xl:px-[27%]">
            <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                </div>
                <div class="mb-4 form-group">
                    <label for="full_name" class="text-base text-[#2d2d2d]">Your Name</label>
                    <input type="text" class="field-text w-full bg-[#ecedef]" name="full_name" id="full_name">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="email" class="text-base text-[#2d2d2d]">Your Email</label>
                    <input type="email" class="field-text w-full bg-[#ecedef]" name="email" id="email">
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 form-group">
                    <label for="phone" class="text-base text-[#2d2d2d]">Your Phone</label>
                    <input type="text" class="field-text w-full bg-[#ecedef] required-field" name="phone" id="phone">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <label for="message" class="text-base text-[#2d2d2d]">Your Message(Optional)</label>
                    <textarea id="message" name="message" cols="30" rows="10" class="field-textarea w-full bg-[#ecedef] required-field"></textarea>
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