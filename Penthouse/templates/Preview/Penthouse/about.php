<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-about'); ?>
<div class="about-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[55vh] xl:h-[50vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(34, 31, 32, 0.85) 0%, rgba(34, 31, 32, 0.24) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
            <span class="text-4xl md:text-5xl text-white pt-20 uppercase"><?= $page_data['page_title'] ?></span>
        </div>
    </div>
    <div class="box-border mx-[10%] 2xl:mx-[20%] my-10 lg:my-14 2xl:my-16 about">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center lg:gap-14 2xl:gap-16 box-border text-base leading-7 mb-12 content-1">
            <div class="text-[#2d2d2d]">
                <div class="text-4xl text-black mb-3 title">
                    <?= $page_data_options['about_team_title'] ?>
                </div>
                <div class="text-lg"><?= $page_data_options['about_content_1'] ?></div>
            </div>
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_1'); ?>" class="h-full min-h-[40vh] object-cover w-full" alt="team-img">
        </div>
        <div class="text-[#2d2d2d] grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 2xl:gap-16 items-center box-border text-base leading-7 content-2">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_2'); ?>" class="h-full min-h-[40vh] object-cover w-full order-last lg:order-first" alt="team-img">
            <div class="text-lg">
                <?= $page_data_options['about_content_2'] ?>
            </div>
        </div>
    </div>

    <div class="py-10 xl:py-12">
        <style>
            .enquiry-form input,
            .enquiry-form textarea {
                background-color: <?= $page_data_options['contact_form_bg_color']; ?>;
            }
        </style>
        <div class="mb-6 text-3xl px-[8%] text-center font-medium title">
            <?= $page_data_options['contact_form_title'] ?>
        </div>
        <div class="px-[12%] lg:px-[15%] xl:px-[22%] 2xl:px-[27%]">
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