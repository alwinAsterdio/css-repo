<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-listing'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<div>
    <div class="bg-[var(--accent-color)]">
        <div class="px-6 pt-48 pb-20 lg:pb-24">
            <div class="container xl:max-w-[1140px] mx-auto text-white">
                <div class="max-w-2xl">
                    <h1 class="m-0 text-3xl md:text-4xl lg:text-5xl leading-tight font-bold">
                        <?= $page_data_options['hero_title'] ?>
                    </h1>
                    <div class="mt-5">
                        <?= $page_data_options['hero_description'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-20 lg:py-24">
        <div class="container xl:max-w-[1140px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 lg:gap-14">
                <!-- Account -->
                <div>
                    <h2 class="m-0 mb-2.5 text-2xl md:text-3xl leading-tight font-bold titleColor">
                        <?= $page_data_options['account_title'] ?>
                    </h2>
                    <p><?= $page_data_options['account_description'] ?></p>
                    <a
                        class="btn-pill mt-7"
                        href="<?= $page_data_options['account_button_link'] ?>"
                        target="_blank">
                        <?= $page_data_options['account_button_label'] ?>
                    </a>
                </div>

                <!-- Form -->
                <div class="p-6 md:p-10 lg:p-12 rounded-xl md:rounded-3xl border border-solid border-[var(--border-light)] bg-[#EFEFEF80]">
                    <h2 class="m-0 mb-2.5 text-2xl md:text-3xl leading-tight font-bold titleColor">
                        <?= $page_data_options['contact_form_title'] ?>
                    </h2>
                    <div class="mt-5">
                        <?= $page_data_options['contact_form_sub_title'] ?>
                    </div>
                    <div class="form mt-7">
                        <form id="enquiry-form" action="" class="enquiry-form grid grid-cols-1 md:grid-cols-2 gap-3 listing-form" integration-recaptcha=true data-action="lead_form">
                            <div class='hidden'>
                                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Add Listing form']); ?>
                            </div>
                            <div class="form-group col-span-2 md:col-span-1">
                                <input type="text" class="common-input-rounded required-field" name="first_name" id="first_name" placeholder="<?= $page_data_options['contact_form_first_name'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="form-group col-span-2 md:col-span-1">
                                <input type="text" class="common-input-rounded required-field" name="last_name" id="last_name" placeholder="<?= $page_data_options['contact_form_last_name'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="form-group col-span-2 md:col-span-1">
                                <input type="email" class="common-input-rounded required-field" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="form-group col-span-2 md:col-span-1">
                                <input type="text" class="common-input-rounded required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="form-group col-span-2">
                                <textarea id="message" name="message" cols="30" rows="10" class="common-textarea-rounded" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                                <div class="form-group__helper"></div>
                            </div>
                            <div class="form-group col-span-2 text-xs form__disclaimer">
                                <?= $page_data_options['contact_form_disclaimer'] ?>
                            </div>
                            <div class="col-span-2">
                                <button class="btn-pill border-none" type="submit" id="enquiry-btn" onClick="javascript:submit_agent_registration_form({obj: this, form_id: 'enquiry-form'})">
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
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->html->script('/js/agent.js'); ?>