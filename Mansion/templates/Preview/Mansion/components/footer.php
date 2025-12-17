<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/footer');
$footer_options = json_decode($component_data['options'], true);
$footer_menu_items = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'footer');

$about = \App\Utils\SitesPage::getFirstPageByTemplate('about');
$privacy = \App\Utils\SitesPage::getFirstPageByTemplate('privacy_policy');
$contact = \App\Utils\SitesPage::getFirstPageByTemplate('contact');
$cookies = \App\Utils\SitesPage::getFirstPageByTemplate('cookie_policy');
$properties = \App\Utils\SitesPage::getFirstPageByTemplate('properties');
$wishlist = \App\Utils\SitesPage::getFirstPageByTemplate('wishlist');
$listProperty = \App\Utils\SitesPage::getFirstPageByTemplate('list_a_property');
$discover = \App\Utils\SitesPage::getFirstPageByTemplate('discover');
$news = \App\Utils\SitesPage::getFirstPageByTemplate('blogs');
?>
<div class="bg-theme-secondary-color text-theme-tertiary-color pt-14 pb-5">
    <div class="max-w-[1400px] mx-auto px-5">
        <div class="flex flex-col gap-2 md:flex-row justify-between text-center md:text-left">
            <div class="flex flex-col items-center lg:items-start mb-10 lg:mb-5">
                <a href="/" class="no-underline">
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'footer_image'); ?>" class="h-[100px]"/>
                </a>
                <div class="mb-2 footer-title"><?= $footer_options['footer_logo_description']; ?></div>
                <div class="text-base text-theme-tertiary-color mt-5">E: <?= $site_data->get('email') ?></div>
                <div class="text-base text-theme-tertiary-color mb-5">T: <?= $site_data->get('phone') ?></div>
                <div class="flex flex-wrap gap-2 social-icons mt-5 justify-center">
                    <?php if ($site_data_options['social_media_linkedin']) : ?>
                        <a href="<?= $site_data_options['social_media_linkedin'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-theme-tertiary-color fill-theme-tertiary-color" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($site_data_options['social_media_facebook']) : ?>
                        <a href="<?= $site_data_options['social_media_facebook'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-theme-tertiary-color fill-theme-tertiary-color" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($site_data_options['social_media_instagram']) : ?>
                        <a href="<?= $site_data_options['social_media_instagram'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-theme-tertiary-color fill-theme-tertiary-color" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($site_data_options['social_media_twitter']) : ?>
                        <a href="<?= $site_data_options['social_media_twitter'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-theme-tertiary-color fill-theme-tertiary-color" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($site_data_options['social_media_youtube']) : ?>
                        <a href="<?= $site_data_options['social_media_twitter'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-theme-tertiary-color fill-theme-tertiary-color" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($site_data_options['social_media_tiktok']) : ?>
                        <a href="<?= $site_data_options['social_media_tiktok'] ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="none" class="stroke-theme-tertiary-color fill-theme-tertiary-color"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex flex-col gap-2 lg:flex-row justify-around text-center md:text-left flex-1"><div class="mb-5">
                <div class="mb-2 footer-title">Company</div>
                <div class="text-base leading-7 brightness-90 text-theme-tertiary-color">
                    <?php if (!empty($news)) : ?>
                        <div>
                            <a href="/<?= $news->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $news->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($contact)) : ?>
                        <div>
                            <a href="/<?= $contact->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $contact->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($about)) : ?>
                        <div>
                            <a href="/<?= $about->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $about->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-5">
                <div class="mb-2 footer-title">Properties</div>
                <div class="text-base leading-7 brightness-90 text-theme-tertiary-color">
                    <?php if (!empty($listProperty)) : ?>
                        <div>
                            <a href="/<?= $listProperty->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $listProperty->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($properties)) : ?>
                        <div>
                            <a href="/<?= $properties->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $properties->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($wishlist)) : ?>
                        <div>
                            <a href="/<?= $wishlist->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $wishlist->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-5">
                <div class="mb-2 footer-title">Information</div>
                <div class="text-base leading-7 brightness-90 text-theme-tertiary-color">
                    <?php if (!empty($discover)) : ?>
                        <div>
                            <a href="/<?= $discover->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $discover->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($privacy)) : ?>
                        <div>
                            <a href="/<?= $privacy->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $privacy->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($cookies) && \App\Utils\IntegrationsGdpr::isEnabled($site_data_options)) : ?>
                        <div>
                            <a href="/<?= $cookies->get('page_slug') ?>" class="footer-sub-title no-underline"><?= $cookies->get('page_title'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div></div>
            <div>
                <div class="mb-2 footer-title"><?= $footer_options['contact_form_title'] ?></div>
                <div class="footer-sub-title mb-5"><?= $footer_options['contact_form_sub_title'] ?></div>
                <form id="contact-form" action="" class="enquiry-form grid grid-cols-2 gap-4 w-full" integration-recaptcha=true data-action="lead_form">
                    <div class='hidden'>
                        <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Request a callback']); ?>
                    </div>
                    <div class="form-group col-span-2">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="full_name" id="full_name" placeholder="<?= $footer_options['contact_form_name'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-1">
                        <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md" name="email" id="email" placeholder="<?= $footer_options['contact_form_email'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group  col-span-1">
                        <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border rounded-md required-field" name="phone" id="phone" placeholder="<?= $footer_options['contact_form_phone'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="col-span-2">
                        <button class="mb-5 btn btn-tertiary btn-md w-full md:w-fit" type="submit" id="contact-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'contact-form'})"><?= $footer_options['contact_form_btn'] ?></button>
                    </div>
                    <div class="generic-helper col-span-2"></div>
                </form>
            </div>
        </div>
        <div class="bg-gray-200 h-[1px] w-auto opacity-10 block rounded-full"></div>
        <div class="mt-8 flex flex-wrap justify-between gap-5">
            <div class="xl:mt-0 text-sm text-theme-tertiary-color flex-1 basis-full lg:basis-0 text-center lg:text-left">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> <?= $site_data->get('site_title') ?>
            </div>
            <div class="md:self-end xl:mt-0 text-right qobrix-logo">
                <img src="/img/qobrix-logo.png" class="object-contain object-right w-20" alt="qobrix-logo" loading="lazy">
            </div>
        </div>
    </div>
</div>
<script defer src="/js/newsletter.js"></script>