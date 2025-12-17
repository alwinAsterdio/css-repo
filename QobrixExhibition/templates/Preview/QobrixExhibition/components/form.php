<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/form');
$form_options = json_decode($component_data['options'], true);
?>
<div class="form">
    <form id="enquiry-form" action="" class="enquiry-form" integration-recaptcha=true data-action="lead_form">
        <div class='hidden'>
            <?php
                $lead_params = [
                    'form_name' => 'Exhibition Contact Form',
                ];

                if (!empty($form_options['campaign_id'])) {
                    $lead_params['options[campaign_id]'] = $form_options['campaign_id'];
                }
                ?>
            <?= \App\Utils\Leads::loadDefaultRequiredFields($lead_params); ?>
        </div>

        <h2><?= $form_options['personal_information_label'] ?></h2>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div class="form-group">
                <label for="first_name"><?= $form_options['contact_first_name'] ?></label>
                <input type="text" name="first_name" id="first_name">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="last_name"><?= $form_options['contact_last_name'] ?></label>
                <input type="text" name="last_name" id="last_name">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="email"><?= $form_options['contact_email'] ?></label>
                <input type="email" name="email" id="email">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="phone"><?= $form_options['contact_phone'] ?></label>
                <input type="text" name="phone" id="phone">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="city"><?= $form_options['contact_city'] ?></label>
                <input type="text" name="options[city]" id="city">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="country"><?= $form_options['contact_country'] ?></label>
                <?php
                $field_details = [
                    'id' => 'country',
                    'name' => 'options[country]',
                    'hide_label' => true,
                    'enable_search' => true,
                    'size' => 'small',
                    'label' => 'Country',
                    'default' => '',
                    'options' => \App\Utils\Config::getList('countries', null, []),
                    'class_input' => '',
                ];
                ?>
                <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="job_title"><?= $form_options['contact_job'] ?></label>
                <input type="text" name="options[extra][job_title]" id="job_title" class="">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="name"><?= $form_options['organisation_name'] ?></label>
                <input type="text" id="name" name="options[organisation][name]">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="website"><?= $form_options['organisation_website'] ?></label>
                <input type="text" id="website" name="options[organisation][website]">
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group">
                <label for="are_you_a"><?= $form_options['identity'] ?></label>
                <input type="text" id="are_you_a" name="options[extra][are_you_a]" >
                <div class="form-group__helper"></div>
            </div>

            <div class="form-group sm:col-span-2">
                <label for="what_are_you_interested_in"><?= $form_options['interest'] ?></label>
                <textarea rows="3" id="what_are_you_interested_in" name="options[extra][what_are_you_interested_in]" class="w-full"></textarea>
                <div class="form-group__helper"></div>
            </div>
        </div>

        <?php
        if (
                !empty($form_options['question_list']) &&
                !empty($form_options['question_list']['question_title'])
        ) :
            ?>
            <div class="w-full h-px bg-[#CBD5E1] my-10"></div>
            <h2><?= $form_options['custom_question_label'] ?></h2>
            <div class="grid grid-cols-1 gap-5">
                <?php foreach ($form_options['question_list']['question_title'] as $uid => $title) { ?>
                    <div class="form-group">
                        <input type="hidden" name="options[extra][Question_<?= substr($uid, 1) ?>]" id="Question_<?= substr($uid, 1) ?>" value="<?= $title ?>">
                        <label for="Answer_<?= substr($uid, 1) ?>"><?= htmlspecialchars($title) ?></label>
                        <input type="text" name="options[extra][Answer_<?= substr($uid, 1) ?>]" id="Answer_<?= substr($uid, 1) ?>">
                        <div class="form-group__helper"></div>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>

        <div class="mt-10 flex items-center justify-center">
            <button class="" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                <?= $form_options['contact_btn'] ?>
            </button>
        </div>
        <div class="col-span-2">
            <div class="generic-helper"></div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        QoetixCustomFields.eventActions();
    })
</script>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>