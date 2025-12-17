<?php
$htt_auth_required = $site_data_options['http_auth_required'] ?? 'yes';
if ($htt_auth_required === 'yes') {
    $USERNAME = 'Wivai2021';
    $PASSWORD = 'Wivai2021';

    // Check if the client has provided credentials
    if (
        !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        $_SERVER['PHP_AUTH_USER'] !== $USERNAME || $_SERVER['PHP_AUTH_PW'] !== $PASSWORD
    ) {
        // Send authentication headers
        header('WWW-Authenticate: Basic realm="Protected Area"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Authentication required to access this page.';
        exit;
    }
}

if (empty($menu_list)) {
    return;
}

$nav_menu_start_html = '';
$nav_menu_center_html = '';
$nav_menu_end_html = '';

$theme_type = $theme_type ?? 'dark';

$token = \Caixa\Utils\CaixaToken::getId();
$userMenuItems = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'user_menu');

$userLoginUrl = $site_data_options['user_login_page'] ?? '';
if (!empty($userLoginUrl)) {
    $userLoginUrl .= '&originalURL=' . urlencode(\App\Utils\CommonFunctions::generateSiteUrl([], true));
}
$imaginMortgageLink = $site_data_options['imagin_mortgage_simulator_link'] ?? '';
?>
<div class="menu-section menu-section--<?= $theme_type ?>">
    <div class='menu-section__nav' id="nav-menu">
        <div class="box-border text-sm xl:text-base !leading-4 menu-bar">
            <div class="menu-bar__inner">
                <div class="menu-bar__inner--container">
                    <?php foreach ($menu_list as $item) : ?>
                        <?php
                        $options = json_decode($item['options'], true);
                        $link_class = $options['menu_class'] ?? '';
                        $menu_class = 'menu-section__nav__menu-nav__item--' . $item['menu_type'];
                        if (!empty($options['menu_icon'])) {
                            $menu_class = ' menu-section__nav__menu-nav__item--' . \Cake\Utility\Text::slug($options['menu_icon']);
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

                        $menu_class .= \App\Utils\CommonFunctions::isCurrentPageActive($url, $page_data['page_slug'] ?? '') ? ' page-active' : '';

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

                            $menu_class .= ' menu-section__nav__menu-nav__item--icon';
                        }
                        ?>
                        <div class="menu-section__nav__menu-nav__item <?= $menu_class ?>">
                            <a href="<?= $url ?>" class="<?= $link_class ?>"<?= ($options['new_tab'] ?? '') === 'yes' ? ' target="_blank"' : '' ?>><?= $label ?></a>
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
                    <div class="flex items-center justify-start menu-section__nav__col">
                        <?php $menu_logo_url = $theme_type === 'dark' ? $site_data->getLogoUrl() : \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'logo_light')?>
                        <div class='menu-section__nav__logo'>
                            <a href="/" class="no-underline" aria-label="Logo">
                                <img src="<?= $menu_logo_url ?>" alt="Menu Logo" loading="lazy"/>
                            </a>
                        </div>
                        <?= $nav_menu_start_html ?>
                    </div>
                    <div class="flex items-center justify-center flex-1 gap-8 menu-section__nav__col top-menu-div"><?= $nav_menu_center_html ?></div>
                    <div class="flex items-center justify-end gap-8 menu-section__nav__col z-100">
                        <div class="flex lg:hidden items-center justify-center gap-[21px]">
                            <div class="flex items-center menu-section__nav__menu-nav__item desktop-gflags">
                                <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                            </div>
                            <div class="">
                                <?php if (empty($token)) { ?>
                                    <a href="<?= $userLoginUrl ?>&medio=login" class="user-menu-button user-menu-button--guest" aria-label="<?= __('Login') ?>">
                                        <svg width="21" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.4037 20.0135C19.7782 17.0899 17.2264 15.0385 14.2612 14.1685C15.7028 13.4057 16.8556 12.1599 17.5337 10.6318C18.2118 9.10373 18.3757 7.38248 17.9989 5.74561C17.6221 4.10873 16.7267 2.65163 15.4569 1.60926C14.1872 0.56689 12.6172 0 11 0C9.38284 0 7.81281 0.56689 6.54306 1.60926C5.27332 2.65163 4.37787 4.10873 4.0011 5.74561C3.62433 7.38248 3.7882 9.10373 4.46628 10.6318C5.14437 12.1599 6.29715 13.4057 7.73875 14.1685C4.7736 15.0374 2.22177 17.0888 0.596285 20.0135C0.551652 20.0865 0.521682 20.1683 0.508179 20.2537C0.494676 20.3392 0.497919 20.4266 0.517713 20.5107C0.537506 20.5948 0.573442 20.6739 0.623357 20.7431C0.673273 20.8124 0.736137 20.8705 0.808167 20.9138C0.880197 20.9571 0.959906 20.9849 1.0425 20.9953C1.12509 21.0058 1.20885 20.9987 1.28876 20.9746C1.36866 20.9504 1.44305 20.9097 1.50745 20.8549C1.57185 20.8001 1.62493 20.7323 1.66349 20.6555C3.63854 17.1038 7.12804 14.9839 11 14.9839C14.872 14.9839 18.3615 17.1038 20.3365 20.6555C20.3751 20.7323 20.4282 20.8001 20.4925 20.8549C20.5569 20.9097 20.6313 20.9504 20.7112 20.9746C20.7911 20.9987 20.8749 21.0058 20.9575 20.9953C21.0401 20.9849 21.1198 20.9571 21.1918 20.9138C21.2639 20.8705 21.3267 20.8124 21.3766 20.7431C21.4266 20.6739 21.4625 20.5948 21.4823 20.5107C21.5021 20.4266 21.5053 20.3392 21.4918 20.2537C21.4783 20.1683 21.4483 20.0865 21.4037 20.0135ZM5.03681 7.49306C5.03681 6.26549 5.38654 5.06549 6.04179 4.0448C6.69703 3.02411 7.62835 2.22858 8.71798 1.75881C9.80762 1.28904 11.0066 1.16613 12.1634 1.40562C13.3201 1.6451 14.3826 2.23623 15.2166 3.10426C16.0506 3.97228 16.6185 5.07821 16.8486 6.28219C17.0787 7.48617 16.9606 8.73413 16.5093 9.86826C16.0579 11.0024 15.2936 11.9717 14.313 12.6537C13.3323 13.3357 12.1794 13.6998 11 13.6998C9.41905 13.6978 7.90339 13.0432 6.78549 11.8797C5.66759 10.7161 5.03871 9.13857 5.03681 7.49306Z" fill="white"/>
                                        </svg>
                                    </a>
                                <?php } else { ?>
                                    <div class="c-user-menu">
                                        <a href="" class="user-menu-button user-menu-button--logged-in" aria-label="<?= __('My Account') ?>">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4496 10.9832C10.5981 9.45185 9.26145 8.3773 7.70827 7.92158C8.4634 7.52206 9.06723 6.86947 9.42242 6.06904C9.77761 5.26862 9.86345 4.36701 9.66609 3.5096C9.46873 2.65219 8.99969 1.88895 8.33458 1.34295C7.66948 0.796942 6.84708 0.5 6 0.5C5.15292 0.5 4.33052 0.796942 3.66541 1.34295C3.00031 1.88895 2.53126 2.65219 2.33391 3.5096C2.13655 4.36701 2.22239 5.26862 2.57758 6.06904C2.93277 6.86947 3.5366 7.52206 4.29173 7.92158C2.73855 8.37674 1.40188 9.45129 0.550435 10.9832C0.527056 11.0215 0.511357 11.0643 0.504284 11.1091C0.497211 11.1538 0.49891 11.1996 0.509278 11.2437C0.519646 11.2877 0.53847 11.3292 0.564616 11.3655C0.590762 11.4017 0.623691 11.4322 0.661421 11.4549C0.699151 11.4776 0.740903 11.4921 0.784165 11.4975C0.797367 11.4992 0.814524 11.4989 0.831993 11.4975C0.871768 11.4946 0.913159 11.4867 0.913159 11.4867C0.913159 11.4867 0.988778 11.4569 1.02771 11.424C1.06725 11.3906 1.10945 11.3196 1.10945 11.3196C1.10945 11.3196 4.08886 11.4975 6 11.4975C7.91114 11.4975 10.8906 11.3196 10.8906 11.3196C10.8906 11.3196 10.9386 11.3953 10.9723 11.424C11.006 11.4527 11.045 11.474 11.0868 11.4867C11.1036 11.4917 11.1207 11.4954 11.1379 11.4975C11.1637 11.5008 11.1899 11.5008 11.2158 11.4975C11.2591 11.4921 11.3008 11.4776 11.3386 11.4549C11.3763 11.4322 11.4092 11.4017 11.4354 11.3655C11.4615 11.3292 11.4804 11.2877 11.4907 11.2437C11.5011 11.1996 11.5028 11.1538 11.4957 11.1091C11.4886 11.0643 11.4729 11.0215 11.4496 10.9832ZM2.87642 4.42493C2.87642 3.78192 3.05962 3.15335 3.40284 2.6187C3.74606 2.08406 4.2339 1.66735 4.80466 1.42128C5.37542 1.17521 6.00346 1.11083 6.60938 1.23627C7.21529 1.36172 7.77186 1.67136 8.2087 2.12604C8.64554 2.58072 8.94303 3.16001 9.06356 3.79067C9.18408 4.42133 9.12222 5.07502 8.88581 5.66909C8.64939 6.26315 8.24904 6.77091 7.73537 7.12815C7.2217 7.48539 6.61778 7.67606 6 7.67606C5.17188 7.67502 4.37797 7.33216 3.7924 6.72268C3.20683 6.1132 2.87742 5.28687 2.87642 4.42493Z"/>
                                                <path d="M10.8906 11.3196C10.8906 11.3196 7.91114 11.4975 6 11.4975H11.1379C11.1207 11.4954 11.1036 11.4917 11.0868 11.4867C11.045 11.474 11.006 11.4527 10.9723 11.424C10.9386 11.3953 10.8906 11.3196 10.8906 11.3196Z"/>
                                                <path d="M0.913159 11.4867C0.913159 11.4867 0.871768 11.4946 0.831993 11.4975H6C4.08886 11.4975 1.10945 11.3196 1.10945 11.3196C1.10945 11.3196 1.06725 11.3906 1.02771 11.424C0.988778 11.4569 0.913159 11.4867 0.913159 11.4867Z"/>
                                                <path d="M2.87642 4.42493C2.87642 3.78192 3.05962 3.15335 3.40284 2.6187C3.74606 2.08406 4.2339 1.66735 4.80466 1.42128C5.37542 1.17521 6.00346 1.11083 6.60938 1.23627C7.21529 1.36172 7.77186 1.67136 8.2087 2.12604C8.64554 2.58072 8.94303 3.16001 9.06356 3.79067C9.18408 4.42133 9.12222 5.07502 8.88581 5.66909C8.64939 6.26315 8.24904 6.77091 7.73537 7.12815C7.2217 7.48539 6.61778 7.67606 6 7.67606C5.17188 7.67502 4.37797 7.33216 3.7924 6.72268C3.20683 6.1132 2.87742 5.28687 2.87642 4.42493Z"/>
                                            </svg>
                                        </a>
                                        <?php ob_start(); ?>
                                        <?php foreach ($userMenuItems as $userItem) : ?>
                                            <?php
                                            $userMenuItemOptions = json_decode($userItem['options'], true);
                                            $userLinkClass = $userMenuItemOptions['menu_class'] ?? '';
                                            $userMenuClass = 'c-user-menu__list__item--' . $userItem['menu_type'];
                                            if (!empty($userMenuItemOptions['menu_icon'])) {
                                                $userMenuClass = ' c-user-menu__list__item--' . \Cake\Utility\Text::slug($userMenuItemOptions['menu_icon']);
                                            }

                                            switch ($userItem['menu_type']) {
                                                case 'page':
                                                    $url = \App\Utils\SitesPage::getPageSlugById((int)$userMenuItemOptions['pages_id']);
                                                    break;
                                                default:
                                                    $url = $userMenuItemOptions['menu_url'];
                                                    break;
                                            }

                                            $userMenuClass .= \App\Utils\CommonFunctions::isCurrentPageActive($url, $page_data['page_slug'] ?? '') ? ' page-active' : '';

                                            $icon_info = \App\Utils\Icons::getIconInfo($userMenuItemOptions);

                                            $includeLabel = empty($userMenuItemOptions['include_label']) || !empty($userMenuItemOptions['include_label']) && $userMenuItemOptions['include_label'] !== 'no';
                                            $userMenuItemlabel = $includeLabel ? $userItem['menu_label'] : '';

                                            if (!empty($icon_info)) {
                                                switch ($icon_info['position']) {
                                                    case 'right':
                                                        $userMenuItemlabel = $userMenuItemlabel . $icon_info['svg'];
                                                        break;
                                                    default:
                                                        $userMenuItemlabel = $icon_info['svg'] . $userMenuItemlabel;
                                                }

                                                $userMenuClass .= ' c-user-menu__list__item--icon';
                                            } else {
                                                if ($userLinkClass === 'my-profile') {
                                                    $userMenuItemlabel .= '<div><svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.90384 13.5962L12.3891 5.11092" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.02523 4.4038H13.0963L13.0963 11.4749" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>';
                                                } else {
                                                    $userMenuItemlabel .= '<div><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L1 1" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/></svg></div>';
                                                }
                                            }
                                            ?>
                                            <div class="c-user-menu__list__item <?= $userMenuClass ?>">
                                                <a href="<?= $url ?>" class="top_user_menu <?= $userLinkClass ?>"<?= $userMenuItemOptions['new_tab'] === 'yes' ? ' target="_blank"' : '' ?>>
                                                    <h5><?= $userMenuItemlabel ?></h5>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="c-user-menu__list__item c-user-menu__list__item--logout lg:p-4">
                                            <a href="#" class="btn-logout"><?= __('Log out') ?></a>
                                        </div>
                                        <?php $user_menu_html = ob_get_clean(); ?>
                                        <div class="c-user-menu__list">
                                            <div class="bg-white text-[24px] leading-[28.8px] text-theme-primary-color pt-8 pb-6 px-6">
                                                <?= __('My Account') ?>
                                            </div>
                                            <div class="c-user-menu__list__inner">
                                                <?= $user_menu_html ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="flex gap-5 lg:hidden md:mr-3 menu-mobile-toggle">
                                <svg width="41" height="40" viewBox="0 0 41 40" class="menu-mobile-toggle__btn" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.5 12L8.5 12" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M32.5 20H8.5" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M32.5 28H8.5" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg width="41" height="40" class="text-white cursor-pointer hover:text-white menu-mobile-toggle__btn-close hidden" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 10.6667L29.8333 29.3333" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.5 29.3333L29.8333 10.6667" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <?= $nav_menu_end_html ?>
                        <div class="menu-section__nav__menu-nav__item menu-section__nav__menu-nav__item--url page-active">
                            <?php if (empty($token)) { ?>
                                <a href="<?= $userLoginUrl ?>&medio=login" class="user-menu-button user-menu-button--guest" aria-label="<?= __('Login') ?>">
                                    <svg viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.4037 20.0135C19.7782 17.0899 17.2264 15.0385 14.2612 14.1685C15.7028 13.4057 16.8556 12.1599 17.5337 10.6318C18.2118 9.10373 18.3757 7.38248 17.9989 5.74561C17.6221 4.10873 16.7267 2.65163 15.4569 1.60926C14.1872 0.56689 12.6172 0 11 0C9.38284 0 7.81281 0.56689 6.54306 1.60926C5.27332 2.65163 4.37787 4.10873 4.0011 5.74561C3.62433 7.38248 3.7882 9.10373 4.46628 10.6318C5.14437 12.1599 6.29715 13.4057 7.73875 14.1685C4.7736 15.0374 2.22177 17.0888 0.596285 20.0135C0.551652 20.0865 0.521682 20.1683 0.508179 20.2537C0.494676 20.3392 0.497919 20.4266 0.517713 20.5107C0.537506 20.5948 0.573442 20.6739 0.623357 20.7431C0.673273 20.8124 0.736137 20.8705 0.808167 20.9138C0.880197 20.9571 0.959906 20.9849 1.0425 20.9953C1.12509 21.0058 1.20885 20.9987 1.28876 20.9746C1.36866 20.9504 1.44305 20.9097 1.50745 20.8549C1.57185 20.8001 1.62493 20.7323 1.66349 20.6555C3.63854 17.1038 7.12804 14.9839 11 14.9839C14.872 14.9839 18.3615 17.1038 20.3365 20.6555C20.3751 20.7323 20.4282 20.8001 20.4925 20.8549C20.5569 20.9097 20.6313 20.9504 20.7112 20.9746C20.7911 20.9987 20.8749 21.0058 20.9575 20.9953C21.0401 20.9849 21.1198 20.9571 21.1918 20.9138C21.2639 20.8705 21.3267 20.8124 21.3766 20.7431C21.4266 20.6739 21.4625 20.5948 21.4823 20.5107C21.5021 20.4266 21.5053 20.3392 21.4918 20.2537C21.4783 20.1683 21.4483 20.0865 21.4037 20.0135ZM5.03681 7.49306C5.03681 6.26549 5.38654 5.06549 6.04179 4.0448C6.69703 3.02411 7.62835 2.22858 8.71798 1.75881C9.80762 1.28904 11.0066 1.16613 12.1634 1.40562C13.3201 1.6451 14.3826 2.23623 15.2166 3.10426C16.0506 3.97228 16.6185 5.07821 16.8486 6.28219C17.0787 7.48617 16.9606 8.73413 16.5093 9.86826C16.0579 11.0024 15.2936 11.9717 14.313 12.6537C13.3323 13.3357 12.1794 13.6998 11 13.6998C9.41905 13.6978 7.90339 13.0432 6.78549 11.8797C5.66759 10.7161 5.03871 9.13857 5.03681 7.49306Z" fill="white"/>
                                    </svg>
                                    <?= __('Login') ?>
                                </a>
                            <?php } else { ?>
                                <div class="c-user-menu">
                                    <a href="" class="user-menu-button user-menu-button--logged-in" aria-label="<?= __('My Account') ?>">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4496 10.9832C10.5981 9.45185 9.26145 8.3773 7.70827 7.92158C8.4634 7.52206 9.06723 6.86947 9.42242 6.06904C9.77761 5.26862 9.86345 4.36701 9.66609 3.5096C9.46873 2.65219 8.99969 1.88895 8.33458 1.34295C7.66948 0.796942 6.84708 0.5 6 0.5C5.15292 0.5 4.33052 0.796942 3.66541 1.34295C3.00031 1.88895 2.53126 2.65219 2.33391 3.5096C2.13655 4.36701 2.22239 5.26862 2.57758 6.06904C2.93277 6.86947 3.5366 7.52206 4.29173 7.92158C2.73855 8.37674 1.40188 9.45129 0.550435 10.9832C0.527056 11.0215 0.511357 11.0643 0.504284 11.1091C0.497211 11.1538 0.49891 11.1996 0.509278 11.2437C0.519646 11.2877 0.53847 11.3292 0.564616 11.3655C0.590762 11.4017 0.623691 11.4322 0.661421 11.4549C0.699151 11.4776 0.740903 11.4921 0.784165 11.4975C0.797367 11.4992 0.814524 11.4989 0.831993 11.4975C0.871768 11.4946 0.913159 11.4867 0.913159 11.4867C0.913159 11.4867 0.988778 11.4569 1.02771 11.424C1.06725 11.3906 1.10945 11.3196 1.10945 11.3196C1.10945 11.3196 4.08886 11.4975 6 11.4975C7.91114 11.4975 10.8906 11.3196 10.8906 11.3196C10.8906 11.3196 10.9386 11.3953 10.9723 11.424C11.006 11.4527 11.045 11.474 11.0868 11.4867C11.1036 11.4917 11.1207 11.4954 11.1379 11.4975C11.1637 11.5008 11.1899 11.5008 11.2158 11.4975C11.2591 11.4921 11.3008 11.4776 11.3386 11.4549C11.3763 11.4322 11.4092 11.4017 11.4354 11.3655C11.4615 11.3292 11.4804 11.2877 11.4907 11.2437C11.5011 11.1996 11.5028 11.1538 11.4957 11.1091C11.4886 11.0643 11.4729 11.0215 11.4496 10.9832ZM2.87642 4.42493C2.87642 3.78192 3.05962 3.15335 3.40284 2.6187C3.74606 2.08406 4.2339 1.66735 4.80466 1.42128C5.37542 1.17521 6.00346 1.11083 6.60938 1.23627C7.21529 1.36172 7.77186 1.67136 8.2087 2.12604C8.64554 2.58072 8.94303 3.16001 9.06356 3.79067C9.18408 4.42133 9.12222 5.07502 8.88581 5.66909C8.64939 6.26315 8.24904 6.77091 7.73537 7.12815C7.2217 7.48539 6.61778 7.67606 6 7.67606C5.17188 7.67502 4.37797 7.33216 3.7924 6.72268C3.20683 6.1132 2.87742 5.28687 2.87642 4.42493Z"/>
                                            <path d="M10.8906 11.3196C10.8906 11.3196 7.91114 11.4975 6 11.4975H11.1379C11.1207 11.4954 11.1036 11.4917 11.0868 11.4867C11.045 11.474 11.006 11.4527 10.9723 11.424C10.9386 11.3953 10.8906 11.3196 10.8906 11.3196Z"/>
                                            <path d="M0.913159 11.4867C0.913159 11.4867 0.871768 11.4946 0.831993 11.4975H6C4.08886 11.4975 1.10945 11.3196 1.10945 11.3196C1.10945 11.3196 1.06725 11.3906 1.02771 11.424C0.988778 11.4569 0.913159 11.4867 0.913159 11.4867Z"/>
                                            <path d="M2.87642 4.42493C2.87642 3.78192 3.05962 3.15335 3.40284 2.6187C3.74606 2.08406 4.2339 1.66735 4.80466 1.42128C5.37542 1.17521 6.00346 1.11083 6.60938 1.23627C7.21529 1.36172 7.77186 1.67136 8.2087 2.12604C8.64554 2.58072 8.94303 3.16001 9.06356 3.79067C9.18408 4.42133 9.12222 5.07502 8.88581 5.66909C8.64939 6.26315 8.24904 6.77091 7.73537 7.12815C7.2217 7.48539 6.61778 7.67606 6 7.67606C5.17188 7.67502 4.37797 7.33216 3.7924 6.72268C3.20683 6.1132 2.87742 5.28687 2.87642 4.42493Z"/>
                                        </svg>
                                        <?= __('My Account') ?>
                                    </a>
                                    <div class="c-user-menu__list">
                                        <?= $user_menu_html ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="flex items-center menu-section__nav__menu-nav__item desktop-gflags">
                            <?php echo \App\Utils\GoogleTranslation::load($site_data_options) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute left-0 mobile-menu top-full lg:hidden">
                <div class="mobile-menu-section__nav__menu-nav">
                    <?= $nav_menu_start_html . $nav_menu_center_html . $nav_menu_end_html ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$component_modal_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/modals');
$component_modal_data_options = json_decode($component_modal_data['options'] ?? '{}', true);
$component_imagin_data_options = \Caixa\Utils\CaixaFunctions::getImaginDetails();
?>
<script>
    const modal_options = <?= json_encode($component_modal_data_options); ?>;
    const wishlist_url = '<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('wishlist'); ?>';
    const login_url = '<?= $userLoginUrl ?>';
    const imagin_mortgage_link = '<?= $imaginMortgageLink ?>';
    const imagin_details = <?= json_encode($component_imagin_data_options) ?>;

    (function() {
        const menu_mobile_elem = document.querySelector('.menu-mobile-toggle');
        const menu_mobile_elem_open_btn = document.querySelector('.menu-mobile-toggle__btn');
        const menu_mobile_closed_btn = document.querySelector('.menu-mobile-toggle__btn-close');
        const menu_elem = document.querySelector('.mobile-menu');

        /**
         * Listen for clicks inside the menu.
         */
        function menu_listen_event(e) {
            if (e.target.closest('.menu-section__nav__menu-nav__item--url') === null && e.target.closest('.menu-section__nav__menu-nav__item--enquiry') === null) {
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
                    nav.classList.add('menu-section__nav--static')
                } else {
                    nav.classList.remove('menu-section__nav--static')
                }
        });

        /**
         * Close user menu when clicking outside of it.
         */
        function closeUserMenu(e){
            if (e.target.closest('.c-user-menu') === null) {
                document.querySelector('.c-user-menu--open').classList.remove('c-user-menu--open');
                document.removeEventListener('click', closeUserMenu);
            }
        }

        const loggedInBtn = document.querySelectorAll('.user-menu-button--logged-in')
        if (loggedInBtn.length) {
            loggedInBtn.forEach(_btn => {
                const cUserMenu = _btn.closest('.c-user-menu');
                _btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (cUserMenu.classList.contains('c-user-menu--open')) {
                        cUserMenu.classList.remove('c-user-menu--open')
                        document.addEventListener('click', closeUserMenu);
                    } else {
                        cUserMenu.classList.add('c-user-menu--open')
                        setTimeout(() => {
                            document.addEventListener('click', closeUserMenu);
                        }, 100);
                    }
                });
            });
        }

        const btn_loggout = document.querySelectorAll('.btn-logout')
        if (btn_loggout.length) {
            btn_loggout.forEach(_btn => {
                _btn.addEventListener('click', function(e) {
                    e.preventDefault()
                    document.cookie = "ctkn=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    location.reload()
                })
            })
        }
    })()

    const default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    /**
     * When image fails to load, set the default image.
     * @param {object} obj The object.
     */
    function featuredPhotoOnError(obj) {
        obj.onerror = null;
        obj.setAttribute('pre-src', obj.src)
        obj.src = default_listing_image;
    }

    /**
     * When agent image fails to load delete the img object.
     * @param {object} obj The object.
     */
    function agentPhotoOnError(obj) {
        obj.remove()
    }
</script>
<?= $this->html->script('/caixa/js/modal.js'); ?>
<?= $this->html->script('/caixa/js/CaixaUtm.js'); ?>