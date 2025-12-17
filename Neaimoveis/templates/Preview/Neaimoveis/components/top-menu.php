<?php
if (empty($menu_list)) {
    return;
}

$cta_menu_items = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'cta_menu');

$nav_menu_start_html = '';
$nav_menu_center_html = '';
$nav_menu_end_html = '';
?>
<div class="absolute top-0">
    <div class='menu-section' id="nav-menu">
        <div class="px-6">
            <div class="box-border container xl:max-w-[1140px] mx-auto menu-bar">
                <div class="flex items-center justify-between">
                    <?php foreach ($menu_list as $item) : ?>
                        <?php
                        $options = json_decode($item['options'], true);
                        $link_class = $options['menu_class'] ?? '';
                        $menu_class = 'menu-section__menu-nav__item--' . $item['menu_type'];
                        if (!empty($options['menu_icon'])) {
                            $menu_class = ' menu-section__menu-nav__item--' . \Cake\Utility\Text::slug($options['menu_icon']);
                        }

                        ob_start();
                        switch ($item['menu_type']) {
                            case 'page':
                                $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                                break;
                            default:
                                $url = $options['menu_url'];
                                break;
                        }

                        $menu_class .= \App\Utils\CommonFunctions::isCurrentPageActive($url, $page_data['page_slug']) ? ' page-active' : '';

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

                            $menu_class .= ' menu-section__menu-nav__item--icon';
                        }
                        ?>
                        <div class="menu-section__menu-nav__item <?= $menu_class ?>">
                            <a href="<?= $url ?>" class="<?= $link_class ?>"><?= $label ?></a>
                        </div>

                        <?php
                        $menu_item = ob_get_clean();
                        switch ($options['menu_item_position']) {
                            case 'left':
                                $nav_menu_start_html .= $menu_item;
                                break;
                            case 'center':
                                $nav_menu_center_html .= $menu_item;
                                break;
                            default:
                                $nav_menu_end_html .= $menu_item;
                        }
                        ?>
                    <?php endforeach; ?>
                    <div class="menu-section__col">
                        <div class='menu-section__logo'>
                            <a href="/" class="no-underline">
                                <img class="logo__dark" src="<?= $site_data->getLogoUrl() ?>" />
                                <img class="logo__light" src="<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'logo_light'); ?>" />
                            </a>
                        </div>
                        <?= $nav_menu_start_html ?>
                    </div>
                    <div class="menu-section__col font-semibold flex flex-wrap gap-2.5 sm:gap-x-8 justify-between">
                        <?= $nav_menu_center_html ?>
                    </div>

                    <div class="menu-section__col flex no-wrap gap-5 items-center">
                        <div class="flex lg:hidden items-center justify-center gap-2.5">
                            <div class="menu-section__menu-nav__item desktop-gflags flex items-center">
                                <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                            </div>
                            <div class="flex lg:hidden menu-mobile-toggle">
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" class="w-6 h-4 fill-white stroke-theme-primary-color menu-mobile-toggle__btn" xmlns="http://www.w3.org/2000/svg">
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
                        <div class="hidden lg:flex items-center gap-2.5">
                            <?= $nav_menu_end_html ?>
                        </div>
                        <div class="menu-section__menu-nav__item desktop-gflags hidden lg:!flex items-center gap-2.5">
                            <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                        </div>
                        <?php if (!empty($cta_menu_items)) : ?>
                            <ul class="p-0 m-0 list-none flex gap-5 menu-section__menu-nav__item">
                                <?php foreach ($cta_menu_items as $cta_menu_item) { ?>
                                    <?php
                                    $options = json_decode($cta_menu_item['options'], true);
                                    if ($cta_menu_item['menu_type'] === 'page') {
                                        $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                                    } else {
                                        $url = $options['menu_url'];
                                    }
                                    ?>
                                    <li>
                                        <a
                                            href="<?= $url ?>"
                                            class="btn-pill no-underline bg-theme-primary-color text-center px-6 py-4 !text-white uppercase font-bold rounded-full duration-300 block mx-auto">
                                            <?= $cta_menu_item->get('menu_label'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="mobile-menu absolute top-full left-0 w-0 h-0 overflow-hidden lg:hidden pb-5">
                        <div class="flex flex-col z-10 max-w-full mobile-menu-section__menu-nav transition-transform duration-700 -translate-y-full shadow-md">
                            <div class="flex-1">
                                <?= $nav_menu_start_html . $nav_menu_center_html . $nav_menu_end_html ?>
                                <?php if (!empty($cta_menu_items)) : ?>
                                    <ul class="p-0 m-0 list-none flex flex-wrap gap-2.5">
                                        <?php foreach ($cta_menu_items as $cta_menu_item) { ?>
                                            <?php
                                            $options = json_decode($cta_menu_item['options'], true);
                                            if ($cta_menu_item['menu_type'] === 'page') {
                                                $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                                            } else {
                                                $url = $options['menu_url'];
                                            }
                                            ?>
                                            <li class="w-full">
                                                <a
                                                    href="<?= $url ?>"
                                                    class="box-border w-full no-underline bg-theme-primary-color text-center text-sm leading-tight px-4 py-2.5 !text-white uppercase font-bold rounded-full duration-300 block mx-auto">
                                                    <?= $cta_menu_item->get('menu_label'); ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
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

            if (window.scrollY >= 100) {
                nav.classList.add('menu-section--static')
            } else {
                nav.classList.remove('menu-section--static')
            }
        });
    })()
</script>