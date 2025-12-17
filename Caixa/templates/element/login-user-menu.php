<?php
$userMenuItems = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'user_menu');

?>
<div class="c-user-menu">
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
            <a href="<?= $url ?>" class="side_user_menu <?= $userLinkClass ?>"<?= $userMenuItemOptions['new_tab'] === 'yes' ? ' target="_blank"' : '' ?>>
                <h5><?= $userMenuItemlabel ?></h5>
            </a>
        </div>
    <?php endforeach; ?>
</div>