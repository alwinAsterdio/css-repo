<?php
$color_list = [];
if (!empty($page_data_options['properties_status_list'])) {
    foreach ($page_data_options['properties_status_list']['status'] as $k => $v) {
        $color_list[$v] = $page_data_options['properties_status_list']['color'][$k];
    }
}

?>
<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Sothebys/css/tw-project'); ?>

<!-- Header -->
<?php include __DIR__ . '/parts/top-menu.php'; ?>

<!-- Hero section -->
<div class="relative min-h-[calc(100vh-59px)] xl:min-h-[calc(100vh-90px)] w-full flex justify-center items-center p-5 lg:p-10 box-border">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'primary_section_image'); ?>" class="absolute w-full h-full object-cover z-[-1]" alt="featured-photo" />
    <div class="bg-white bg-opacity-80 w-full p-5 lg:p-20 flex flex-wrap section">
        <div class="lg:basis-2/3 inline-flex flex-col justify-center">
            <div class="font-PlayfairDisplay text-theme-primary-color t1 font-medium"><?= $page_data_options['primary_section_title']; ?></div>
            <div class="mt-2 mb-2 lg:mb-10 font-medium text-theme-secondary-color t3"><?= $page_data_options['primary_section_sub_title']; ?></div>
            <div class="marker:text-theme-secondary-color text-theme-primary-color home-primary-description"><?= $page_data_options['primary_section_description']; ?></div>
        </div>
        <?php if (!empty($page_data_options['contact_form_primary_enabled'])) { ?>
            <div class="lg:basis-1/3">
                <div class="form bg-theme-primary-color p-5 lg:p-10">
                    <div class="t3 text-theme-tertiary-color mb-2 lg:mb-6"><?= $page_data_options['contact_form_title'] ?></div>
                    <?php
                    $lead_params = [
                        'form_name' => $page_data_options['contact_form_title'],
                    ];

                    if (!empty($site_data_options['lead_campaign_id'])) {
                        $lead_params['options[campaign_id]'] = $site_data_options['lead_campaign_id'];
                    }

                    if (!empty($site_data_options['lead_owner_email'])) {
                        $lead_params['options[owner]'] = \App\Connector\Users::findUserIdByEmail($site_data_options['lead_owner_email']);
                    }

                    $lead_params['options[next_follow_up_date]'] = (new \Datetime('tomorrow 09:00'))->format('Y-m-d H:i:s');
                    ?>
                    <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form" data-redirect="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('thank-you'); ?>">
                        <div class='hidden'>
                            <?= \App\Utils\Leads::loadDefaultRequiredFields($lead_params); ?>
                        </div>
                        <div class="mb-4 form-group">
                            <input type="text" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm focus:outline-none" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="mb-4 form-group">
                            <div class="phone-group bg-white border border-solid border-[#bbb] border-opacity-50 rounded-sm">
                                <?= \App\Utils\CustomFields::fieldSelectAjax(['name' => 'phone_prefix', 'id' => 'phone_prefix', 'label' => '', 'options' => []]); ?>
                                <input type="text" class="pl-0 pr-3 py-3.5 border-0 focus:outline-none required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                            </div>
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="mb-4 form-group">
                            <input type="email" class="w-full bg-white border border-solid border-[#bbb] border-opacity-50 px-3 py-3.5 box-border rounded-sm focus:outline-none" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="agreement-group text-theme-tertiary-color text-xs"><?= \App\Utils\CustomFields::fieldCheckBox(['name' => 'agreement-box', 'label' => $page_data_options['contact_form_agreement']]); ?></div>
                        <button class="mt-5 btn btn-secondary w-full" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})" disabled>
                            <?= $page_data_options['contact_form_btn'] ?>
                        </button>
                    </form>
                    <div class="generic-helper"></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Info Section -->
<?php if (!empty($page_data_options['info_section_enabled']) && !empty($page_data_options['info_array'])) : ?>
    <?php ksort($page_data_options['info_array']['info_title']); ?>
