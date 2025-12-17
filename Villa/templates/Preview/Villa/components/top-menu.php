<?php
if (empty($menu_list)) {
    return;
}

$nav_menu_html = '';
?>
<div class="absolute top-0">
    <div class='menu-section fixed top-0 z-50 w-full bg-theme-primary-color' id="nav-menu">
        <div class="box-border flex justify-between items-center px-4 md:px-6 xl:px-10 2xl:px-12 py-1 overflow-x-hidden text-sm uppercase xl:text-base !leading-4 shadow-navbar menu-bar">
            <div class='menu-section__logo'>
                <a href="/" class="no-underline">
                    <img src="<?= $site_data->getLogoUrl() ?>" />
                </a>
            </div>
            <div class="absolute top-2 right-4 lg:right-6 xl:right-10 2xl:right-12 flags">
                <?php ob_start() ?>
                <?php $icons_html = ob_get_clean(); ?>
                <?= $icons_html ?>
                <div class="menu-section__menu-nav__item desktop-gflags flex items-center">
                    <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                </div>
            </div>
            <div class="flex flex-col xl:justify-end items-end">
                <div class="menu-section__menu-nav hidden transition-[margin] duration-[0.3s] ease-in lg:flex flex-row flex-wrap content-start lg:flex-row flex-1 lg:items-center lg:justify-end gap-[20px]">

                    <?php foreach ($menu_list as $item) : ?>
                        <?php
                        $options = json_decode($item['options'], true);
                        $menu_class = $options['menu_class'] ?? '';
                        ob_start();
                        ?>
                        <div class="menu-section__menu-nav__item menu-section__menu-nav__item--<?= $item['menu_type'] ?>">
                            <?php
                            switch ($item['menu_type']) {
                                case 'page':
                                    $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                                    break;
                                default:
                                    $url = $options['menu_url'];
                                    break;
                            }

                            $icon_info = \App\Utils\Icons::getIconInfo($options);

                            $include_label = empty($options['include_label']) || !empty($options['include_label']) && $options['include_label'] !== 'no';
                            $label = $include_label ? $item['menu_label'] : '';

                            if (!empty($icon_info)) {
                                switch ($icon_info['position']) {
                                    case 'right':
                                        $label = $label . $icon_info['svg'];
                                        break;
                                    default:
                                        $label = $icon_info['svg'] . $label;
                                }
                            }
                            ?>
                            <a href="<?= $url ?>" class="flex flex-row items-center gap-2 no-underline text-white text-base <?= $menu_class ?>"><?= $label ?></a>

                        </div>

                        <?php
                        $menu_item = ob_get_clean();

                        $nav_menu_html .= $menu_item;
                        ?>
                    <?php endforeach; ?>
                    <?= $nav_menu_html ?>
                </div>

                <div class="flex lg:hidden mr-2 md:mr-3 menu-mobile-toggle">
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" class="w-6 h-4 fill-white stroke-white menu-mobile-toggle__btn" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group 1">
                            <rect id="Rectangle 2" width="15" height="1"></rect>
                            <rect id="Rectangle 3" y="6" width="15" height="1"></rect>
                            <rect id="Rectangle 4" y="12" width="15" height="1"></rect>
                        </g>
                    </svg>
                    <svg class="w-6 h-4 text-gray-400 cursor-pointer hover:text-gray-500 menu-mobile-toggle__btn-close hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
            <div class="mobile-menu absolute top-full left-0 w-0 h-0 overflow-hidden lg:hidden">
                <div class="flex flex-col z-10 max-w-full mobile-menu-section__menu-nav transition-transform duration-700 -translate-y-full">
                    <div class="flex-1">
                        <?= $nav_menu_html ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    (function() {
        const menu_mobile_elem = document.querySelector('.menu-mobile-toggle');
        const menu_mobile_elem_open_btn = document.querySelector('.menu-mobile-toggle__btn');
        const menu_mobile_closed_btn = document.querySelector('.menu-mobile-toggle__btn-close');
        const menu_elem = document.querySelector('.mobile-menu');

        /**
         * Listen for clicks inside the menu.
         */
        function menu_listen_event(e) {
            if (e.target.closest('.menu-section__menu-nav__item--url') === null && e.target.closest('.menu-section__menu-nav__item--enquiry') === null) {
                return;
            }
            hide_top_menu()
            menu_elem.removeEventListener('click', menu_listen_event)
        }

        /**
         * Hide top mobile menu.
         */
        function hide_top_menu() {
            menu_mobile_closed_btn.classList.add('hidden')
            menu_mobile_elem_open_btn.classList.remove('hidden')
            menu_elem.classList.remove('mobile-menu--open')
        }

        /**
         * Show top mobile menu.
         */
        function show_top_menu() {
            menu_mobile_closed_btn.classList.remove('hidden')
            menu_mobile_elem_open_btn.classList.add('hidden')
            menu_elem.classList.add('mobile-menu--open')
        }

        document.addEventListener('DOMContentLoaded', function(event) {
            menu_mobile_elem.addEventListener('click', function() {
                if (menu_mobile_elem_open_btn.classList.contains('hidden')) {
                    hide_top_menu()
                } else {
                    show_top_menu();
                    menu_elem.addEventListener('click', menu_listen_event)
                }

            })
        })
        // change nav color on scroll
        const nav = document.getElementById('nav-menu');
        const heroSection = document.querySelector('.hero-section');
        window.addEventListener('scroll', function() {
                let scroll = window.scrollY;

                if ( window.scrollY >= 240) {
                    nav.classList.add('menu-section--static')
                } else {
                    nav.classList.remove('menu-section--static')
                }
        });
    })()
</script>