<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/VidiGroup/css/tw-project'); ?>
<!-- Header -->
<?php include __DIR__ . '/parts/top-menu.php'; ?>
<div class="box-border content" id="container">

    <!-- Main Section -->
    <div id="#">
        <div style="
                background: radial-gradient(
                        136.05% 98.72% at 54.48% 50%,
                        rgba(0, 0, 0, 0) 0%,
                        rgba(0, 0, 0, 0.39) 100%
                    ),
                    url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>);
                    " class="flex flex-col items-center justify-center h-[calc(100vh_-_57px)] xl:h-[87vh] 2xl:h-[92vh] !bg-center !bg-no-repeat !bg-cover">
            <div class="flex flex-col justify-center px-10 text-center h-full lg:w-[48rem] banner-content">
                <div
                    class="text-2xl font-normal leading-normal text-white md:text-3xl xl:text-4xl xl:font-light 2xl:text-6xl title">
                    <?= $page_data_options['primary_section_title'] ?>
                </div>
                <div
                    class="mt-3 text-base text-white md:text-xl 2xl:text-2xl tracking-sm-description lg:tracking-description description">
                    <?= $page_data_options['primary_section_description'] ?>
                </div>
                <div class="mt-4 xl:mt-8">
                    <button class="btn !px-2 sm:!px-5 mr-4 bg-white border-white xl:mr-8 text-theme-primary-color"
                        onClick="document.getElementById('contact-us').scrollIntoView();">
                        <?= $page_data_options['primary_section_btn_1_text'] ?>
                    </button>
                    <button class="!px-2 sm:!px-5 btn text-white border-white " style="background: rgba(0, 0, 0, 0.4)"
                        onClick="document.getElementById('project').scrollIntoView();">
                        <?= $page_data_options['primary_section_btn_2_text'] ?>
                    </button>
                </div>
            </div>

            <div
                class="box-border flex flex-col justify-between w-full px-5 mt-4 mb-4 xl:px-10 xl:mb-10 xl:flex-row xl:items-center">
                <form class="flex flex-col xl:items-center xl:flex-row newsletter" action="" integration-recaptcha=true
                    data-action="newsletter">
                    <div
                        class="relative text-sm lg:w-80 rounded-full bg-white/[.15] flex px-1 items-center subscribe-section">
                        <input placeholder="Email Address" name="email"
                            class="flex-1 h-10 pl-4 text-white placeholder-white bg-transparent border-none outline-none" />
                        <button type="submit"
                            class="btn !tracking-[0.24px] !border-none !py-2 my-1 !text-xs text-white border-transparent bg-theme-primary-color subscribe-me flex items-center gap-1">
                            Subscribe
                        </button>
                    </div>
                    <div class="mt-3 text-xs text-white xl:max-w-sm xl:ml-4 xl:mt-0 2xl:text-sm">
                        Sign up for updates on the hottest offers & receive
                        favoured rates at any of the projects stores, for
                        <span class="font-bold underline decoration-theme-primary-color decoration-2">FREE!</span>
                    </div>
                </form>

                <div class="items-end hidden xl:flex xl:ml-auto socialMediaIcons">
                    <?php if ($site_data_options['social_media_facebook']) : ?>
                    <a href="<?= $site_data_options['social_media_facebook'] ?>"
                        target="_blank">
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
                    <a href="<?= $site_data_options['social_media_twitter'] ?>"
                        class="ml-9" target="_blank">
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
                    <a href="<?= $site_data_options['social_media_youtube'] ?>" class="ml-9" target="_blank">
                        <svg width="27" height="28" viewBox="0 0 27 28" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                            <g id="youtube">
                                <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.0184 5.36798C25.145 5.6714 26.0334 6.55959 26.3366 7.68638C26.9001 9.7445 26.8784 14.0345 26.8784 14.0345C26.8784 14.0345 26.8784 18.3027 26.3368 20.361C26.0334 21.4876 25.1452 22.376 24.0184 22.6792C21.9601 23.221 13.727 23.221 13.727 23.221C13.727 23.221 5.51538 23.221 3.43558 22.6577C2.30879 22.3543 1.4206 21.4659 1.11718 20.3393C0.575562 18.3027 0.575562 14.0129 0.575562 14.0129C0.575562 14.0129 0.575562 9.7445 1.11718 7.68638C1.4204 6.55979 2.33046 5.64973 3.43538 5.34651C5.4937 4.80469 13.7268 4.80469 13.7268 4.80469C13.7268 4.80469 21.9601 4.80469 24.0184 5.36798ZM17.9518 14.0129L11.1053 17.9562V10.0696L17.9518 14.0129Z" />
                            </g>
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if ($site_data_options['social_media_instagram']) : ?>
                    <a href="<?= $site_data_options['social_media_instagram'] ?>"
                        class="ml-9" target="_blank">
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
    </div>

    <!-- Find out more -->
    <div class="flex flex-col items-center justify-center px-10 pt-24 pb-10 text-center md:py-40 find-out-more"
        id="project">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'project_section_logo'); ?>"
            class="w-16 md:w-20 2xl:w-28" alt="icon" />
        <div class="mt-3 text-2xl md:text-3xl 2xl:text-4xl xl:mt-6 title">
            <?= $project->getField('name') ?>
        </div>
        <div
            class="text-base text-center xl:w-[53.5rem] mt-7 xl:mt-5 md:text-lg 2xl:text-2xl tracking-sm-description xl:tracking-description whitespace-pre-line">
            <?= $project->getField('description') ?>
        </div>
        <div class="flex flex-wrap w-full gap-3 md:w-auto mt-7">
            <div class="inline-flex flex-col items-center flex-1 text-center mr-7 xl:mr-10 lg:text-left lg:flex-row ">
                <svg width="43" height="55" viewBox="0 0 43 55" fill="none"
                    class="lg:mr-4 stroke-theme-primary-color fill-theme-primary-color"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M42 50V8C42 5.79086 40.2091 4 38 4H5C2.79086 4 1 5.79086 1 8V50C1 52.2091 2.79086 54 5 54H38C40.2091 54 42 52.2091 42 50Z"
                        fill="white" fill-opacity="0.08" stroke-width="2" />
                    <path
                        d="M31 22.3358V39C31 41.2091 29.2091 43 27 43H16C13.7909 43 12 41.2091 12 39V22.3358C12 21.4254 12.4134 20.5642 13.1238 19.9948L20.2492 14.284C20.9802 13.6982 22.0198 13.6982 22.7508 14.284L29.8762 19.9948C30.5866 20.5642 31 21.4254 31 22.3358Z"
                        fill="white" stroke-width="2" />
                    <circle cx="21.5" cy="23.5" r="2.5" />
                </svg>
                <div class="mt-6 lg:mt-0">
                    <span class="font-medium text-[#4A4A4A] text-xs md:text-sm 2xl:text-base">
                        <?= $project->getField('starting_price_from', ['default_value' => '--']); ?>
                    </span>
                    <br />
                    <span class="text-[9px] xl:text-xs text-[#90A3A6]">Starting From Price</span>
                </div>
            </div>
            <div class="inline-flex flex-col items-center flex-1 text-center mr-7 xl:mr-10 lg:text-left lg:flex-row ">
                <svg width="43" height="55" viewBox="0 0 43 55" fill="none"
                    class="lg:mr-4 stroke-theme-primary-color fill-theme-primary-color"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M42 17.4928V49C42 51.7614 39.7614 54 37 54H6C3.23858 54 1 51.7614 1 49V17.4928C1 15.2605 2.23934 13.2127 4.21703 12.1773L19.1809 4.34295C20.6334 3.58245 22.3666 3.58246 23.8191 4.34295L38.783 12.1773C40.7607 13.2127 42 15.2605 42 17.4928Z"
                        fill="white" fill-opacity="0.08" stroke-width="2" />
                    <path
                        d="M42 50V33.4037C42 32.6187 41.5407 31.9062 40.8256 31.5821L31.7385 27.4634C30.9514 27.1067 30.0486 27.1067 29.2615 27.4634L20.1744 31.5821C19.4593 31.9062 19 32.6187 19 33.4037V52C19 53.1046 19.8954 54 21 54H38C40.2091 54 42 52.2091 42 50Z"
                        fill="white" stroke-width="2" />
                </svg>
                <div class="mt-6 lg:mt-0">
                    <span
                        class="font-medium text-[#4A4A4A] text-xs md:text-sm 2xl:text-base"><?= $project->getField('number_of_units', ['default_value' => '--']) ?>
                    </span>
                    <br />
                    <span class="text-[9px] xl:text-xs text-[#90A3A6]">Total Number of Units</span>
                </div>
            </div>
            <div class="inline-flex flex-col items-center flex-1 text-center mr-7 xl:mr-10 lg:text-left lg:flex-row ">
                <svg width="43" height="55" viewBox="0 0 43 55" fill="none"
                    class="lg:mr-4 stroke-theme-primary-color fill-theme-primary-color "
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M42 50V8C42 5.79086 40.2091 4 38 4H5C2.79086 4 1 5.79086 1 8V50C1 52.2091 2.79086 54 5 54H38C40.2091 54 42 52.2091 42 50Z"
                        fill="white" fill-opacity="0.15" stroke-width="2" />
                    <rect x="14" width="2" height="8" rx="1" />
                    <rect x="27" width="2" height="8" rx="1" />
                    <rect x="20" y="14" width="3" height="3" rx="1" />
                    <rect x="30" y="14" width="3" height="3" rx="1" />
                    <rect x="10" y="14" width="3" height="3" rx="1" />
                    <rect x="20" y="23" width="3" height="3" rx="1" />
                    <rect x="30" y="23" width="3" height="3" rx="1" />
                    <rect x="10" y="23" width="3" height="3" rx="1" />
                    <rect x="20" y="32" width="3" height="3" rx="1" />
                    <rect x="30" y="32" width="3" height="3" rx="1" />
                    <rect x="10" y="32" width="3" height="3" rx="1" />
                    <rect x="20" y="41" width="3" height="3" rx="1" />
                    <rect x="30" y="41" width="3" height="3" rx="1" />
                    <rect x="10" y="41" width="3" height="3" rx="1" />
                </svg>
                <div class="mt-6 lg:mt-0">
                    <span
                        class="font-medium text-[#4A4A4A] text-xs md:text-sm 2xl:text-base"><?= $project->getField('completion_date', ['default_value' => '--']) ?></span>
                    <br />
                    <span class="text-[9px] xl:text-xs text-[#90A3A6]">Completion Date</span>
                </div>
            </div>
            <div class="inline-flex flex-col items-center flex-1 text-center mr-7 xl:mr-10 lg:text-left lg:flex-row ">
                <svg width="43" height="55" viewBox="0 0 43 55"
                    class="lg:mr-4 stroke-theme-primary-color fill-theme-primary-color" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M42 50V8C42 5.79086 40.2091 4 38 4H5C2.79086 4 1 5.79086 1 8V50C1 52.2091 2.79086 54 5 54H38C40.2091 54 42 52.2091 42 50Z"
                        fill="white" fill-opacity="0.15" stroke-width="2" />
                    <rect x="14" width="2" height="8" rx="1" />
                    <rect x="27" width="2" height="8" rx="1" />
                    <path d="M13 28.7429L20 37L31 20" stroke-width="3" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                <div class="mt-6 lg:mt-0">
                    <span
                        class="font-medium capitalize text-[#4A4A4A] text-xs md:text-sm 2xl:text-base"><?= $project->getField('construction_stage', ['default_value' => '--']) ?></span>
                    <br />
                    <span class="text-[9px] xl:text-xs text-[#90A3A6]">Construction Stage</span>
                </div>
            </div>
        </div>
        <div class="mt-7 xl:mt-10 buttons">
            <button class="mr-4 xl:mr-8 btn-bg-theme-color"
                onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['project_section_btn_1_text'] ?>
            </button>
            <button class="border-theme-primary-color text-theme-primary-color btn"
                style="background: rgba(255, 255, 255, 0.25)"
                onClick="document.getElementById('amenities').scrollIntoView();">
                <?= $page_data_options['project_section_btn_2_text'] ?>
            </button>
        </div>
    </div>

    <!-- Amenities -->
    <div class="flex items-center justify-center h-screen text-white !bg-center !bg-no-repeat !bg-cover amenities"
        id="amenities"
        style="background: url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'amenities_section_image'); ?>)">
        <div class="px-10 text-center xl:pt-20 xl:w-[54rem]">
            <div class="mb-2 text-2xl xl:mb-5 md:text-3xl 2xl:text-4xl title">Amenities</div>
            <div class="text-base md:text-lg 2xl:text-xl tracking-sm-description xl:tracking-description description whitespace-pre-line">
                <?= $project->getField('amenities_description') ?>
            </div>
            <div class="mt-4 xl:mt-9">
                <button class="mr-4 bg-white border-transparent xl:mr-8 text-theme-primary-color btn"
                    onClick="document.getElementById('contact-us').scrollIntoView();">
                    <?= $page_data_options['amenities_section_btn_1_text'] ?>
                </button>
                <button class="text-white border-white btn" style="background: rgba(0, 0, 0, 0.3)"
                    onClick="document.getElementById('location').scrollIntoView();">
                    <?= $page_data_options['amenities_section_btn_2_text'] ?>
                </button>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="box-border flex flex-col items-center justify-center py-20 lg:py-36 location" id="location">
        <div class="box-border px-10 text-center">
            <div class="mb-2 text-2xl xl:mb-5 md:text-3xl 2xl:text-4xl title">Location</div>
            <div
                class="text-base xl:w-[54rem] md:text-lg 2xl:text-xl tracking-sm-description xl:tracking-description description whitespace-pre-line">
                <?= $project->getField('location_description') ?>
            </div>
            <div class="mt-4 xl:mt-9 flex gap-5 flex-wrap justify-center">
                <button class="btn btn-primary" onClick="document.getElementById('contact-us').scrollIntoView();">
                    <?= $page_data_options['location_section_btn_1_text'] ?>
                </button>
                <button class="btn btn-secondary" onClick="document.getElementById('gallery').scrollIntoView();">
                    <?= $page_data_options['location_section_btn_2_text'] ?>
                </button>
                <?php $brochure_file = $project->getField('brochure', ['single' => true]); ?>
                <?php if (!empty($brochure_file)) { ?>
                    <a href="/project/media/brochure/<?= $project->get('id') ?>" class="inline-flex btn btn-primary no-underline group relative !pr-[35px]">
                        <?= $page_data_options['location_section_brochure_text'] ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="absolute top-1/2 right-[10px] -translate-y-1/2 h-[20px] group-hover:cursor-pointer fill-theme-secondary-color group-hover:fill-theme-primary-color group-focus:fill-theme-primary-color transition-all duration-100"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="box-border w-full mt-12 2xl:px-64 xl:mt-20 xl:px-52 map">
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

        <div
            class="box-border grid w-full grid-cols-2 gap-10 px-10 mt-10 text-sm 2xl:text-base xl:flex xl:justify-center xl:mt-16 nearby">
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill=none
                    class="stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path
                        d="M37.2937 18.7063C36.3382 17.7508 34.7842 17.7668 33.8485 18.7418L28.7272 24.0785L16.229 19.9424L13.6055 22.5661L24.0231 28.9803L18.7517 34.4733L15.3713 33.9183L13 36.2896L17.9697 38.0303L19.7104 43L22.0818 40.6287L21.5268 37.2483L27.0196 31.977L33.4339 42.3946L36.0575 39.7709L31.9215 27.2728L37.2582 22.1515C38.2332 21.2159 38.2492 19.6618 37.2937 18.7063Z" />
                </svg>
                <div class="ml-3">
                    <span class="font-medium text-black ">Airport</span>
                    <br />
                    <?= $project->getField('distance_from_airport_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill="none"
                    class="stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path
                        d="M25.794 33.4062L28.098 32.4382L32.3682 43.0341L30.069 44L25.794 33.4062ZM33.3919 28.8322L38 26.8963C35.38 20.3993 28.1063 17.2904 21.7469 19.9526C26.8323 20.3454 31.3158 23.684 33.3919 28.8322ZM21.6985 19.9729C15.3456 22.6514 12.3237 30.0857 14.9437 36.5826L19.5518 34.6466C17.4756 29.4984 18.3574 23.9058 21.6985 19.9729ZM21.7307 19.9593L21.7146 19.9661C19.8558 23.2764 19.7844 28.5189 21.8558 33.6786L31.0879 29.8001C29.0119 24.6519 25.334 20.9749 21.7307 19.9593Z" />
                </svg>

                <div class="ml-3">
                    <span class="font-medium text-black">Beach</span>
                    <br />
                    <?= $project->getField('distance_from_beach_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill="none"
                    class=" stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path
                        d="M34.4545 17L28.7727 22.6097V34.9513L34.4545 29.9024V17ZM14 22.6097V39.0463C14 39.3268 14.2841 39.6073 14.5682 39.6073C14.6818 39.6073 14.7386 39.5512 14.8523 39.5512C16.3863 38.8219 18.6023 38.3171 20.25 38.3171C22.4658 38.3171 24.8522 38.7659 26.5 40V22.6097C24.8522 21.3756 22.4658 20.9269 20.25 20.9269C18.0341 20.9269 15.6477 21.3756 14 22.6097ZM39 37.7561V22.6097C38.3181 22.1048 37.5795 21.7683 36.7273 21.4878V36.6341C35.4773 36.2414 34.1136 36.0732 32.75 36.0732C30.8181 36.0732 28.0341 36.8025 26.5 37.7561V40C28.0341 39.0463 30.8181 38.3171 32.75 38.3171C34.625 38.3171 36.5568 38.6537 38.1477 39.4951C38.2614 39.5512 38.3181 39.5512 38.4318 39.5512C38.7159 39.5512 39 39.2707 39 38.9903V37.7561Z" />
                </svg>

                <div class="ml-3">
                    <span class="font-medium text-black">School</span>
                    <br />
                    <?= $project->getField('distance_from_school_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill="none"
                    class="stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path
                        d="M20.6 37.6C19.39 37.6 18.411 38.59 18.411 39.8C18.411 41.01 19.39 42 20.6 42C21.81 42 22.8 41.01 22.8 39.8C22.8 38.59 21.81 37.6 20.6 37.6ZM14 20V22.2H16.2L20.16 30.549L18.675 33.244C18.499 33.552 18.4 33.915 18.4 34.3C18.4 35.51 19.39 36.5 20.6 36.5H33.8V34.3H21.062C20.908 34.3 20.787 34.179 20.787 34.025L20.82 33.893L21.81 32.1H30.005C30.83 32.1 31.556 31.649 31.93 30.967L35.868 23.828C35.956 23.674 36 23.487 36 23.3C36 22.695 35.505 22.2 34.9 22.2H18.631L17.597 20H14ZM31.6 37.6C30.39 37.6 29.411 38.59 29.411 39.8C29.411 41.01 30.39 42 31.6 42C32.81 42 33.8 41.01 33.8 39.8C33.8 38.59 32.81 37.6 31.6 37.6Z" />
                </svg>
                <div class="ml-3">
                    <span class="font-medium text-black">Shops</span>
                    <br />
                    <?= $project->getField('distance_from_shops_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill="none"
                    class=" stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 19H27V28H36V33H27V42H22V33H13V28H22V19Z" />
                </svg>

                <div class="ml-3">
                    <span class="font-medium text-black">Hospital</span>
                    <br />
                    <?= $project->getField('distance_from_hospital_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
            <div class="box-border flex items-center">
                <svg width="51" height="62" viewBox="0 0 51 62" fill="none"
                    class="stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 57V5C50 2.79086 48.2091 1 46 1H5C2.79086 1 1 2.79086 1 5V57C1 59.2091 2.79086 61 5 61H46C48.2091 61 50 59.2091 50 57Z"
                        fill="white" stroke-width="2" />
                    <path
                        d="M15.8938 32.0506V35.7548C15.8938 36.7172 16.4295 37.6136 17.2866 38.0749L23.9828 41.6737C24.7863 42.1088 25.7506 42.1088 26.5541 41.6737L33.2503 38.0749C34.1074 37.6136 34.6431 36.7172 34.6431 35.7548V32.0506L26.5541 36.4008C25.7506 36.8358 24.7863 36.8358 23.9828 36.4008L15.8938 32.0506ZM23.9828 19.3164L12.6931 25.3803C11.769 25.8812 11.769 27.1995 12.6931 27.7004L23.9828 33.7643C24.7863 34.1993 25.7506 34.1993 26.5541 33.7643L37.3215 27.9772V35.768C37.3215 36.4931 37.9242 37.0863 38.6608 37.0863C39.3973 37.0863 40 36.4931 40 35.768V27.3181C40 26.8303 39.7322 26.3953 39.3036 26.158L26.5541 19.3164C25.7506 18.8945 24.7863 18.8945 23.9828 19.3164V19.3164Z" />
                </svg>
                <div class="ml-3">
                    <span class="font-medium text-black">University</span>
                    <br />
                    <?= $project->getField('distance_from_university_amount', ['default_value' => '--', 'class_value' => 'font-bold text-[#687F82]', 'class_symbol' => 'ml-1 font-light text-[#687F82]']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full h-screen" id="gallery">
        <?= $this->element('gallery/template-1', ['obj' => $project, 'media_names' => ['featured_photo', 'photos',],]); ?>
    </div>

    <!-- Properties -->
    <div class="flex flex-col items-center justify-center pt-24 text-center md:pt-36 xl:py-36 properties"
        id="properties">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'project_section_logo'); ?>"
            class="w-16 md:w-20 2xl:w-28" alt="icon" />
        <div class="mt-4 mb-2 text-2xl md:text-3xl 2xl:text-4xl xl:mt-6 xl:mb-5 title">Properties</div>
        <div
            class="px-10 text-base md:text-lg 2xl:text-xl xl:px-0 xl:w-[60rem] tracking-sm-description xl:tracking-description description">
            <?= $page_data_options['properties_section_description'] ?>
        </div>
        <div class="mt-4 xl:mt-8 buttons">
            <button class="mr-4 xl:mr-8 btn-bg-theme-color"
                onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['properties_section_btn_1_text'] ?>
            </button>
            <button class="bg-white border-theme-primary-color text-theme-primary-color btn"
                style="background: rgba(255, 255, 255, 0.25)"
                onClick="document.getElementById('about-us').scrollIntoView();">
                <?= $page_data_options['properties_section_btn_2_text'] ?>
            </button>
        </div>
        <div class="box-border w-full mt-9 xl:mt-20 xl:px-40">
            <div
                class="xl:relative xl:before:content-[''] xl:before:inline-block xl:before:absolute xl:before:h-full xl:before:-left-2 xl:before:top-0 xl:before:w-12 xl:before:bg-gradient-to-r xl:before:from-white after:content-[''] xl:after:inline-block xl:after:absolute xl:after:h-full xl:after:right-0 xl:after:top-0 xl:after:w-12 xl:after:bg-gradient-to-l xl:after:from-white">
                <table class="box-border w-full p-2 text-black border-collapse property-listing-table">
                    <thead
                        class="text-xs md:text-sm 2xl:text-base border-r-0 border-l-0 border-b border-solid border-t border-[#dddddd] h-16 capitalize">
                        <tr class="bg-[#f6f8f8]">
                            <th class="pl-4 align-middle xl:px-5 md:font-medium">Unit</th>
                            <th class="md:font-medium"><span class="hidden md:inline-block">Property&nbsp;</span>Type</th>
                            <th class="md:font-medium">Beds</th>
                            <th class="hidden md:table-cell md:font-medium">Baths</th>
                            <th class="md:font-medium">Internal Area</th>
                            <th class="hidden md:table-cell md:font-medium">Covered Area</th>
                            <th class="pr-4 xl:px-5 md:font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="xl:[&>*:nth-child(odd)]:bg-[#fcfcfc] xl:[&>*:nth-child(even)]:bg-[#f6f8f8]"
                        id="table-body">
                        <?php foreach ($project_properties['data'] as $property) : ?>
                        <tr
                            class="font-light text-center text-xs md:text-sm 2xl:text-base border-b border-solid border-r-0 border-t-0 border-l-0 border-[#dddddd] h-16 capitalize">
                            <td class="pl-4 xl:px-5">
                                <?= $property->getField('unit_number') ?>
                            </td>
                            <td>
                                <a href='<?= $property->getUrl() ?>' class="text-black no-underline">
                                    <?= $property->getField('property_type') ?>
                                </a>
                            </td>
                            <td>
                                <?= $property->getField('bedrooms') ?>
                            </td>
                            <td class="pr-4 xl:px-5 hidden md:table-cell">
                                <?= $property->getField('bathrooms') ?>
                            </td>
                            <td>
                                <?= $property->getField('internal_area_amount') ?>
                            </td>
                            <td class="hidden md:table-cell">
                                <?= $property->getField('covered_area_amount') ?>
                            </td>
                            <td>
                                <?= $property->getField('status') ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->element('youtube/iframe', ['id' => $project->getYoutubeLink(['single' => true])]); ?>

    <!-- About Us -->
    <div class="flex flex-col justify-center h-screen text-white !bg-center !bg-no-repeat !bg-cover about-us"
        id="about-us"
        style="background: url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_section_image'); ?>)">
        <div class="px-10 pt-12 text-center xl:pt-20 xl:text-left xl:pl-40 content">
            <div class="mb-2 text-2xl md:text-3xl 2xl:text-4xl xl:mb-6 title">About Us</div>
            <div
                class="text-base md:text-lg 2xl:text-xl xl:w-[48rem] tracking-sm-description xl:tracking-description description">
                <?= $page_data_options['about_us_section_description'] ?>
            </div>
            <button class="mt-4 bg-white border-transparent xl:mt-9 text-theme-primary-color btn"
                style="box-shadow: 2px 4px 13px 0px rgba(0, 0, 0, 0.25)"
                onClick="document.getElementById('contact-us').scrollIntoView();">
                <?= $page_data_options['about_us_section_btn_1_text'] ?>
            </button>
        </div>
    </div>

    <!-- Contact Us -->
    <div class="contact-us" id="contact-us" style="
            background: radial-gradient(
                49.06% 59.11% at 66.25% 10.3%,
                #2a3536 0%,
                #1b2425 100%
            );
        ">
        <div class="box-border flex flex-col items-center xl:py-36 xl:flex-row xl:px-36 2xl:px-44 content">
            <div
                class="box-border flex flex-col items-center w-full xl:w-[44rem] px-5 xl:px-10 bg-white pt-24 pb-20 md:pt-32 xl:block xl:mr-20 xl:p-12 2xl:p-20 xl:rounded-2xl 2xl:w-1/2 2xl:mr-28 contact-form">
                <svg width="61" height="82" viewBox="0 0 61 82" fill="none"
                    class="h-20 w-14 stroke-theme-primary-color fill-theme-primary-color"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="Group 490">
                        <path id="Rectangle 461"
                            d="M7 6C4.23857 6 2 8.23858 2 11V75C2 77.7614 4.23858 80 7 80H54C56.7614 80 59 77.7614 59 75V11C59 8.23858 56.7614 6 54 6H7Z"
                            fill="white" fill-opacity="0.15" stroke-width="4" />
                        <rect id="Rectangle 462" x="19" width="4" height="12" rx="2" />
                        <rect id="Rectangle 463" x="38" width="4" height="12" rx="2" />
                        <g id="Group 489">
                            <rect id="Rectangle 547" x="28" y="22" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 548" x="41" y="22" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 550" x="15" y="22" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 551" x="28" y="35" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 552" x="41" y="35" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 554" x="15" y="35" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 555" x="28" y="48" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 556" x="41" y="48" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 558" x="15" y="48" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 559" x="28" y="61" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 560" x="41" y="61" width="5" height="5" rx="2.5" />
                            <rect id="Rectangle 561" x="15" y="61" width="5" height="5" rx="2.5" />
                        </g>
                    </g>
                </svg>

                <div class="mt-4 xl:mt-8 text-2xl 2xl:text-3xl text-[#1C2526] form-title">
                    <?= $page_data_options['contact_us_section_lead_title'] ?>
                </div>
                <div
                    class="text-xl text-theme-primary-color xl:text-[#7B8F92] mt-2 font-light text-[#7B8F92] form-subtitle text-center">
                    <?= $page_data_options['contact_us_section_lead_sub_title'] ?>
                </div>
                <form id="enquiry-form" action="" class="grid w-full gap-4 mt-4 xl:mt-8" integration-recaptcha=true
                    data-action="lead_form">
                    <div class='hidden'>
                        <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Homepage - Contact Us']); ?>
                        <?= \App\Utils\Leads::loadProjectRequiredFields($project); ?>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <input class="input-field" type="text" id="first_name" name="first_name"
                                placeholder="First Name" />
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="form-group">
                            <input class="input-field" type="text" id="last_name" name="last_name"
                                placeholder="Last Name" />
                            <div class="form-group__helper"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <input class="input-field" type="text" id="email" name="email" placeholder="Email" />
                            <div class="form-group__helper"></div>
                        </div>
                        <div class="form-group">
                            <input class="input-field required-field" type="text" id="phone" name="phone" placeholder="Phone" />
                            <div class="form-group__helper"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea type="text"
                            class="w-full box-border text-base placeholder-gray-500 xl:border-none border-solid border border-[#EBEBEB] resize-none text-[#687F82] h-32 bg-[#F0F4F4] rounded-3xl px-4 pt-4 focus:outline-none focus:border-none required-field"
                            placeholder="Say Something..." id="message" name="message"></textarea>
                        <div class="form-group__helper"></div>
                    </div>
                </form>
                <button class="mt-4 xl:mt-5 btn-bg-theme-color" type="submit" id="enquiry-btn"
                    onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                    <?= $page_data_options['contact_us_section_lead_btn_text'] ?>
                </button>
                <div class="generic-helper"></div>
            </div>
            <div class="box-border px-10 py-10 text-white xl:py-0 xl:w-[40rem] 2xl:w-1/2 xl:px-0 info">
                <div class="text-2xl 2xl:text-3xl title">
                    <?= $page_data_options['contact_us_section_title'] ?>
                </div>
                <div class="mt-2 text-lg font-light 2xl:text-xl subtitle">
                    <?= $page_data_options['contact_us_section_sub_title'] ?>
                </div>
                <div
                    class="text-base font-light mt-7 xl:mt-5 tracking-sm-description xl:tracking-description description">
                    <?= $page_data_options['contact_us_section_description'] ?>
                </div>
                <div class="mt-8 text-[15px] font-light location">
                    <?= $site_data->get('address') ?>
                </div>
                <div class="mt-6 text-[15px] font-light telephone">
                    <?= $site_data->get('phone') ? 'Tel: ' . $site_data->get('phone') : '' ?>
                </div>
                <div class="mt-6 text-[15px] font-light email">
                    <?= $site_data->get('email') ? 'Email: ' . $site_data->get('email') : '' ?>
                </div>
                <div class="flex items-end mt-9 socialMediaIcons">
                    <?php if ($site_data_options['social_media_facebook']) : ?>
                    <a href="<?= $site_data_options['social_media_facebook'] ?>"
                        target="_blank">
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
                    <a href="<?= $site_data_options['social_media_twitter'] ?>"
                        class="ml-6" target="_blank">
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
                        <svg width="27" height="28" viewBox="0 0 27 28" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                            <g id="youtube">
                                <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.0184 5.36798C25.145 5.6714 26.0334 6.55959 26.3366 7.68638C26.9001 9.7445 26.8784 14.0345 26.8784 14.0345C26.8784 14.0345 26.8784 18.3027 26.3368 20.361C26.0334 21.4876 25.1452 22.376 24.0184 22.6792C21.9601 23.221 13.727 23.221 13.727 23.221C13.727 23.221 5.51538 23.221 3.43558 22.6577C2.30879 22.3543 1.4206 21.4659 1.11718 20.3393C0.575562 18.3027 0.575562 14.0129 0.575562 14.0129C0.575562 14.0129 0.575562 9.7445 1.11718 7.68638C1.4204 6.55979 2.33046 5.64973 3.43538 5.34651C5.4937 4.80469 13.7268 4.80469 13.7268 4.80469C13.7268 4.80469 21.9601 4.80469 24.0184 5.36798ZM17.9518 14.0129L11.1053 17.9562V10.0696L17.9518 14.0129Z" />
                            </g>
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if ($site_data_options['social_media_instagram']) : ?>
                    <a href="<?= $site_data_options['social_media_instagram'] ?>"
                        class="ml-6" target="_blank">
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
                <form class="flex-col hidden mt-10 xl:flex newsletter" action="" integration-recaptcha=true
                    data-action="newsletter">
                    <div
                        class="relative text-sm lg:w-80 rounded-full bg-white/[.15] flex px-1 items-center subscribe-section">
                        <input placeholder="Email Address" name="email"
                            class="flex-1 h-10 pl-4 text-white placeholder-white bg-transparent border-none outline-none" />
                        <button type="submit"
                            class="btn !tracking-[0.24px] !border-none !py-2 my-1 !text-xs text-white border-transparent bg-theme-primary-color subscribe-me flex items-center gap-1">
                            Subscribe
                        </button>
                    </div>
                    <div class="max-w-3xl mt-4 text-xs text-white">
                        <span class="text-white">Sign up </span><span class="opacity-40">for updates on the hottest
                            offers & receive
                            favoured rates at any of the projects stores,
                            for</span>
                        <span class="underline decoration-theme-primary-color decoration-2">FREE!</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include __DIR__ . '/parts/footer.php'; ?>
</div>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<script defer src="/js/newsletter.js"></script>
<?= $this->render('/Preview/general/footer'); ?>