<div class="info-section flex flex-col gap-5 lg:flex-row lg:gap-0 mx-auto max-w-[1200px] justify-between py-10">
    <?php foreach ($page_data_options['info_array']['info_title'] as $uid => $title) : ?>
        <div class="flex flex-col text-center flex-1 lg:[&:not(:last-child)]:border-0 lg:[&:not(:last-child)]:border-r lg:[&:not(:last-child)]:border-solid lg:[&:not(:last-child)]:border-theme-secondary-color">
            <div class="font-PlayfairDisplay font-medium t3 text-theme-secondary-color"><?= $title ?></div>
            <div class="text-theme-primary-color text-base lg:text-xl"><?= $page_data_options['info_array']['info_description'][$uid]; ?></div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php if (!empty($page_data_options['gallery_section_enabled'])) { ?>
    <!-- Project gallery -->
    <div class="w-full h-screen" id="gallery">
        <?= $this->element('gallery/template-2', ['obj' => $project, 'media_names' => ['featured_photo', 'photos',],'show_circle' => false]); ?>
    </div>
<?php } ?>
<!-- Features section -->
<?php if (!empty($page_data_options['features_section_enabled']) && !empty($page_data_options['features_array'])) : ?>
    <?php ksort($page_data_options['features_array']['feature_title']); ?>
