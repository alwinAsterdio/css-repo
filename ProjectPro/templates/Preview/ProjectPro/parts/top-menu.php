<?php
if (empty($menu_list)) {
    return;
}

$nav_menu_html = '';
?>
<div class='menu-section sticky top-0 z-50 w-full bg-white'>
    <div class="box-border flex items-center justify-between px-5 py-3 xl:py-6 overflow-x-hidden text-sm bg-white 2xl:py-6 2xl:text-base shadow-navbar">
        <?php if ($site_data->get('logo') !== '') : ?>
            <div class='menu-section__logo w-[150px] 2xl:w-[200px]'>
                <a href="/" class="no-underline">
                    <img src="<?= $site_data->getLogoUrl() ?>" class="object-contain object-left h-7 w-44 xl:w-52 xl:h-9"/>
                </a>
            </div>
        <?php endif; ?>
        <div class="menu-section__menu-nav hidden xl:flex flex-row flex-wrap content-start xl:flex-row flex-1 xl:items-center xl:justify-end">
            <?php foreach ($menu_list as $item) : ?>
                <?php
                $options = json_decode($item['options'], true);
                $menu_class = $options['menu_class'] ?? '';
                ob_start();
                ?>
                <div class="menu-section__menu-nav__item px-2 xl:px-3 2xl:px-3.5 menu-section__menu-nav__item--<?= $item['menu_type'] ?>">
                    <?php
                    switch ($item['menu_type']) {
                        case 'page':
                            $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                            break;
                        default:
                            $url = $options['menu_url'];
                            break;
                    }
                    ?>
                    <a href="<?= $url ?>" class="no-underline text-black <?= $menu_class ?>"><?= $item['menu_label'] ?></a>
                </div>
                <?php
                $menu_item = ob_get_clean();

                $nav_menu_html .= $menu_item;
                ?>
            <?php endforeach; ?>
            <?= $nav_menu_html ?>
            <?php ob_start() ?>
            <div class="menu-section__menu-nav__item flex items-center pr-3 border-0 border-r-2 border-solid  2xl:pr-6 border-[#BACDCF]">
                <a href="tel:<?= $site_data->get('phone') ?>" class="flex no-underline items-center text-[#152329]">
                    <svg viewBox="0 0 30 31" fill="none" class="w-[20px] h-[20px] xl:w-[30px] xl:h-[30px] mr-3 stroke-theme-primary-color fill-theme-primary-color" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="15" cy="15" r="14" stroke-width="2" />
                        <path d="M21.6329 18.2746L19.675 16.3208C18.9758 15.6231 17.7871 15.9022 17.5074 16.8093C17.2976 17.4373 16.5984 17.7862 15.9691 17.6466C14.5706 17.2977 12.6827 15.4835 12.3331 14.0182C12.1233 13.3902 12.5429 12.6924 13.1722 12.4831C14.0812 12.204 14.3609 11.0178 13.6616 10.3201L11.7038 8.36633C11.1444 7.87789 10.3053 7.87789 9.81584 8.36633L8.4873 9.69208C7.15876 11.0876 8.62715 14.7858 11.9135 18.0652C15.1999 21.3447 18.9059 22.8798 20.3043 21.4843L21.6329 20.1585C22.1224 19.6003 22.1224 18.763 21.6329 18.2746Z" fill="white" />
                    </svg>
                    <span><?= $site_data->get('phone') ?></span>
                </a>
            </div>
            <div class="menu-section__menu-nav__item flex items-center ml-3 2xl:ml-6 menu-section__menu-nav__item--whatsapp">
                <?php $whatsapp = $site_data_options['whatsapp'] ?? ''; ?>
                <a href="<?= !empty($whatsapp) ? 'https://wa.me/' . $whatsapp : '' ?>" target="_blank" class="no-underline text-black flex items-center">
                    <svg viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[20px] h-[20px] xl:w-[30px] xl:h-[30px]">
                        <path d="M1.41162 28.7532L3.01503 22.7241L3.11925 22.3322L2.9211 21.9785C1.73993 19.8695 1.11842 17.4749 1.12128 15.0364L1.12128 15.0356C1.1244 7.36329 7.18096 1.17052 14.5602 1.17023L1.41162 28.7532ZM1.41162 28.7532L7.3937 27.1377L7.78796 27.0312L8.14405 27.2311C10.1043 28.3319 12.3102 28.9117 14.5543 28.9127C14.5544 28.9127 14.5545 28.9127 14.5547 28.9127H14.5605C21.9388 28.9127 27.9967 22.7187 28 15.0467C28.0013 11.3303 26.5994 7.84658 24.0571 5.22646C21.516 2.60755 18.1483 1.17224 14.5607 1.17023L1.41162 28.7532Z" fill="#45C755" stroke="#45C755" stroke-width="2" />
                        <path d="M20.6591 17.5407L18.8411 15.7265C18.1918 15.0786 17.088 15.3378 16.8283 16.18C16.6335 16.7632 15.9842 17.0872 15.3999 16.9575C14.1013 16.6336 12.3482 14.949 12.0236 13.5883C11.8288 13.0052 12.2184 12.3573 12.8027 12.1629C13.6468 11.9037 13.9065 10.8023 13.2572 10.1543L11.4392 8.34016C10.9198 7.88661 10.1406 7.88661 9.68614 8.34016L8.45249 9.57122C7.21885 10.8671 8.58235 14.3011 11.634 17.3463C14.6857 20.3915 18.1269 21.817 19.4255 20.5211L20.6591 19.2901C21.1136 18.7717 21.1136 17.9942 20.6591 17.5407Z" fill="white" />
                    </svg>
                </a>
            </div>
            <?php $icons_html = ob_get_clean(); ?>
            <?= $icons_html ?>
            <div class="menu-section__menu-nav__item ml-3 2xl:ml-6 mr-2 2xl:mr-4">
                <a href="/#contact-us" class="no-underline text-xs uppercase border-none 2xl:text-sm rounded-buttons hover:cursor-pointer px-4 py-2 tracking-[1.95px] text-white border-0 bg-theme-primary-color inline-block text-center">Make Enquiry</a>
            </div>
            <div class="menu-section__menu-nav__item desktop-gflags flex items-center">
                <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
            </div>
        </div>
        <div class="mobile-menu absolute top-full left-0 w-0 h-0 overflow-hidden xl:hidden">
            <div class="absolute inset-0 bg-gray-800 opacity-25 navbar-backdrop -z-10 w-screen"></div>
            <div class="flex flex-col z-10 max-w-md mobile-menu-section__menu-nav h-[calc(100vh_-_80px)] transition-transform duration-300 -translate-x-full">
                <div class="flex-1">
                    <?= $nav_menu_html ?>
                    <div class="menu-section__menu-nav__item menu-section__menu-nav__item--enquiry ml-3 2xl:ml-6 mr-2 2xl:mr-4">
                        <a href="/#contact-us" class="no-underline text-xs uppercase border-none 2xl:text-sm rounded-buttons hover:cursor-pointer px-4 py-2 tracking-[1.95px] text-white border-0 bg-theme-primary-color inline-block text-center">Make Enquiry</a>
                    </div>
                </div>
                <div class="flex flex-wrap items-center">
                    <?= $icons_html ?>
                    <div class="menu-section__menu-nav__item mobile-gflags pl-3 flex items-center">
                        <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex xl:hidden menu-mobile-toggle">
            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" class="w-6 h-6 fill-theme-primary-color stroke-theme-primary-color menu-mobile-toggle__btn" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 1">
                    <rect id="Rectangle 2" width="15" height="1"></rect>
                    <rect id="Rectangle 3" y="6" width="15" height="1"></rect>
                    <rect id="Rectangle 4" y="12" width="15" height="1"></rect>
                </g>
            </svg>
            <svg class="w-6 h-6 text-gray-400 cursor-pointer hover:text-gray-500 menu-mobile-toggle__btn-close hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
