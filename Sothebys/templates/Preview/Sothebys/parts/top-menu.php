<?php
if (empty($menu_list)) {
    return;
}

$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/request-call-back');
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
            <?php $whatsapp = $site_data_options['whatsapp'] ?? ''; ?>
            <?php if (!empty($whatsapp)) { ?>
                <div class="menu-section__menu-nav__item flex items-center ml-3 2xl:ml-6 menu-section__menu-nav__item--whatsapp">
                    <a href="<?= 'https://wa.me/' . $whatsapp ?>" target="_blank" class="no-underline text-black flex items-center">
                        <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[20px] h-[20px] xl:w-[50px] xl:h-[50px] fill-theme-primary-color">
                            <circle cx="16" cy="16.5" r="16"/>
                            <path d="M6.83705 25.6667L8.07639 21.1127C7.25976 19.7128 6.83072 18.1207 6.83339 16.5C6.83339 11.4373 10.9373 7.33334 16.0001 7.33334C21.0628 7.33334 25.1667 11.4373 25.1667 16.5C25.1667 21.5628 21.0628 25.6667 16.0001 25.6667C14.3801 25.6693 12.7887 25.2406 11.3892 24.4246L6.83705 25.6667ZM12.6918 12.199C12.5734 12.2064 12.4578 12.2375 12.3517 12.2907C12.2523 12.347 12.1615 12.4174 12.0822 12.4997C11.9722 12.6033 11.9099 12.6931 11.843 12.7802C11.5042 13.2211 11.3219 13.7623 11.3251 14.3183C11.3269 14.7675 11.4442 15.2048 11.6276 15.6136C12.0025 16.4404 12.6194 17.3158 13.4343 18.1271C13.6305 18.3223 13.8221 18.5185 14.0283 18.7009C15.0397 19.5914 16.245 20.2336 17.5483 20.5764L18.0699 20.6562C18.2395 20.6653 18.4091 20.6525 18.5796 20.6443C18.8465 20.6305 19.1072 20.5582 19.3431 20.4325C19.4953 20.3518 19.5668 20.3115 19.6942 20.2308C19.6942 20.2308 19.7336 20.2052 19.8088 20.1483C19.9326 20.0567 20.0086 19.9916 20.1113 19.8843C20.1874 19.8055 20.2534 19.7129 20.3038 19.6075C20.3753 19.4581 20.4468 19.173 20.4761 18.9356C20.4981 18.7541 20.4917 18.6551 20.489 18.5937C20.4853 18.4956 20.4037 18.3938 20.3148 18.3508L19.7813 18.1115C19.7813 18.1115 18.9838 17.7641 18.4971 17.5423C18.4457 17.5199 18.3907 17.5071 18.3348 17.5047C18.2721 17.4982 18.2087 17.5053 18.1489 17.5254C18.0892 17.5455 18.0344 17.5781 17.9883 17.6211V17.6193C17.9837 17.6193 17.9223 17.6715 17.2596 18.4745C17.2215 18.5256 17.1691 18.5643 17.109 18.5855C17.049 18.6067 16.9839 18.6096 16.9222 18.5937C16.8625 18.5777 16.804 18.5575 16.7471 18.5332C16.6335 18.4855 16.5941 18.4672 16.5161 18.4333L16.5116 18.4314C15.9871 18.2025 15.5016 17.8932 15.0724 17.5148C14.9569 17.4139 14.8496 17.3039 14.7396 17.1976C14.379 16.8522 14.0647 16.4615 13.8046 16.0353L13.7506 15.9482C13.7117 15.8897 13.6803 15.8265 13.6571 15.7603C13.6222 15.6255 13.713 15.5173 13.713 15.5173C13.713 15.5173 13.9357 15.2735 14.0393 15.1415C14.1256 15.0318 14.206 14.9177 14.2804 14.7996C14.3886 14.6254 14.4225 14.4467 14.3656 14.3083C14.109 13.6813 13.8431 13.057 13.57 12.4373C13.5159 12.3145 13.3555 12.2265 13.2097 12.2091C13.1602 12.2036 13.1107 12.1981 13.0612 12.1944C12.9381 12.1883 12.8148 12.1905 12.6918 12.199Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            <?php } ?>
            <?php $icons_html = ob_get_clean(); ?>
            <?= $icons_html ?>
            <?php if (!empty($component_data)) { ?>
                <div class="menu-section__menu-nav__item ml-3 2xl:ml-6">
                    <button class="no-underline btn btn-secondary btn-sm inline-flex justify-center items-center request-callback">REQUEST A CALLBACK</button>
                </div>
            <?php } ?>
            <div class="menu-section__menu-nav__item desktop-gflags flex items-center ml-2 2xl:ml-4">
                <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
            </div>
        </div>
        <div class="mobile-menu absolute top-full left-0 w-0 h-0 overflow-hidden xl:hidden">
            <div class="absolute inset-0 bg-gray-800 opacity-25 navbar-backdrop -z-10 w-screen"></div>
            <div class="flex flex-col z-10 max-w-md mobile-menu-section__menu-nav h-[calc(100vh_-_80px)] transition-transform duration-300 -translate-x-full">
                <div class="flex-1">
                    <?= $nav_menu_html ?>
                    <div class="menu-section__menu-nav__item menu-section__menu-nav__item--enquiry ml-3 2xl:ml-6 mr-2 2xl:mr-4">
                        <button class="no-underline btn btn-secondary btn-sm inline-flex justify-center items-center request-callback">REQUEST A CALLBACK</button>
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