<div class="px-5 lg:px-10 section" id="features">
    <div class="font-PlayfairDisplay t2 text-theme-primary-color text-center py-5 lg:py-16"><?= $page_data_options['features_section_title'] ?></div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-14">
        <?php foreach ($page_data_options['features_array']['feature_title'] as $uid => $title) : ?>
            <div class="inline-flex gap-5">
                <div>
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['features_array']['feature_img'], $uid); ?>" class="object-cover w-[56px] h-[56px]" alt="featured-photo" />
                </div>
                <div>
                    <div class="font-PlayfairDisplay t3 text-theme-primary-color font-medium pb-3"><?= $title ?></div>
                    <div class="text-[#666] text-base"><?= $page_data_options['features_array']['feature_description'][$uid]; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php if (!empty($page_data_options['properties_section_enabled'])) { ?>
    <!-- Properties section -->
    <div class="px-5 lg:px-10 section pt-10 lg:pt-20" id="options">
        <div class="font-PlayfairDisplay t2 text-theme-primary-color text-center pb-5 lg:pb-16 font-medium"><?= $page_data_options['properties_section_title'] ?></div>
        <div class="overflow-x-auto overflow-y-hidden">
            <table class="box-border w-full p-2 text-black border-collapse property-listing-table">
                <thead class="h-14">
                    <tr class="bg-[#D1D5DB] text-base lg:text-lg text-theme-primary-color">
                        <th class="pl-4 align-middle xl:px-5 font-medium">Unit</th>
                        <th class="font-medium"><span class="hidden md:inline-block">Property&nbsp;</span>Name</th>
                        <th class="font-medium"><span class="hidden md:inline-block">Property&nbsp;</span>Type</th>
                        <th class="font-medium hidden md:table-cell">Status</th>
                        <th class="hidden font-medium md:table-cell">Build Stage</th>
                        <th class="px-2 font-medium">Beds</th>
                        <th class="pr-4 xl:px-5 font-medium">Baths</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php foreach ($project_properties['data'] as $property) : ?>
                    <tr class="text-center text-xs md:text-sm 2xl:text-lg h-14 capitalize font-normal">
                        <td class="pl-4 xl:px-5 relative">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?= $property->getField('unit_number', ['default_value' => '-']) ?>
                        </td>
                        <td class="relative box-border whitespace-nowrap">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <a href='<?= $property->getUrl() ?>' class="inline-block align-middle text-ellipsis overflow-hidden max-w-[120px] md:max-w-[200px] lg:max-w-none bg-theme-primary-color text-theme-tertiary-color rounded-md px-1 pt-1.5 pb-1 lg:px-3 lg:pt-2 lg:pb-1 no-underline">
                                <?= $property->getField('name') ?>
                            </a>
                        </td>
                        <td class="relative">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?= $property->getField('property_type') ?>
                        </td>
                        <td class="relative hidden md:table-cell">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?php $property_status_raw = $property->get('status'); ?>
                            <?php $property_status = $property->getField('status'); ?>
                            <span class="w-[12px] h-[12px] inline-block rounded-full mr-1 <?= (empty($color_list[$property_status_raw]) ? 'bg-theme-primary-color' : ''); ?>" style="<?= (!empty($color_list[$property_status_raw]) ? ('background-color:' . $color_list[$property_status_raw] . ';') : ''); ?>"></span><?= $property_status ?>
                        </td>
                        <td class="hidden md:table-cell relative">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?= $property->getField('construction_stage') ?>
                        </td>
                        <td class="relative">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?= $property->getField('bedrooms', ['default_value' => '-']) ?>
                        </td>
                        <td class="pr-4 xl:px-5 relative">
                            <div class="absolute bottom-0 left-0 border-0 h-[1px] w-[calc(100%_-_20px)] mx-[10px] bg-[#dddddd]"></div>
                            <?= $property->getField('bathrooms', ['default_value' => '-']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<?php if (!empty($page_data_options['location_section_enabled'])) { ?>
<!-- Location section -->
<div class="s-location mt-10 lg:mt-20 scroll-mt-[90px]" id="location">
    <div class="grid grid-cols-1 lg:grid-cols-2 bg-theme-primary-color">
        <div class="px-5 md:px-10 lg:px-20 flex flex-col justify-center">
            <div class="font-PlayfairDisplay t2 text-theme-tertiary-color py-8 font-medium"><?= $page_data_options['location_section_title'] ?></div>
            <div class="flex items-center gap-2 pb-8">
                <div>
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'location_city_icon'); ?>" class="h-[30px] cover" alt="Location icon" />
                </div>
                <div class="text-lg text-theme-secondary-color"><?= $project->getLocation()->get('district') ?></div>
            </div>
            <div class="text-lg text-theme-tertiary-color pb-8"><?= $project->getField('location_description') ?></div>
        </div>
        <div>
            <div class="box-border w-full responsive-map">
                <?php
                $coordinates = $project->get('coordinates');
                $markers = [];
                if (!empty($coordinates)) {
                    $markers = [
                        [
                            'coordinates' => $project->get('coordinates'),
                            'popupDetails' => [
                                'title' => $project->get('name'),
                                'description' => $project->get('description'),
                                'price' => [
                                    'label' => 'Starting From:',
                                    'value' => $project->getField('starting_price_from', ['default_value' => '--']),
                                ],
                                'image' => $project->getField('featured_photo'),
                            ],
                        ],
                    ];
                }
                ?>
                <?= $this->element('maps/single', ['markers' => $markers]); ?>
            </div>
        </div>
    </div>
    <div>
        <div class="box-border grid w-full grid-cols-2 md:grid-cols-3 gap-5 lg:gap-32 px-10 my-16 text-sm 2xl:text-base xl:flex xl:justify-center nearby">
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M59.8459 23.0363C59.68 22.7831 59.4015 22.6324 59.1053 22.6324H55.6805C55.4375 22.6324 55.2064 22.7288 55.0405 22.9037L48.9612 29.2647H35.333L42.5144 17.3807C42.7752 16.9587 42.6448 16.3979 42.2241 16.1326C42.0878 16.0482 41.9219 16 41.756 16H34.0531C33.8161 16 33.5909 16.0965 33.425 16.2653L20.6501 29.2647H16.2654C9.04243 29.2647 4 33.3647 4 39.2554C4 40.395 4.9125 41.3235 6.03238 41.3235H19.1688L34.3138 56.7347C34.4797 56.9035 34.7049 57 34.9419 57H42.6448C43.1366 57 43.5336 56.596 43.5336 56.0956C43.5336 55.9268 43.4862 55.7579 43.4032 55.6193L34.7523 41.3235H47.4443C50.5669 41.3235 53.3814 39.4243 54.602 36.5L59.9348 23.8744C60.0415 23.5971 60.0118 23.2835 59.8459 23.0363ZM34.4205 17.8088H40.1443L33.2354 29.2647H23.1624L34.4205 17.8088ZM52.9667 35.8066C52.0245 38.0556 49.85 39.5147 47.4443 39.5147H33.1643C32.6725 39.5147 32.2755 39.9187 32.2755 40.4191C32.2755 40.5879 32.3229 40.7568 32.4059 40.8954L41.0509 55.1912H35.3093L20.1642 39.78C19.9983 39.6112 19.7731 39.5147 19.5361 39.5147H6.03238C5.89017 39.5147 5.77166 39.3881 5.77759 39.2434C5.77759 39.2434 5.77759 39.2434 5.77759 39.2374C5.77759 34.4319 10.0912 31.0735 16.2654 31.0735H49.3404C49.5833 31.0735 49.8144 30.9771 49.9803 30.8022L56.0537 24.4412H57.7602L52.9667 35.8066Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">Airport</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_airport_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M51.8794 17.2417C51.8356 17.1638 47.1923 9.73983 37.6262 13.2348C36.8971 10.2518 34.337 6 28.3068 6H28.082C27.775 6.01113 27.5009 6.19478 27.3694 6.47304C27.3694 6.52313 25.6096 10.5635 28.6467 13.9026C27.4187 13.8803 26.2017 14.1085 25.0614 14.576C22.8138 15.5277 21.1199 17.4254 20.0125 20.2303C19.8371 20.6532 20.0289 21.143 20.4456 21.3266C20.462 21.3322 20.4785 21.3377 20.4949 21.3433C20.7142 21.4268 24.9956 22.9739 29.1675 22.1948C26.4264 26.1572 25.1711 30.5426 25.0834 36.3137H25.0066C20.3195 36.3137 15.7091 37.4991 11.5866 39.7642C11.1536 39.8977 10.9069 40.3596 11.0329 40.8049C11.159 41.2501 11.6195 41.495 12.0581 41.367C12.1622 41.3336 12.2609 41.2835 12.3486 41.2111C23.5922 35.0337 37.5714 37.8776 45.6025 47.9729C45.8876 48.329 46.4084 48.3847 46.7592 48.0953C47.1101 47.8059 47.1649 47.2772 46.8798 46.921C43.1795 42.2574 38.1251 38.896 32.4347 37.3155C32.4347 35.7238 32.654 29.4073 34.5453 24.3819C35.4827 26.7416 37.4946 29.5576 41.7761 31.0602C42.1544 31.1937 42.571 31.0323 42.7629 30.6762C42.8012 30.6094 45.7177 25.111 42.2585 20.2915C44.9995 20.848 48.8369 20.8925 51.7205 18.3158C52.022 18.0487 52.0932 17.5923 51.8794 17.2473V17.2417ZM39.5888 17.6647C39.205 17.4143 38.7007 17.5256 38.454 17.9151C38.2237 18.2769 38.3005 18.761 38.6349 19.0226C43.6784 22.5732 42.3353 27.4428 41.6281 29.1903C37.4124 27.4539 35.9761 24.2483 35.5211 21.8108C35.4389 21.36 35.0113 21.0595 34.5618 21.143C34.3151 21.1875 34.1013 21.3489 33.9861 21.5715C31.2451 26.8362 30.8504 34.4216 30.8011 36.8925C29.4525 36.6087 28.0875 36.4195 26.7115 36.336C26.8212 29.9082 28.4274 25.3224 32.0784 21.0873C32.3799 20.7423 32.3415 20.2136 32.0017 19.9075C31.7495 19.6849 31.3877 19.6348 31.0916 19.7906C27.8956 21.4157 23.6635 20.5141 21.8819 20.0132C22.6219 18.2824 23.965 16.8967 25.659 16.1176C28.6467 14.8487 31.8591 16.1843 31.8865 16.1955C32.3141 16.3569 32.7856 16.1398 32.9446 15.7057C33.0926 15.3106 32.9226 14.8598 32.5499 14.6706C27.8408 12.4779 28.3068 8.95513 28.6741 7.6473C35.3402 7.88104 36.1406 14.1976 36.1954 14.4758C36.2502 14.9322 36.6559 15.2605 37.1054 15.2104C37.1822 15.1993 37.2589 15.1826 37.3302 15.1492C44.6925 11.9993 48.7492 15.9339 50.0485 17.52C46.1069 20.3026 40.274 18.1043 39.5888 17.6647Z"/>
                            <path d="M50.1964 49.726L48.8204 51.1785C47.4773 52.6255 45.2297 52.6923 43.8044 51.3232C43.755 51.2731 43.7057 51.2286 43.6618 51.1785C42.6312 50.0766 41.1949 49.4478 39.6983 49.4478C38.2017 49.4478 36.7655 50.0766 35.7348 51.1785C34.3917 52.6255 32.1441 52.6923 30.7188 51.3232C30.6695 51.2731 30.6201 51.2286 30.5763 51.1785C28.6027 49.0693 25.319 48.9803 23.2358 50.9838C23.1701 51.045 23.1043 51.1118 23.044 51.1785C21.7064 52.6311 19.4587 52.709 18.0334 51.3511C17.9731 51.2954 17.9183 51.2398 17.8635 51.1785C17.8635 51.1785 17.0192 50.3438 16.4491 49.7483C16.1257 49.4255 15.6049 49.4311 15.2869 49.7594C14.9799 50.0766 14.9744 50.5775 15.265 50.9058C15.8406 51.5125 16.6958 52.3584 16.6958 52.3584C18.6693 54.4676 21.953 54.5566 24.0362 52.5531C24.102 52.4919 24.1678 52.4251 24.2281 52.3584C25.5712 50.9114 27.8188 50.8446 29.2441 52.2137C29.2935 52.2638 29.3428 52.3083 29.3867 52.3584C31.3602 54.4676 34.6439 54.5566 36.7271 52.5531C36.7929 52.4919 36.8586 52.4251 36.919 52.3584C38.3827 50.8001 40.8112 50.7389 42.3461 52.2248C42.39 52.2693 42.4339 52.3138 42.4777 52.3584C44.4512 54.4676 47.735 54.5566 49.8181 52.5531C49.8839 52.4919 49.9497 52.4251 50.01 52.3584L51.386 50.9058C51.693 50.5664 51.6656 50.0377 51.3312 49.726C51.0077 49.4311 50.5144 49.4366 50.2019 49.7483V49.726H50.1964Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">Beach</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_beach_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M53.3281 13.1743C53.2151 13.127 53.0962 13.0974 52.9713 13.0974C51.2886 13.1507 49.8854 11.8362 49.8319 10.1605C49.8319 10.0717 49.8319 9.97697 49.8319 9.88816C49.8319 9.39671 49.4335 9 48.94 9H22.1892C21.6957 9 21.2973 9.39671 21.2973 9.88816V17.2895H10.8919C10.3984 17.2895 10 17.6862 10 18.1776V48.375C10 51.4776 12.533 53.9941 15.6486 54H41.8108C42.3043 54 42.7027 53.6033 42.7027 53.1118V45.1184H53.1081C53.6016 45.1184 54 44.7217 54 44.2303V14.0329C54 13.6303 53.7205 13.275 53.3281 13.1743ZM52.2162 14.8204V42.3711L49.8378 39.6651V13.8079C50.5276 14.3467 51.3481 14.6961 52.2162 14.8204ZM26.3514 43.3421C24.8886 43.3421 23.6043 42.3711 23.2059 40.9737H48.6189L50.7 43.3421H26.3514ZM23.0811 10.7763H48.0541V39.1974H23.0811V10.7763ZM11.7838 19.0658H21.2973V40.0855C21.2973 42.8625 23.5627 45.1125 26.3514 45.1184H36.7568V47.4868H11.7838V19.0658ZM11.8908 49.2632H37.1789L39.7832 52.2237H15.6486C13.8589 52.2237 12.307 50.998 11.8908 49.2632ZM40.9189 50.8204L38.5405 48.1145V45.1184H40.9189V50.8204Z"/>
                            <path d="M28.7297 32.6843H42.4054C42.8989 32.6843 43.2973 32.2876 43.2973 31.7961V18.1777C43.2973 17.6863 42.8989 17.2896 42.4054 17.2896H28.7297C28.2362 17.2896 27.8378 17.6863 27.8378 18.1777V31.7961C27.8378 32.2876 28.2362 32.6843 28.7297 32.6843ZM29.6216 19.0659H41.5135V30.908H29.6216V19.0659Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">School</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_school_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M52.8264 16.3854C52.6914 16.2277 52.4888 16.1369 52.2767 16.1369H18.1448L16.756 11.5113C16.6643 11.2055 16.3798 11 16.0616 11H10.7233C10.3231 11 10 11.3202 10 11.7168C10 12.1134 10.3231 12.4336 10.7233 12.4336H15.5215L24.3124 41.6305C24.3124 41.6305 24.3124 41.6353 24.3124 41.6401L25.4023 45.3196C24.7127 45.9981 24.2835 46.9395 24.2835 47.9765C24.2835 50.0456 25.9809 51.7276 28.069 51.7276C30.157 51.7276 31.7387 50.1459 31.84 48.1676H41.3205C41.3205 48.1963 41.3205 48.2202 41.3205 48.2488C41.3205 50.3179 43.0179 52 45.1012 52C47.1844 52 48.8866 50.3179 48.8866 48.2488C48.8866 46.1797 47.1892 44.4977 45.1012 44.4977C43.558 44.4977 42.2319 45.4199 41.6436 46.734H31.6374C31.4542 46.2084 31.1552 45.7305 30.7453 45.3244C30.0316 44.6171 29.0816 44.2253 28.0738 44.2253C27.5771 44.2253 27.1045 44.3209 26.6705 44.4977L25.9713 42.1418H48.4767C48.8336 42.1418 49.1374 41.8838 49.1904 41.535L52.9855 16.9589C53.0193 16.7534 52.9566 16.5431 52.8168 16.3854H52.8264ZM45.1108 45.936C46.3983 45.936 47.4496 46.973 47.4496 48.2536C47.4496 49.5343 46.4032 50.5712 45.1108 50.5712C43.8184 50.5712 42.7768 49.5343 42.7768 48.2536C42.7768 46.973 43.8233 45.936 45.1108 45.936ZM28.0786 45.6636C28.7007 45.6636 29.289 45.9026 29.7278 46.3422C30.1715 46.7818 30.4126 47.36 30.4126 47.9812C30.4126 49.2619 29.3662 50.2988 28.0786 50.2988C26.7911 50.2988 25.7398 49.2571 25.7398 47.9812C25.7398 46.7054 26.7911 45.6684 28.0786 45.6684V45.6636ZM47.8643 40.7131H25.5518L24.1822 36.1017C24.1629 36.0444 24.1388 35.9918 24.1099 35.9393L18.5788 17.5657H51.4376L47.8643 40.7083V40.7131Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">Shops</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_shops_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="64" height="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M54.2777 17H26.7181C26.3184 17 25.9958 17.3205 25.9958 17.7175V24.4235H17.7178C17.5204 24.4235 17.3326 24.5048 17.1929 24.6483L8.19744 34.0376C8.06742 34.1716 8 34.3485 8 34.5303V42.786C8 43.183 8.32264 43.5035 8.72234 43.5035H13.7353C13.9809 45.4694 15.6712 47 17.7178 47C19.7644 47 21.4595 45.4742 21.7051 43.5035H39.8406C40.0862 45.4694 41.7716 47 43.8134 47C45.8552 47 47.5551 45.4742 47.8007 43.5035H54.2728C54.6725 43.5035 54.9952 43.183 54.9952 42.786V17.7175C54.9952 17.3205 54.6725 17 54.2728 17H54.2777ZM17.7178 45.5651C16.2972 45.5651 15.1463 44.4219 15.1463 43.0108C15.1463 41.5998 16.302 40.4566 17.7178 40.4566C19.1336 40.4566 20.2942 41.6046 20.2942 43.0108C20.2942 44.4171 19.1384 45.5651 17.7178 45.5651ZM17.7178 39.0217C15.8301 39.0217 14.2458 40.3227 13.8172 42.0686H9.44467V34.8173L18.026 25.8584H25.9958V42.0686H21.6233C21.1947 40.3227 19.6103 39.0217 17.7226 39.0217H17.7178ZM43.8182 45.5651C42.4025 45.5651 41.2564 44.4219 41.2564 43.0108C41.2564 41.5998 42.4073 40.4566 43.8182 40.4566C45.2292 40.4566 46.3946 41.6046 46.3946 43.0108C46.3946 44.4171 45.2388 45.5651 43.8182 45.5651ZM53.5553 42.0733H47.7189C47.2903 40.3275 45.7059 39.0265 43.8134 39.0265C41.9209 39.0265 40.351 40.3275 39.9224 42.0733H27.4357V18.4349H53.5505V42.0733H53.5553Z"/>
                            <path d="M35.6751 29.8044H39.5661V33.6692C39.5661 34.0662 39.8887 34.3867 40.2884 34.3867C40.6881 34.3867 41.0108 34.0662 41.0108 33.6692V29.8044H44.9017C45.3014 29.8044 45.6241 29.484 45.6241 29.087C45.6241 28.69 45.3014 28.3695 44.9017 28.3695H41.0108V24.5095C41.0108 24.1125 40.6881 23.792 40.2884 23.792C39.8887 23.792 39.5661 24.1125 39.5661 24.5095V28.3695H35.6751C35.2754 28.3695 34.9528 28.69 34.9528 29.087C34.9528 29.484 35.2754 29.8044 35.6751 29.8044Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">Hospital</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_hospital_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
            <div class="box-border flex items-center flex-col">
                <div>
                    <svg width="63" height="64" viewBox="0 0 63 64" xmlns="http://www.w3.org/2000/svg" class="fill-theme-secondary-color">
                        <g>
                            <path d="M52.6616 22.9177L31.9218 9.12576C31.6692 8.9545 31.3358 8.9545 31.0833 9.12576L10.3384 22.9177C10.1263 23.0587 10 23.2955 10 23.5474C10 23.7992 10.1263 24.036 10.3384 24.177L13.4903 26.2725V37.3091C13.4903 37.566 13.6216 37.8078 13.8388 37.9438L31.2146 49.0509C31.3409 49.1315 31.4823 49.1718 31.6238 49.1718C31.7652 49.1718 31.9218 49.1264 32.0531 49.0408L41.1198 42.8752V47.177L37.7406 53.9118C37.6245 54.1435 37.6346 54.4256 37.7709 54.6472C37.9073 54.8689 38.1548 55.0049 38.4175 55.0049H45.3324C45.5951 55.0049 45.8375 54.8689 45.979 54.6472C46.1154 54.4256 46.1305 54.1435 46.0143 53.9118L42.6351 47.177V41.8476L48.3833 37.9387C48.5904 37.7977 48.7116 37.566 48.7116 37.3141V26.8115L52.6666 24.182C52.8788 24.041 53.0051 23.8043 53.0051 23.5524C53.0051 23.3005 52.8788 23.0638 52.6666 22.9227L52.6616 22.9177ZM39.6398 53.4887L41.8724 49.0408L44.105 53.4887H39.6449H39.6398ZM31.6086 47.5095L15.0006 36.891V27.2749L31.0782 37.9639C31.2045 38.0496 31.351 38.0898 31.4975 38.0898C31.644 38.0898 31.7904 38.0496 31.9167 37.9639L41.1097 31.8538V41.0417L31.6035 47.5095H31.6086ZM47.1912 36.9061L42.6301 40.009V30.8413L47.1912 27.8089V36.9061ZM47.6862 25.668C47.5751 25.7083 47.4741 25.7738 47.3983 25.8594L41.8724 29.5316L31.9218 22.9177C31.5732 22.686 31.1035 22.7817 30.8711 23.1293C30.6388 23.4768 30.7348 23.9453 31.0833 24.177L40.5086 30.4433L31.5025 36.4326L12.1215 23.5474L31.4975 10.6621L50.8735 23.5423L47.6812 25.663L47.6862 25.668Z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-base font-medium">University</div>
                <div class="text-base font-medium contrast-[0.25]"><?= $project->getField('distance_from_university_amount', ['default_value' => '--', 'class_value' => '', 'class_symbol' => 'ml-1']) ?></div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php $component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/request-call-back'); ?>
<?php if (!empty($page_data_options['book_viewing_section_enabled']) && !empty($component_data)) { ?>
<!-- Book your viewing section -->
<div class="s-book-viewing relative">
    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'book_viewing_bg_image'); ?>" class="absolute w-full h-full object-cover z-[-2]" alt="Book your viewing image" />
    <div class="absolute w-full h-full top-0 left-0 opacity-50 z-[-1]" style="background: linear-gradient(90deg, #002349 0%, #003A7A 100%);"></div>
    <div class="flex flex-col justify-center items-center py-10 lg:py-24 px-5">
        <div class="font-PlayfairDisplay t1 text-theme-tertiary-color text-center pb-6 font-medium"><?= $page_data_options['book_viewing_title'] ?></div>
        <div class="font-medium t3 text-theme-secondary-color pb-6 text-center"><?= $page_data_options['book_viewing_sub_title'] ?></div>
        <div class="text-base xl:text-xl text-theme-tertiary-color pb-6 text-center"><?= $page_data_options['book_viewing_description'] ?></div>
        <div>
            <button class="btn btn-secondary request-callback"><?= $page_data_options['book_viewing_btn_label'] ?></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (!empty($page_data_options['about_us_section_enabled'])) { ?>
<!-- About us section -->
<div class="s-about-us section mt-10 px-5" id="about-us">
    <div class="font-PlayfairDisplay t2 text-theme-primary-color pb-6 font-medium text-center lg:text-left"><?= $page_data_options['about_us_title'] ?></div>
    <div class="flex flex-col lg:flex-row gap-5 lg:gap-20 items-center">
        <div>
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_image'); ?>" class="h-[280px] object-cover" alt="About us image" />
        </div>
        <div class="text-lg text-[#666]"><?= $page_data_options['about_us_description'] ?></div>
    </div>
</div>
<?php } ?>

<!-- International Realty section -->
<?php if (
    !empty($page_data_options['international_section_enabled']) &&
    !empty($page_data_options['international_realty_list'])
) : ?>
    <?php ksort($page_data_options['international_realty_list']['int_realty_title']); ?>
<div class="section">
    <div class="font-PlayfairDisplay t2 text-theme-primary-color font-medium pt-5 lg:pt-16 pb-4"><?= $page_data_options['international_realty_title'] ?></div>
    <div class="text-base lg:text-xl text-theme-secondary-color pb-8 font-medium"><?= $page_data_options['international_realty_sub_title'] ?></div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-14">
        <?php foreach ($page_data_options['international_realty_list']['int_realty_title'] as $uid => $title) : ?>
            <div class="inline-flex gap-5">
                <div>
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['international_realty_list']['int_realty_img'], $uid); ?>" class="object-cover w-[56px] h-[56px]" alt="featured-photo" />
                </div>
                <div class="mb-5">
                    <div class="font-PlayfairDisplay text-2xl text-theme-primary-color font-medium pb-3"><?= $title ?></div>
                    <div class="text-[#666]"><?= $page_data_options['international_realty_list']['int_realty_description'][$uid]; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Footer section -->
<?php if (!empty($page_data_options['footer_section_enabled']) && !empty($page_data_options['footer_item_list'])) : ?>
    <?php ksort($page_data_options['footer_item_list']['footer_item_title']); ?>
    <div class="s-footer mt-5 xl:mt-32 bg-theme-primary-color">
        <div class="section text-center py-5 lg:py-16 px-5">
            <div class="font-PlayfairDisplay t2 text-theme-tertiary-color pb-6 font-medium"><?= $page_data_options['footer_title'] ?></div>
            <div class="text-xl text-theme-secondary-color pb-5 lg:pb-16 font-medium"><?= $page_data_options['footer_sub_title'] ?></div>
            <div class="flex flex-row flex-wrap justify-between gap-8">
                <?php foreach ($page_data_options['footer_item_list']['footer_item_title'] as $uid => $title) : ?>
                    <div class="inline-flex flex-col justify-center flex-1">
                        <div class="font-PlayfairDisplay t2 text-theme-tertiary-color border-0 border-b border-solid border-theme-tertiary-color pb-1 lg:pb-5 mb-1 lg:mb-5"><?= $page_data_options['footer_item_list']['footer_item_value'][$uid]; ?></div>
                        <div class="text-base lg:text-xl text-theme-tertiary-color"><?= $title ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Footer -->
<?php include __DIR__ . '/parts/footer.php'; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<script defer src="/js/newsletter.js"></script>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/Sothebys/js/home.js'); ?>
<?= $this->html->script('/Sothebys/js/lead.js'); ?>