</div>
<script>
    (function(){
        const menu_mobile_elem = document.querySelector('.menu-mobile-toggle');
        const menu_mobile_elem_open_btn = document.querySelector('.menu-mobile-toggle__btn');
        const menu_mobile_closed_btn = document.querySelector('.menu-mobile-toggle__btn-close');
        const menu_elem = document.querySelector('.mobile-menu');

        /**
         * Listen for clicks inside the menu.
         */
        function menu_listen_event(e){
            if (e.target.closest('.menu-section__menu-nav__item--url') === null && e.target.closest('.menu-section__menu-nav__item--enquiry') === null) {
                return;
            }
            hide_top_menu()
            menu_elem.removeEventListener('click',menu_listen_event)
        }

        /**
         * Hide top mobile menu.
         */
        function hide_top_menu(){
            menu_mobile_closed_btn.classList.add('hidden')
            menu_mobile_elem_open_btn.classList.remove('hidden')
            menu_elem.classList.remove('mobile-menu--open')
        }

        /**
         * Show top mobile menu.
         */
        function show_top_menu(){
            menu_mobile_closed_btn.classList.remove('hidden')
            menu_mobile_elem_open_btn.classList.add('hidden')
            menu_elem.classList.add('mobile-menu--open')
        }

        document.addEventListener('DOMContentLoaded', function (event) {
            menu_mobile_elem.addEventListener('click', function(){
                if (menu_mobile_elem_open_btn.classList.contains('hidden')) {
                    hide_top_menu()
                } else {
                    show_top_menu();
                    menu_elem.addEventListener('click',menu_listen_event)
                }
                
            })
        })
    })()
</script>