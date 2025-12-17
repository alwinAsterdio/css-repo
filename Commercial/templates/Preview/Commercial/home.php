<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Commercial/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>

<?php include __DIR__ . '/header/header.php' ?>
<div class="box-border home-page">
    <div>
        <div class="relative box-border flex items-center justify-start h-[calc(100vh_-_57px)] xl:h-[87vh] 2xl:h-[92vh] !bg-center !bg-no-repeat !bg-cover" style="background: radial-gradient(136.05% 98.72% at 54.48% 50%,rgba(0, 0, 0, 0) 0%,rgba(0, 0, 0, 0.39) 100%),url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'primary_bg_image'); ?>);">
            <div class="text-white box-border px-10 lg:px-16 xl:pr-0 2xl:pl-32 xl:max-w-xl 2xl:max-w-2xl content">
                <div class="text-xl xl:text-3xl 2xl:text-5xl font-bold">
                    <?= $page_data['page_title'] ?>
                </div>
                <div class="mt-7 text-base xl:text-lg 2xl:text-2xl">
                    <?= $page_data_options['primary_description'] ?>
                </div>
                <div class="flex items-center mt-11">
                    <button class="btn btn-lg btn-bg-theme mr-7">
                        <?= $page_data_options['primary_btn_1_text'] ?>
                    </button>
                    <a href="/#services" class="bg-transparent text-sm xl:text-xl 2xl:text-2xl text-white underline underline-offset-4 decoration-2 decoration-theme-primary-color">
                        <?= $page_data_options['primary_btn_2_text'] ?>
                    </a>
                </div>
            </div>
            <div class="absolute box-border w-full bottom-5 px-10 items-center justify-between hidden xl:flex socialMediaIcons">
                <div class="flex items-center">
                    <?php $whatsapp = $site_data_options['whatsapp'] ?? ''; ?>
                    <a href="<?= !empty($whatsapp) ? 'https://wa.me/' . $whatsapp : '' ?>" target="_blank" class="no-underline text-black flex items-center border-solid border-0 border-r-2 border-white/60 mr-4 pr-4">
                        <svg viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[20px] h-[20px] xl:w-[30px] xl:h-[30px]">
                            <path d="M1.41162 28.7532L3.01503 22.7241L3.11925 22.3322L2.9211 21.9785C1.73993 19.8695 1.11842 17.4749 1.12128 15.0364L1.12128 15.0356C1.1244 7.36329 7.18096 1.17052 14.5602 1.17023L1.41162 28.7532ZM1.41162 28.7532L7.3937 27.1377L7.78796 27.0312L8.14405 27.2311C10.1043 28.3319 12.3102 28.9117 14.5543 28.9127C14.5544 28.9127 14.5545 28.9127 14.5547 28.9127H14.5605C21.9388 28.9127 27.9967 22.7187 28 15.0467C28.0013 11.3303 26.5994 7.84658 24.0571 5.22646C21.516 2.60755 18.1483 1.17224 14.5607 1.17023L1.41162 28.7532Z" fill="#45C755" stroke="#45C755" stroke-width="2" />
                            <path d="M20.6591 17.5407L18.8411 15.7265C18.1918 15.0786 17.088 15.3378 16.8283 16.18C16.6335 16.7632 15.9842 17.0872 15.3999 16.9575C14.1013 16.6336 12.3482 14.949 12.0236 13.5883C11.8288 13.0052 12.2184 12.3573 12.8027 12.1629C13.6468 11.9037 13.9065 10.8023 13.2572 10.1543L11.4392 8.34016C10.9198 7.88661 10.1406 7.88661 9.68614 8.34016L8.45249 9.57122C7.21885 10.8671 8.58235 14.3011 11.634 17.3463C14.6857 20.3915 18.1269 21.817 19.4255 20.5211L20.6591 19.2901C21.1136 18.7717 21.1136 17.9942 20.6591 17.5407Z" fill="white" />
                        </svg>
                    </a>
                    <?php if ($site_data_options['social_media_facebook']) : ?>
                        <a href="<?= $site_data_options['social_media_facebook'] ?>" target="_blank">
                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                                <g id="facebook-app-symbol">
                                    <g id="Group">
                                        <path id="f 1" d="M15.1885 25.4545V13.8444H19.2138L19.8177 9.31833H15.1885V6.42913C15.1885 5.11915 15.5628 4.22642 17.5061 4.22642L19.9807 4.22543V0.177201C19.5527 0.123385 18.0838 0 16.3741 0C12.804 0 10.3598 2.10886 10.3598 5.98088V9.31833H6.32231V13.8444H10.3598V25.4545H15.1885Z" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($site_data_options['social_media_twitter']) : ?>
                        <a href="<?= $site_data_options['social_media_twitter'] ?>" class="ml-6" target="_blank">
                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                                <g id="twitter">
                                    <g id="Group">
                                        <g id="Group_2">
                                            <path id="Vector" d="M25.9695 5.6931C25.023 6.12217 24.0143 6.40657 22.9627 6.54466C24.0445 5.87722 24.8702 4.82839 25.2584 3.56421C24.2498 4.18561 23.1361 4.62454 21.9493 4.86949C20.9916 3.81573 19.6266 3.16309 18.1375 3.16309C15.2484 3.16309 12.9225 5.58625 12.9225 8.55684C12.9225 8.98426 12.9575 9.39525 13.0434 9.7865C8.70503 9.56786 4.86617 7.41924 2.28731 4.14616C1.83709 4.95333 1.573 5.87722 1.573 6.8718C1.573 8.73932 2.50368 10.3948 3.89095 11.3532C3.05254 11.3367 2.23004 11.0852 1.53323 10.689C1.53323 10.7055 1.53323 10.7268 1.53323 10.7482C1.53323 13.3686 3.34209 15.5452 5.71413 16.0466C5.28935 16.1666 4.8264 16.2242 4.34595 16.2242C4.01186 16.2242 3.67458 16.2044 3.35799 16.1321C4.03413 18.2676 5.95276 19.8375 8.23412 19.8885C6.45867 21.3236 4.20436 22.1884 1.76391 22.1884C1.33595 22.1884 0.925499 22.1686 0.515045 22.1144C2.82663 23.6547 5.56617 24.5343 8.52049 24.5343C18.1232 24.5343 23.3732 16.3146 23.3732 9.18975C23.3732 8.95138 23.3652 8.72123 23.3541 8.49273C24.3898 7.73323 25.26 6.78468 25.9695 5.6931Z" />
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
                                    <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M24.0184 5.36798C25.145 5.6714 26.0334 6.55959 26.3366 7.68638C26.9001 9.7445 26.8784 14.0345 26.8784 14.0345C26.8784 14.0345 26.8784 18.3027 26.3368 20.361C26.0334 21.4876 25.1452 22.376 24.0184 22.6792C21.9601 23.221 13.727 23.221 13.727 23.221C13.727 23.221 5.51538 23.221 3.43558 22.6577C2.30879 22.3543 1.4206 21.4659 1.11718 20.3393C0.575562 18.3027 0.575562 14.0129 0.575562 14.0129C0.575562 14.0129 0.575562 9.7445 1.11718 7.68638C1.4204 6.55979 2.33046 5.64973 3.43538 5.34651C5.4937 4.80469 13.7268 4.80469 13.7268 4.80469C13.7268 4.80469 21.9601 4.80469 24.0184 5.36798ZM17.9518 14.0129L11.1053 17.9562V10.0696L17.9518 14.0129Z" />
                                </g>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($site_data_options['social_media_instagram']) : ?>
                        <a href="<?= $site_data_options['social_media_instagram'] ?>" class="ml-6" target="_blank">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" class="stroke-theme-secondary-color fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                                <g id="instagram">
                                    <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M23.1733 7.52714C23.1175 6.2627 22.9238 5.3992 22.6407 4.64373C22.3532 3.8511 21.9022 3.13314 21.3195 2.53971C20.7475 1.9354 20.055 1.46758 19.2906 1.16924C18.562 0.875784 17.7295 0.675134 16.5102 0.617676C15.2887 0.559674 14.8984 0.545898 11.7876 0.545898C8.67682 0.545898 8.28653 0.559674 7.06498 0.617313C5.8457 0.675134 5.01321 0.875965 4.28454 1.1696C3.52022 1.46776 2.82791 1.9354 2.25567 2.53971C1.67295 3.13296 1.22184 3.85091 0.934145 4.64355C0.651172 5.3992 0.457689 6.2627 0.402283 7.52696C0.346352 8.79394 0.333069 9.1985 0.333069 12.4245C0.333069 15.6507 0.346352 16.0554 0.402283 17.3222C0.457863 18.5865 0.651522 19.45 0.934669 20.2056C1.22219 20.9981 1.67312 21.7162 2.25585 22.3094C2.82791 22.9138 3.5204 23.3814 4.28472 23.6796C5.01321 23.9734 5.84587 24.174 7.06515 24.2318C8.28688 24.2897 8.677 24.3033 11.7878 24.3033C14.8985 24.3033 15.2888 24.2897 16.5104 24.2318C17.7297 24.174 18.5622 23.9734 19.2908 23.6796C20.8294 23.0626 22.0457 21.8012 22.6407 20.2056C22.924 19.45 23.1175 18.5865 23.1733 17.3222C23.2288 16.0552 23.2421 15.6507 23.2421 12.4247C23.2421 9.1985 23.2288 8.79394 23.1733 7.52714ZM11.7875 6.32468C8.53898 6.32468 5.90554 9.05584 5.90554 12.4247C5.90554 15.7935 8.53898 18.5245 11.7875 18.5245C15.0362 18.5245 17.6696 15.7935 17.6696 12.4247C17.6696 9.05584 15.0362 6.32468 11.7875 6.32468ZM11.7875 16.3842C9.67891 16.384 7.96937 14.6113 7.96954 12.4245C7.96954 10.2378 9.67891 8.46495 11.7877 8.46495C13.8964 8.46513 15.6058 10.2378 15.6058 12.4245C15.6058 14.6113 13.8962 16.3842 11.7875 16.3842ZM17.902 7.5092C18.6611 7.5092 19.2765 6.871 19.2765 6.08381C19.2765 5.29644 18.6611 4.65823 17.902 4.65823C17.1427 4.65823 16.5273 5.29644 16.5273 6.08381C16.5273 6.871 17.1427 7.5092 17.902 7.5092Z" />
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
                <?php $bottom_logo = \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'primary_bottom_logo', false); ?>
                <?php if (!empty($bottom_logo)) { ?>
                    <img src="<?= $bottom_logo ?>" alt="company-logo" class="object-contain object-right h-12 w-44 xl:w-56 xl:h-20">
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="flex flex-col xl:flex-row services-section section-h-full" id="services">
        <div class="py-5 px-10 lg:px-16 2xl:px-32 xl:w-[50vw] flex justify-center flex-col">
            <div class="services-tabs">
                <span data-target="personal" class="services-tabs__item services-tabs__item--active">
                    <?= $page_data_options['services_tab_1_text'] ?>
                </span>
                <span data-target="commercial" class="services-tabs__item">
                    <?= $page_data_options['services_tab_2_text'] ?>
                </span>
            </div>
            <div class="mt-8 content-item content-item--visible" id="content-personal">
                <div class="text-xl xl:text-3xl 2xl:text-5xl font-bold title">
                    <?= $page_data_options['services_tab_1_title'] ?>
                </div>
                <div class="mt-6 text-base xl:text-lg 2xl:text-2xl description">
                    <?= $page_data_options['services_tab_1_desc'] ?>
                </div>
                <a href="/#contact-us" class="mt-9 btn btn-lg btn-bg-theme"><?= $page_data_options['services_tab_1_btn'] ?></a>
            </div>
            <div class="mt-8 content-item" id="content-commercial">
                <div class="text-xl xl:text-3xl 2xl:text-5xl font-bold title">
                    <?= $page_data_options['services_tab_2_title'] ?>
                </div>
                <div class="mt-6 text-base xl:text-lg 2xl:text-2xl description">
                    <?= $page_data_options['services_tab_2_desc'] ?>
                </div>
                <a href="/#contact-us" class="mt-9 btn btn-lg btn-bg-theme"><?= $page_data_options['services_tab_2_btn'] ?></a>
            </div>
        </div>
        <div id="listing-personal" class="listing-item listing-item--visible py-5 mt-10 xl:mt-0 px-14 lg:px-16 2xl:px-32 xl:w-[50vw] xl:border-0 xl:border-l xl:border-solid xl:border-gray-200 xl:shadow-[-20px_0px_20px_-25px_#d9d9d9]">
            <?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'product_personal', 1, 50); ?>
            <?php if ($data['pagination']['count'] > 0) : ?>
                <div class="relative flex items-center justify-center h-full mb-8">
                    <?php
                    $html_items_list = [];
                    foreach ($data['items'] as $item) {
                        ob_start();
                            include __DIR__ . '/parts/product-loop.php';
                        $html_items_list[] = ob_get_clean();
                    }
                    ?>
                    <?php $html_chunks = array_chunk($html_items_list, 2); ?>
                    <div class="glide glide-personal">
                        <div class="glide__track pb-5" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php foreach ($html_chunks as $chunk) : ?>
                                    <li class="glide__slide flex flex-col gap-10">
                                        <?php foreach ($chunk as $item) : ?>
                                            <?= $item ?>
                                        <?php endforeach; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <div class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</div>
                            <div class="glide__arrow glide__arrow--right" data-glide-dir=">">›</div>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <?php foreach ($html_chunks as $k => $chunk) : ?>
                                <div class="glide__bullet" data-glide-dir="=<?= $k ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full h-full"><?= $site_data_options['no_results_label']; ?></div>
            <?php endif ?>
        </div>
        <div id="listing-commercial" class="listing-item py-5 mt-10 xl:mt-0 px-14 lg:px-16 2xl:px-32 xl:w-[50vw] xl:border-0 xl:border-l xl:border-solid xl:border-gray-200 xl:shadow-[-20px_0px_20px_-25px_#d9d9d9]">
            <?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'product_commercial', 1, 50); ?>
            <?php if ($data['pagination']['count'] > 0) : ?>
                <div class="relative flex items-center justify-center h-full mb-8">
                    <?php
                    $html_items_list = [];
                    foreach ($data['items'] as $item) {
                        ob_start();
                            include __DIR__ . '/parts/product-loop.php';
                        $html_items_list[] = ob_get_clean();
                    }
                    ?>
                    <?php $html_chunks = array_chunk($html_items_list, 2); ?>
                    <div class="glide glide-commercial">
                        <div class="glide__track pb-5" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php foreach ($html_chunks as $chunk) : ?>
                                    <li class="glide__slide flex flex-col gap-10">
                                        <?php foreach ($chunk as $item) : ?>
                                            <?= $item ?>
                                        <?php endforeach; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <div class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</div>
                            <div class="glide__arrow glide__arrow--right" data-glide-dir=">">›</div>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <?php foreach ($html_chunks as $k => $chunk) : ?>
                                <div class="glide__bullet" data-glide-dir="=<?= $k ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full h-full"><?= $site_data_options['no_results_label']; ?></div>
            <?php endif ?>
        </div>
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function(event) {
            const product_tabs = document.querySelectorAll('.services-tabs__item')
            product_tabs.forEach(elem => {
                elem.addEventListener('click', function() {
                    let active_tab = document.querySelectorAll('.services-tabs__item--active');
                    active_tab.forEach(active_elem => {
                        let active_target = active_elem.getAttribute('data-target')
                        let active_content_div = document.getElementById('content-' + active_target)
                        let active_listing_div = document.getElementById('listing-' + active_target)
                        active_elem.classList.remove('services-tabs__item--active')
                        active_content_div.classList.remove('content-item--visible')
                        active_listing_div.classList.remove('listing-item--visible')
                    })

                    let new_target = this.getAttribute('data-target')
                    let content_div = document.getElementById('content-' + new_target)
                    let listing_div = document.getElementById('listing-' + new_target)
                    this.classList.add('services-tabs__item--active')
                    content_div.classList.add('content-item--visible')
                    listing_div.classList.add('listing-item--visible')

                    let glide_element = document.querySelector('.glide-' + new_target)
                    if ( glide_element !== null && !glide_element.classList.contains('glide--loaded')) {
                        new Glide('.glide-' + new_target, {
                            type: 'slider',
                            startAt: 0,
                            perView: 2,
                            gap: 10,
                            breakpoints: {
                                425: {
                                    perView: 1
                                }
                            }
                        }).mount()
                        glide_element.classList.add('glide--loaded')
                    }
                })
            })
        })

        document.addEventListener('DOMContentLoaded', function(event) {
            let tab_item = document.querySelectorAll('.services-tabs__item')
            tab_item[0].dispatchEvent(new Event('click'));
        })
    </script>
    <!-- Offers Section -->
    <div class="section-h-full flex relative" id="offers">
        <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'offers_image') ?>" alt="slider-img" class="w-full h-full object-cover absolute top-0 left-0 z-0">
        <div class="md:w-[50vw]">
            <div class="text-white relative z-10 inline-flex flex-col justify-center h-full px-10 xl:px-20">
                <div class="text-xl xl:text-3xl 2xl:text-5xl font-bold title">
                    <?= $page_data_options['offers_title'] ?>
                </div>
                <div class="mt-7 text-base xl:text-lg 2xl:text-2xl description">
                    <?= $page_data_options['offers_description'] ?>
                </div>
                <div>
                    <a href="/#contact-us" class="mt-11 btn btn-lg btn-bg-theme"><?= $page_data_options['offers_btn_text'] ?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="box-border flex flex-col xl:flex-row justify-center xl:items-center blog-section section-h-full" id="blog">
        <div class="xl:w-[50vw] box-border px-10 lg:px-16 2xl:px-32 py-5 left-section">
            <div class="text-base font-bold xl:text-lg 2xl:text-xl text-theme-primary-color sub-title">
                <?= $page_data_options['blogs_subtitle'] ?>
            </div>
            <div class="mt-6 text-xl font-bold xl:text-3xl 2xl:text-5xl title">
                <?= $page_data_options['blogs_title'] ?>
            </div>
            <div class="mt-6 text-base xl:text-lg 2xl:text-2xl description">
                <?= $page_data_options['blogs_description'] ?>
            </div>
            <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('blogs'); ?>" class="mt-11 btn btn-lg btn-bg-theme"><?= $page_data_options['blogs_btn_text'] ?></a>
        </div>
        <div class="xl:w-[50vw] box-border px-10 lg:px-16 2xl:px-32 py-5 xl:border-0 xl:border-l xl:border-solid xl:border-gray-200 xl:shadow-[-20px_0px_20px_-25px_#d9d9d9]">
            <?php $data = \App\Utils\SitesPage::getAllByTemplate($site_data->get('id'), 'blog', 1, 1); ?>
            <?php if ($data['pagination']['count'] > 0) : ?>
                <div class="relative">
                    <?php foreach ($data['items'] as $item) { ?>
                        <?php $options = json_decode($item['options'], true); ?>
                        <div>
                            <div class="datetime-show text-theme-primary-color text-sm 2xl:text-base date" data-date="<?= $item['publish_from']->format('Y-m-d\TH:i:s\Z') ?>"></div>
                            <div class="mt-2 text-lg xl:text-xl 2xl:text-3xl font-bold title"><?= $item['page_title']; ?></div>
                            <div class="mt-6 text-base xl:text-lg 2xl:text-xl line-clamp-[15]"><?= \App\Utils\CommonFunctions::trimWords($options['blog_primary_description'], 200) ?></div>
                            <a href="/<?= $item['page_slug'] ?>" class="btn btn-sm btn-bg-white mt-4"><?= $site_data_options['more_btn_label']; ?></a>
                        </div>
                    <?php } ?>
                    <script>
                        const date_elements = document.querySelectorAll('.datetime-show');
                        if (date_elements !== null) {
                            date_elements.forEach(elem => {
                                let date_string = elem.getAttribute('data-date')
                                if (date_string === '') {
                                    return;
                                }

                                let publish_date = new Date(date_string)
                                let month = publish_date.toLocaleString('default', { month: 'long' });
                                let publish_date_str = month + ' ' +  String(publish_date.getDate()) + ', ' + publish_date.getFullYear()
                                elem.innerHTML = publish_date_str;
                            })
                        }
                    </script>
                </div>
            <?php else : ?>
                <div class="flex justify-start items-center text-theme-primary-color text-2xl bottom-0 w-full not-found"><?= $site_data_options['no_results_label']; ?></div>
            <?php endif ?>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="box-border grid grid-cols-1 xl:grid-cols-2 justify-center items-center section-h-full" id="about-us">
        <div class="box-border px-10 lg:px-16 2xl:px-32 left-section py-10">
            <div class="text-xl font-bold xl:text-3xl 2xl:text-5xl title">
                <?= $page_data_options['about_us_title'] ?>
            </div>
            <div class="mt-7 text-base xl:text-lg 2xl:text-2xl description">
                <?= $page_data_options['about_us_description'] ?>
            </div>
        </div>
        <div class="h-[calc(100vh-57px)] xl:h-full relative">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_us_image'); ?>" loading="lazy" alt="about-us" class="h-full w-full object-cover absolute top-0 left-0">
        </div>
    </div>

    <!-- Contact Us Section -->
    <?php include __DIR__ . '/footer/footer.php' ?>

</div>
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
<?= $this->render('/Preview/general/footer'); ?>