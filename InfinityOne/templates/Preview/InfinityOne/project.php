<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/InfinityOne/css/tw-project'); ?>

<div class="infinity-project-page">
    <!-- Header -->
    <?php include __DIR__ . '/parts/header.php'; ?>
    <!-- Banner Section -->
    <div class="box-border relative h-screen !bg-center !bg-no-repeat !bg-cover"
        style=" background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 0%, #000 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);">
        <div class="flex flex-col heroArea">
            <div
                class="box-border absolute flex flex-col w-full px-8 leading-tight text-white xl:items-center bottom-8 md:bottom-28 xl:bottom-20 heroText">
                <div class="text-2xl xl:text-3xl 2xl:text-4xl md:text-center heroTitle">
                    <?= $page_data_options['primary_section_title'] ?>
                </div>

                <div
                    class="text-base md:text-lg box-border 2xl:text-2xl mt-2.5 text-left md:text-center xl:w-3/4 heroSubtitle">
                    <?= $page_data_options['primary_section_description'] ?>
                </div>

                <!-- Newsletter section -->
                <div class="box-border mt-8 xl:w-full newsletter">
                    <form id="primary-enquiry-form" action="" integration-recaptcha=true data-action="lead_form">
                        <div class='hidden'>
                            <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Homepage - Book Your viewing']); ?>
                            <?= \App\Utils\Leads::loadProjectRequiredFields($project); ?>
                        </div>
                        <div
                            class="box-border flex flex-col items-start w-full justify-items-start sm:justify-center xl:flex-row">
                            <div class="mb-3 xl:mb-0 xl:mr-5 w-full xl:w-[300px] relative form-group">
                                <input placeholder="Name" class="input-field-infinity" id="full_name"
                                    name="full_name" />
                                <div class="absolute bottom-[1px] left-5 form-group__helper"></div>
                            </div>
                            <div class="mb-3 xl:mb-0 xl:mr-5 w-full xl:w-[300px] relative form-group">
                                <input placeholder="Phone Number" class="input-field-infinity required-field" id="phone"
                                    name="phone" />
                                <div class="absolute bottom-[1px] left-5 form-group__helper"></div>
                            </div>
                            <div class="mb-3 xl:mb-0 xl:mr-5 w-full xl:w-[300px] relative form-group">
                                <input placeholder="Email Address" class=" input-field-infinity" id="email"
                                    name="email" />
                                <div class="absolute bottom-[1px] left-5 form-group__helper"></div>
                            </div>

                            <button type="submit" class="hidden xl:block btn-infinity" id="enquiry-btn"
                                onClick="javascript:submit_lead_form({obj: this, form_id: 'primary-enquiry-form'})">
                                <?= $page_data_options['primary_section_btn_text'] ?>
                            </button>
                        </div>
                        <div
                            class="flex items-center justify-between mt-4 md:mt-8 xl:justify-center md:text-center lg:items-center signup">
                            <button type="submit" class="w-44 btn-infinity mr-2.5 xl:hidden"
                                onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                                <?= $page_data_options['primary_section_btn_text'] ?>
                            </button>
                            <div class="flex items-center pr-2.5 md:px-0">
                                <input type="checkbox" checked="true" value="1" name="options[email_consent]"
                                    class="mr-2 outline-none" />
                                <div class="text-xs sm:text-sm xl:text-base 2xl:text-lg">
                                    <span class="font-semibold">Sign up to our newsletter</span>
                                    for project updates!
                                </div>
                            </div>
                            <div class="whatsapp-icon xl:hidden sm:ml-3">
                                <a href="https://wa.me/<?= $site_data->get('phone') ?>"
                                    target="_blank">
                                    <svg width="37" height="37" viewBox="0 0 46 46" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="8" y="10" width="29" height="29" fill="white" />
                                        <path
                                            d="M23.0001 0C10.3181 0 0.0001484 10.318 0.0001484 23C0.0001484 26.96 1.02315 30.854 2.96315 34.29L0.0371484 44.73C-0.0588516 45.073 0.0341485 45.441 0.282148 45.696C0.473148 45.893 0.733148 46 1.00015 46C1.08015 46 1.16115 45.99 1.24015 45.971L12.1361 43.272C15.4631 45.058 19.2101 46 23.0001 46C35.6821 46 46.0001 35.682 46.0001 23C46.0001 10.318 35.6821 0 23.0001 0ZM34.5701 31.116C34.0781 32.478 31.7181 33.721 30.5841 33.888C29.5661 34.037 28.2781 34.101 26.8641 33.657C26.0071 33.387 24.9071 33.029 23.4981 32.428C17.5751 29.902 13.7071 24.013 13.4111 23.624C13.1161 23.235 11.0001 20.463 11.0001 17.594C11.0001 14.725 12.5251 13.314 13.0671 12.73C13.6091 12.146 14.2481 12 14.6421 12C15.0361 12 15.4291 12.005 15.7741 12.021C16.1371 12.039 16.6241 11.884 17.1031 13.022C17.5951 14.19 18.7761 17.059 18.9221 17.352C19.0701 17.644 19.1681 17.985 18.9721 18.374C18.7761 18.763 18.6781 19.006 18.3821 19.347C18.0861 19.688 17.7621 20.107 17.4961 20.369C17.2001 20.66 16.8931 20.975 17.2371 21.559C17.5811 22.143 18.7661 24.052 20.5221 25.598C22.7771 27.584 24.6801 28.2 25.2701 28.492C25.8601 28.784 26.2051 28.735 26.5491 28.346C26.8931 27.956 28.0251 26.643 28.4181 26.06C28.8111 25.477 29.2051 25.573 29.7471 25.768C30.2891 25.962 33.1922 27.372 33.7822 27.664C34.3722 27.956 34.7662 28.102 34.9142 28.345C35.0622 28.587 35.0621 29.755 34.5701 31.116Z"
                                            fill="#0DC143" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="text-sm text-center generic-helper"></div>
                    </form>
                </div>
                <!-- Newsletter section Ends-->
            </div>
            <!-- Social Icons Section -->
            <div class="absolute hidden md:flex bottom-10 left-10 social-icons">
                <?php if ($site_data_options['social_media_facebook']) : ?>
                <a href="<?= $site_data_options['social_media_facebook'] ?>" target="_blank">
                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none"
                        class="stroke-theme-secondary-color fill-theme-secondary-color"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="facebook-app-symbol">
                            <g id="Group">
                                <path id="f 1"
                                    d="M15.1885 25.4545V13.8444H19.2138L19.8177 9.31833H15.1885V6.42913C15.1885 5.11915 15.5628 4.22642 17.5061 4.22642L19.9807 4.22543V0.177201C19.5527 0.123385 18.0838 0 16.3741 0C12.804 0 10.3598 2.10886 10.3598 5.98088V9.31833H6.32231V13.8444H10.3598V25.4545H15.1885Z" />
                            </g>
                        </g>
                    </svg>
                </a>
                <?php endif; ?>

                <?php if ($site_data_options['social_media_twitter']) : ?>
                <a href="<?= $site_data_options['social_media_twitter'] ?>" class="ml-6" target="_blank">
                    <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                        class="stroke-theme-secondary-color fill-theme-secondary-color"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="twitter">
                            <g id="Group">
                                <g id="Group_2">
                                    <path id="Vector"
                                        d="M25.9695 5.6931C25.023 6.12217 24.0143 6.40657 22.9627 6.54466C24.0445 5.87722 24.8702 4.82839 25.2584 3.56421C24.2498 4.18561 23.1361 4.62454 21.9493 4.86949C20.9916 3.81573 19.6266 3.16309 18.1375 3.16309C15.2484 3.16309 12.9225 5.58625 12.9225 8.55684C12.9225 8.98426 12.9575 9.39525 13.0434 9.7865C8.70503 9.56786 4.86617 7.41924 2.28731 4.14616C1.83709 4.95333 1.573 5.87722 1.573 6.8718C1.573 8.73932 2.50368 10.3948 3.89095 11.3532C3.05254 11.3367 2.23004 11.0852 1.53323 10.689C1.53323 10.7055 1.53323 10.7268 1.53323 10.7482C1.53323 13.3686 3.34209 15.5452 5.71413 16.0466C5.28935 16.1666 4.8264 16.2242 4.34595 16.2242C4.01186 16.2242 3.67458 16.2044 3.35799 16.1321C4.03413 18.2676 5.95276 19.8375 8.23412 19.8885C6.45867 21.3236 4.20436 22.1884 1.76391 22.1884C1.33595 22.1884 0.925499 22.1686 0.515045 22.1144C2.82663 23.6547 5.56617 24.5343 8.52049 24.5343C18.1232 24.5343 23.3732 16.3146 23.3732 9.18975C23.3732 8.95138 23.3652 8.72123 23.3541 8.49273C24.3898 7.73323 25.26 6.78468 25.9695 5.6931Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
                <?php endif; ?>

                <?php if ($site_data_options['social_media_youtube']) : ?>
                <a href="<?= $site_data_options['social_media_youtube'] ?>" class="ml-6" target="_blank">
                    <svg width="27" height="28" viewBox="0 0 27 28" fill="none"
                        class="stroke-theme-secondary-color fill-theme-secondary-color"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="youtube">
                            <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.0184 5.36798C25.145 5.6714 26.0334 6.55959 26.3366 7.68638C26.9001 9.7445 26.8784 14.0345 26.8784 14.0345C26.8784 14.0345 26.8784 18.3027 26.3368 20.361C26.0334 21.4876 25.1452 22.376 24.0184 22.6792C21.9601 23.221 13.727 23.221 13.727 23.221C13.727 23.221 5.51538 23.221 3.43558 22.6577C2.30879 22.3543 1.4206 21.4659 1.11718 20.3393C0.575562 18.3027 0.575562 14.0129 0.575562 14.0129C0.575562 14.0129 0.575562 9.7445 1.11718 7.68638C1.4204 6.55979 2.33046 5.64973 3.43538 5.34651C5.4937 4.80469 13.7268 4.80469 13.7268 4.80469C13.7268 4.80469 21.9601 4.80469 24.0184 5.36798ZM17.9518 14.0129L11.1053 17.9562V10.0696L17.9518 14.0129Z" />
                        </g>
                    </svg>
                </a>
                <?php endif; ?>

                <?php if ($site_data_options['social_media_instagram']) : ?>
                <a href="<?= $site_data_options['social_media_instagram'] ?>" class="ml-6" target="_blank">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        class="stroke-theme-secondary-color fill-theme-secondary-color"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="instagram">
                            <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.1733 7.52714C23.1175 6.2627 22.9238 5.3992 22.6407 4.64373C22.3532 3.8511 21.9022 3.13314 21.3195 2.53971C20.7475 1.9354 20.055 1.46758 19.2906 1.16924C18.562 0.875784 17.7295 0.675134 16.5102 0.617676C15.2887 0.559674 14.8984 0.545898 11.7876 0.545898C8.67682 0.545898 8.28653 0.559674 7.06498 0.617313C5.8457 0.675134 5.01321 0.875965 4.28454 1.1696C3.52022 1.46776 2.82791 1.9354 2.25567 2.53971C1.67295 3.13296 1.22184 3.85091 0.934145 4.64355C0.651172 5.3992 0.457689 6.2627 0.402283 7.52696C0.346352 8.79394 0.333069 9.1985 0.333069 12.4245C0.333069 15.6507 0.346352 16.0554 0.402283 17.3222C0.457863 18.5865 0.651522 19.45 0.934669 20.2056C1.22219 20.9981 1.67312 21.7162 2.25585 22.3094C2.82791 22.9138 3.5204 23.3814 4.28472 23.6796C5.01321 23.9734 5.84587 24.174 7.06515 24.2318C8.28688 24.2897 8.677 24.3033 11.7878 24.3033C14.8985 24.3033 15.2888 24.2897 16.5104 24.2318C17.7297 24.174 18.5622 23.9734 19.2908 23.6796C20.8294 23.0626 22.0457 21.8012 22.6407 20.2056C22.924 19.45 23.1175 18.5865 23.1733 17.3222C23.2288 16.0552 23.2421 15.6507 23.2421 12.4247C23.2421 9.1985 23.2288 8.79394 23.1733 7.52714ZM11.7875 6.32468C8.53898 6.32468 5.90554 9.05584 5.90554 12.4247C5.90554 15.7935 8.53898 18.5245 11.7875 18.5245C15.0362 18.5245 17.6696 15.7935 17.6696 12.4247C17.6696 9.05584 15.0362 6.32468 11.7875 6.32468ZM11.7875 16.3842C9.67891 16.384 7.96937 14.6113 7.96954 12.4245C7.96954 10.2378 9.67891 8.46495 11.7877 8.46495C13.8964 8.46513 15.6058 10.2378 15.6058 12.4245C15.6058 14.6113 13.8962 16.3842 11.7875 16.3842ZM17.902 7.5092C18.6611 7.5092 19.2765 6.871 19.2765 6.08381C19.2765 5.29644 18.6611 4.65823 17.902 4.65823C17.1427 4.65823 16.5273 5.29644 16.5273 6.08381C16.5273 6.871 17.1427 7.5092 17.902 7.5092Z" />
                        </g>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if ($site_data_options['social_media_linkedin']) : ?>
                    <a href="<?= $site_data_options['social_media_linkedin'] ?>" class="ml-6" target="_blank">
                        <svg  width="24" height="25" xmlns="http://www.w3.org/2000/svg" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if ($site_data_options['social_media_tiktok']) : ?>
                    <a href="<?= $site_data_options['social_media_tiktok'] ?>" class="ml-6" target="_blank">
                        <svg width="24" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- About Project -->
    <div class="py-7 md:py-32 xl:py-52 about-project">
        <div class="flex flex-col px-8 md:items-center desc-text">
            <div class="text-lg italic font-semibold xl:text-2xl 2xl:text-3xl md:text-center title-text">
                <?= $project->getField('short_description') ?>
            </div>
            <div
                class="text-base lg:text-lg w-full xl:w-8/12 2xl:text-2xl mt-2 xl:mt-2.5 text-left md:text-center description-text">
                <?= $project->getField('description') ?>
            </div>
            <div class="flex mt-4 xl:mt-8 md:justify-center">
                <button class="mr-8 btn-infinity" onClick="document.getElementById('contact-us').scrollIntoView();">
                    <?= $page_data_options['project_section_btn_text'] ?>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="49" viewBox="0 0 50 49"
                    class="hidden fill-theme-primary-color md:block" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M26.3905 0.071888L24.5137 0L22.6368 0.071888L20.771 0.28713L18.9272 0.644463L17.1161 1.14179L15.3484 1.77619L13.6345 2.54394L11.9845 3.44054L10.408 4.46073L8.91428 5.59851L7.5121 6.84722L6.20968 8.19952L5.01469 9.64748L3.93412 11.1826L2.97432 12.7959L2.14091 14.4778L1.43881 16.2186L0.872112 18.008L0.444155 19.8354L0.157448 21.6903L0.0136719 23.5616V25.4384L0.157448 27.3097L0.444155 29.1646L0.872112 30.992L1.43881 32.7814L2.14091 34.5222L2.97432 36.2041L3.93412 37.8174L5.01469 39.3525L6.20968 40.8005L7.5121 42.1528L8.91428 43.4015L10.408 44.5393L11.9845 45.5595L13.6345 46.4561L15.3484 47.2238L17.1161 47.8582L18.9272 48.3555L20.771 48.7129L22.6368 48.9281L24.5137 49L26.3905 48.9281L28.2563 48.7129L30.1002 48.3555L31.9112 47.8582L33.6789 47.2238L35.3928 46.4561L37.0428 45.5595L38.6193 44.5393L40.1131 43.4015L41.5152 42.1528L42.8176 40.8005L44.0126 39.3525L45.0932 37.8174L46.053 36.2041L46.8864 34.5222L47.5885 32.7814L48.1552 30.992L48.5832 29.1646L48.8699 27.3097L49.0137 25.4384V23.5616L48.8699 21.6903L48.5832 19.8354L48.1552 18.008L47.5885 16.2186L46.8864 14.4778L46.053 12.7959L45.0932 11.1826L44.0126 9.64748L42.8176 8.19952L41.5152 6.84722L40.1131 5.59851L38.6193 4.46073L37.0428 3.44054L35.3928 2.54394L33.6789 1.77619L31.9112 1.14179L30.1002 0.644463L28.2563 0.28713L26.3905 0.071888ZM31.9439 26.6015L35.0544 29.7098C35.8321 30.4868 35.8321 31.8189 35.0544 32.707L32.9437 34.8161C30.7219 37.0363 24.8341 34.5941 19.6129 29.3767C14.3917 24.1594 12.0588 18.2759 14.1695 16.0558L16.2802 13.9466C17.0579 13.1696 18.3909 13.1696 19.2797 13.9466L22.3902 17.0548C23.5011 18.1649 23.0567 20.0521 21.6125 20.4961C20.6127 20.8291 19.9462 21.9392 20.2795 22.9383C20.8349 25.2694 23.8343 28.1557 26.0561 28.7107C27.0559 28.9328 28.1668 28.3777 28.5001 27.3786C28.9445 25.9355 30.833 25.4915 31.9439 26.6015Z" />
                </svg>
                <div class="flex-col hidden md:ml-2 md:flex">
                    <span class="text-[13px] text-[#737373]">
                        <?= $page_data_options['project_section_call_text'] ?>
                    </span><span class="text-lg font-bold">
                        <?= $site_data->get('phone'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties-Villas -->
    <div
        class="flex flex-col items-center pt-7 box-border justify-between xl:justify-center xl:flex-row xl:pr-28 xl:pl-52 2xl:pr-24 2xl:pl-60 md:pt-32 xl:py-40 bg-[#F8F8F8] villas">
        <div class="xl:w-[470px] px-8 xl:px-0 xl:mr-20 md:text-center xl:text-left">
            <div class="text-xl md:text-2xl 2xl:text-3xl title-text">
                <?= $page_data_options['villas_section_title'] ?>
            </div>
            <div class="text-base md:text-lg 2xl:text-2xl mt-2 xl:mt-2.5 description-text">
                <?= $page_data_options['villas_section_description'] ?>
            </div>
            <button class="mt-4 xl:mt-8 btn-infinity" onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['villas_section_btn_text'] ?>
            </button>
        </div>
        <div class="box-border mt-7 md:mt-32 xl:mt-0 propertyImage">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'villas_section_image'); ?>"
                alt="property-img"
                class="object-cover w-screen 2xl:h-[434px]  xl:w-[500px] 2xl:w-[620px] xl:drop-shadow-xl" />
        </div>
    </div>

    <!--Apartments -->
    <div
        class="box-border flex flex-col-reverse items-center justify-between xl:justify-center pt-7 xl:flex-row xl:pl-28 xl:pr-52 2xl:pr-60 2xl:pl-24 md:pt-32 xl:py-40 apartments">
        <div class="box-border propertyImage">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'apartments_section_image'); ?>"
                alt="property-image"
                class="object-cover w-screen xl:w-[500px] 2xl:h-[434px] 2xl:w-[620px] xl:drop-shadow-xl" />
        </div>
        <div class="xl:w-[470px] mb-7 md:mb-32 xl:ml-20 xl:mb-0 px-8 xl:px-0 md:text-center xl:text-left">
            <div class="text-xl xl:text-2xl 2xl:text-3xl title-text">
                <?= $page_data_options['apartments_section_title'] ?>
            </div>
            <div class="text-base lg:text-lg 2xl:text-2xl mt-2 xl:mt-2.5 description-text">
                <?= $page_data_options['apartments_section_description'] ?>

            </div>
            <button class="mt-4 xl:mt-8 btn-infinity" onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['apartments_section_btn_text'] ?>
            </button>
        </div>
    </div>

    <!-- Amenities -->
    <div class="hidden xl:block">
        <div style="background: linear-gradient(to right,rgba(234, 234, 234, 1) 30%,transparent 70%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'amenities_section_image'); ?>)"
            class="w-full !bg-center flex flex-col !bg-no-repeat justify-center h-[70vh] !bg-cover">
            <div class="w-[470px] ml-52 2xl:ml-80 spectacular-desc">
                <div class="text-xl xl:text-2xl 2xl:text-3xl title-text">
                    <?= $page_data_options['amenities_section_title'] ?>
                </div>
                <div class="text-base lg:text-lg 2xl:text-2xl mt-2.5 description-text">
                    <?= $project->getField('amenities_description') ?>
                </div>
                <button class="mt-8 btn-infinity" onClick="document.getElementById('contact-us').scrollIntoView();">
                    <?= $page_data_options['amenities_section_btn_text'] ?>
                </button>
            </div>
        </div>
    </div>
    <!--Amenities mobile view -->
    <div class="flex flex-col items-center justify-center pt-7 md:pt-32 xl:hidden amenities">
        <div class="box-border w-full px-8 mb-7 md:mb-32 md:text-center">
            <div class="text-xl title-text">
                <?= $page_data_options['amenities_section_title'] ?>
            </div>
            <div class="mt-2 text-base description-text">
                <?= $project->getField('amenities_description') ?>
            </div>
            <button class="mt-4 btn-infinity" onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['amenities_section_btn_text'] ?>
            </button>

        </div>
        <div class="w-screen propertyImage">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_section_image'); ?>"
                alt="" class="object-cover w-full" />
        </div>
    </div>

    <!-- Gallery -->
    <div class="xl:hidden text-[26px] px-8 py-6 italic">
        See for <span class="font-bold">Yourself....</span>
    </div>
    <div class="xl:px-36 xl:mt-40 xl:mb-32 h-[70vh]" id="gallery">
        <?= $this->element('gallery/template-1', ['obj' => $project, 'media_names' => ['featured_photo', 'photos',], 'gallery_template' => 'qoetix-gallery--template-2']); ?>
    </div>

    <!-- Site Plan -->
    <?php if ($project->getPhotoUrl('siteplans', 'large')) : ?>
    <div class="w-screen mb-7 xl:mb-40 xl:h-screen">
        <img src="<?= $project->getPhotoUrl('siteplans', 'large') ?>"
            alt="site-plan" class="object-cover w-full h-full">
    </div>
    <?php endif; ?>

    <!-- Properties Table -->
    <div class="hidden lg:block properties">
        <div class="xl:px-36 property-list-title">
            <div class="text-lg text-black xl:text-2xl 2xl:text-4xl">
                <?= $page_data_options['properties_section_title'] ?>
            </div>
            <div class="text-base xl:text-xl 2xl:text-2xl text-theme-primary-color">
                <?= $page_data_options['properties_section_subtitle'] ?>
            </div>
        </div>

        <div class="box-border w-full mt-9 xl:mt-20">
            <table class="box-border w-full p-2 text-black border-collapse property-listing-table">
                <thead
                    class="text-xs md:text-sm 2xl:text-base border-r-0 border-l-0 border-b border-solid border-t border-[#dddddd] h-16 capitalize">
                    <tr class="bg-[#fff]">
                        <th class="pl-4 font-semibold align-middle xl:pr-5 xl:pl-24">Unit</th>
                        <th class="font-semibold"><span class="hidden md:inline-block">Property&nbsp;</span>Name</th>
                        <th class="font-semibold"><span class="hidden md:inline-block">Property&nbsp;</span>Type</th>
                        <th class="font-semibold">Status</th>
                        <th class="font-semibold ">Build Stage</th>
                        <th class="font-semibold">Beds</th>
                        <th class="pr-4 font-semibold xl:pl-5 xl:pr-24">Baths</th>
                    </tr>
                </thead>
                <tbody class="xl:[&>*:nth-child(odd)]:bg-[#f9f9f9] xl:[&>*:nth-child(even)]:bg-[#fff]" id="table-body">
                    <?php foreach ($project_properties['data'] as $property) : ?>
                    <tr
                        class="font-light text-center text-xs md:text-sm 2xl:text-base border-b border-solid border-r-0 border-t-0 border-l-0 border-[#dddddd] h-16 capitalize">
                        <td class="pl-4 xl:pr-5 xl:pl-24">
                            <?= $property->getField('ref') ?>
                        </td>
                        <td>
                            <?= $property->getField('name') ?>
                        </td>
                        <td>
                            <?= $property->getField('property_type') ?>
                        </td>
                        <td>
                            <?= $property->getField('status') ?>
                        </td>
                        <td class="hidden md:table-cell">
                            <?= $property->getField('construction_stage') ?>
                        </td>
                        <td>
                            <?= $property->getField('bedrooms') ?>
                        </td>
                        <td class="pr-4 xl:pl-5 xl:pr-24">
                            <?= $property->getField('bathrooms') ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="box-border flex flex-col justify-center px-8 py-7 md:py-44 sm:items-center contact-form" id="contact-us">
        <div class="text-lg xl:text-2xl 2xl:text-3xl title-text">
            <?= $page_data_options['contact_us_section_title'] ?>
        </div>
        <div
            class="xl:w-[54rem] text-base lg:text-lg 2xl:text-2xl mt-1.5 mb-4 lg:mb-8 text-left sm:text-center description-text">
            <?= $page_data_options['contact_us_section_description'] ?>
        </div>
        <form id="enquiry-form" action="" integration-recaptcha=true data-action="lead_form">
            <div class='hidden'>
                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Homepage - Contact Us']); ?>
                <?= \App\Utils\Leads::loadProjectRequiredFields($project); ?>
            </div>
            <div class="flex flex-col lg:flex-row form">
                <div class="mb-4 lg:mb-0 lg:mr-5 form-group">
                    <input type="text" class="input-field-infinity" placeholder="Your Name" id="full_name"
                        name="full_name" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="mb-4 lg:mb-0 lg:mr-5 form-group">
                    <input type="text" class="input-field-infinity required-field" placeholder="Phone Number" id="phone"
                        name="phone" />
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="input-field-infinity" placeholder="Email Address" id="email"
                        name="email" />
                    <div class="form-group__helper"></div>
                </div>
            </div>
            <div class="flex flex-col mt-4 lg:mt-5 md:relative md:block message-field">
                <div class="form-group">
                    <textarea type="text" class="textarea-field-infinity required-field" placeholder="Message" id="message"
                        name="message"></textarea>
                    <div class="form-group__helper"></div>
                    <button type="submit" id="enquiry-btn"
                        class="w-24 mt-4 lg:w-32 lg:absolute bottom-7 right-5 h-37 lg:h-43 mt-1.7 lg:mt-0 btn-infinity-sm formBTN"
                        onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                        SEND
                    </button>
                </div>
            </div>
            <div class="text-sm text-center generic-helper"></div>
            <?php if (\App\Utils\IntegrationsRecaptchav3::isEnabled($site_data_options)) : ?>
            <div class="w-full mt-3 text-sm text-center grecaptcha">
                This site is protected by reCAPTCHA and the Google
                <a href="https://policies.google.com/privacy" class="mx-1 no-underline" target="_blank">Privacy
                    Policy</a>
                and
                <a href="https://policies.google.com/terms" class="mx-1 no-underline" target="_blank">Terms
                    of Service.</a>
            </div>
            <?php endif; ?>
        </form>


    </div>

    <!-- Footer -->
    <?php include __DIR__ . '/parts/footer.php'; ?>
</div>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<script defer src="/js/newsletter.js"></script>
<?= $this->render('/Preview/general/footer'); ?>