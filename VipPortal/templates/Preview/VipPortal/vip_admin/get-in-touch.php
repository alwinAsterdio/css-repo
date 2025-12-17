<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-get-in-touch'); ?>

<?= $this->element('top-menu'); ?>
<?= $this->element('sidenav') ?>

<?php
    $identity = $this->request->getAttribute('identity');
    $assigned_contact_id = $identity->get('custom_assigned_id');
    $assigned_contact_details = \App\Connector\Users::getUserByID($assigned_contact_id);

    $media_url = \App\Connector\Qobrix::getMediaUrl();
    $medium_profile_image_url = $assigned_contact_details['media'][0]['file']['thumbnails']['medium'] ?? null;
    $profile_image_url = $medium_profile_image_url ? $media_url . $medium_profile_image_url : null;

    $assigned_contact_name = $assigned_contact_details['contact']['name'] ?? '--';
    $assigned_contact_department = $assigned_contact_details['contact']['department'] ?? '--';
    $assigned_contact_phone = $assigned_contact_details['contact']['phone'] ?? '--';
    $assigned_contact_mobile = $assigned_contact_details['contact']['phone_2'] ?? '--';
    $assigned_contact_email = $assigned_contact_details['contact']['email'] ?? '--';

    $street = $assigned_contact_details['contact']['street'] ?? '';
    $city = $assigned_contact_details['contact']['city'] ?? '';
    $state = $assigned_contact_details['contact']['state'] ?? '';
    $postcode = $assigned_contact_details['contact']['post_code'] ?? '';
    $assigned_contact_address = trim(implode(', ', array_filter([$street, $city, $state, $postcode])));
    $assigned_contact_address = $assigned_contact_address !== '' ? $assigned_contact_address : '--';
?>

<div class="va_content_wrapper py-5 px-6 md:px-10">
    <div class="mb-5">
        <div class="text-2xl leading-none font-bold"><?= $page_data_options['primary_title'] ?></div>
        <div class="text-theme-primary-color text-lg leading-none font-bold">
            <?= $page_data_options['primary_details'] ?>
        </div>
    </div>

    <div class="mb-10">
        <div class="grid w-full grid-cols-1 gap-2.5 md:gap-10 sm:grid-cols-2">
            <div class="flex flex-col">
                <div class="relative aspect-video rounded-[30px] overflow-hidden">
                    <img src="<?= htmlspecialchars($profile_image_url ?: \App\Utils\Media::getDefaultPhotoUrl()) ?>" alt="<?= $assigned_contact_name ?>" class="block w-full h-full absolute object-cover object-center" />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-2xl font-bold"><?= $assigned_contact_name ?></div>
                <div class="mt-2">
                    <a href="mailto:<?= $assigned_contact_email ?>" class="btn-glow btn-glow--type_small" target="_blank">Send an email</a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="text-lg font-bold"><?= $page_data_options['contact_details_title'] ?></div>
        <div class="text-theme-primary-color font-bold">
            <?= $page_data_options['contact_details_description'] ?>
        </div>
    </div>
    
    <div>
        <div class="grid w-full grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-0">
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Department
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $assigned_contact_department ?>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Phone
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $assigned_contact_phone ?>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Mobile Phone
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $assigned_contact_mobile ?>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Email
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $assigned_contact_email ?>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Address
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $assigned_contact_address ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('footer') ?>
<?= $this->render('/Preview/general/footer'); ?>

<?= $this->html->script('/VipPortal/js/general.js'); ?>