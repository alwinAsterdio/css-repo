<?php
if (empty($menu_list)) {
    return;
}

$nav_menu_html = '';
?>
<div class='menu-section sticky left-0 top-0 z-50 w-full bg-white'>
    <div class="box-border flex items-center justify-between px-5 py-3 xl:py-6 overflow-x-hidden text-sm bg-white 2xl:py-6 2xl:text-base shadow-navbar">
        <?php if ($site_data->get('logo') !== '') : ?>
            <div class='menu-section__logo w-[150px] 2xl:w-[200px]'>
                <a href="/" class="no-underline">
                    <img src="<?= $site_data->getLogoUrl() ?>" class="object-contain object-left h-7 w-44 xl:w-52 xl:h-9" />
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
            <?php $icons_html = ob_get_clean(); ?>
            <?= $icons_html ?>
            <div class="menu-section__menu-nav__item desktop-gflags flex items-center">
                <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
            </div>
            <div class="menu-section__menu-nav__item ml-3 2xl:ml-6 mr-2 2xl:mr-4">
                <a href="/#contact-us" class="no-underline text-xs uppercase border-none 2xl:text-sm rounded hover:cursor-pointer px-4 py-3 text-white border-0 bg-theme-primary-color inline-block text-center">Μιλήστε μαζί μας</a>
            </div>

        </div>
        <div class="mobile-menu absolute top-full left-0 w-0 h-0 overflow-hidden xl:hidden">
            <div class="absolute inset-0 bg-gray-800 opacity-25 navbar-backdrop -z-10 w-screen"></div>
            <div class="flex flex-col z-10 max-w-md mobile-menu-section__menu-nav h-[calc(100vh_-_80px)] transition-transform duration-300 -translate-x-full">
                <div class="flex-1">
                    <?= $nav_menu_html ?>
                    <div class="menu-section__menu-nav__item menu-section__menu-nav__item--enquiry ml-3 2xl:ml-6 mr-2 2xl:mr-4">
                        <a href="/#contact-us" class="no-underline text-sm uppercase border-none rounded hover:cursor-pointer px-4 py-3 tracking-[1.95px] text-white border-0 bg-theme-primary-color inline-block text-center">Μιλήστε μαζί μας</a>
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
    })()
</script>