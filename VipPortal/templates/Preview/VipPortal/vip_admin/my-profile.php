<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-my-profile'); ?>

<?= $this->element('top-menu'); ?>
<?= $this->element('sidenav') ?>
<?php
$identity = $this->request->getAttribute('identity');
$contact_details = \App\Connector\Users::getUserByID($identity->get('user_id'));
if (empty($contact_details)) {
    throw new \Cake\Http\Exception\NotFoundException('Contact details not found.');
}

$media_url = \App\Connector\Qobrix::getMediaUrl();
$medium_profile_image_url = $contact_details['media'][0]['file']['thumbnails']['medium'] ?? null;
$profile_image_url = $medium_profile_image_url ? $media_url . $medium_profile_image_url : null;
$contact_name = $contact_details['contact']['name'] ?? '--';
$contact_email = $contact_details['contact']['email'] ?? '--';
$date_created = new DateTime($contact_details['created']);
?>
<div class="va_content_wrapper py-5 px-6 md:px-10">
    <div>
        <div class="text-2xl leading-none font-bold"><?= $page_data_options['primary_title'] ?></div>
        <div class="text-theme-primary-color text-lg leading-none font-bold">
            <?= $page_data_options['primary_details'] ?>
        </div>
    </div>

    <div class="relative w-full mt-10 mb-8">
        <div class="flex flex-wrap justify-center">
            <div class="flex justify-center w-full lg:w-3/12 lg:order-2">
                <div class="relative w-24 h-24">
                    <?php if (!empty($profile_image_url)) : ?>
                        <img src="<?= $profile_image_url ?>" alt="<?= $contact_name ?>" class="block w-full h-full object-cover object-center rounded-full" />
                    <?php else : ?>
                        <div class="flex items-center place-content-center" style="width: inherit; height: inherit;">
                            <div class="flex items-center font-normal leading-none text-center align-middle rounded-full justify-items-center place-items-center place-content-center bg-[var(--theme-primary-color)] text-white text-xs m-0" style="width: inherit; height: inherit;">
                                VL
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="mt-7 text-center">
            <h3 class="mb-1 text-xl font-semibold leading-normal"><?= $contact_name ?></h3>
            <div><?= $date_created->format('d M Y H:i') ?></div>
        </div>
    </div>

    <div>
        <div class="text-lg font-bold"><?= $page_data_options['personal_details_title'] ?></div>
        <div class="text-theme-primary-color font-bold">
            <?= $page_data_options['personal_details_description'] ?>
        </div>
    </div>

    <div>
        <div class="grid w-full grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-0">
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">
                    Name
                </div>
                <div class="text-base leading-5 font-normal">
                    <?= $contact_name ?>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">Email</div>
                <div class="text-base leading-5 font-normal"><?= $contact_email ?></div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="font-normal text-xs text-[#3f5877]">Username</div>
                <div class="text-base leading-5 font-normal"><?= $contact_details['username'] ?></div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('footer') ?>
<?= $this->render('/Preview/general/footer'); ?>

<?= $this->html->script('/VipPortal/js/general.js'); ?>