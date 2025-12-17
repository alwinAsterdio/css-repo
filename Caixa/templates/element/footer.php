<?php
$footer_menu_items = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'footer');
$subFooterMenuItems = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'sub_footer');
?>
<div class="py-8 lg:py-12 footer-section bg-theme-primary-color">
    <div class="container-section">
        <div class="flex flex-col gap-3 lg:flex-row md:gap-[113px] gap-y-[24px]">
            <div>
                <a href="/" class="no-underline">
                    <img src="<?= $site_data->getLogoUrl() ?>" width="147" height="18.14" alt="Footer logo" loading="lazy"/>
                </a>
            </div>
            <div class="footer-menu-links">
                <?php foreach ($footer_menu_items as $menu_item) { ?>
                    <?php
                    $options = json_decode($menu_item['options'], true);
                    $link_class = $options['menu_class'] ?? '';
                    if ($menu_item['menu_type'] === 'page') {
                        $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                    } else {
                        $url = $options['menu_url'];
                    }
                    ?>
                    <div class="footer-menu-links__item">
                        <a href="<?= $url ?>" class="footer-menu-links__item__link <?= $link_class ?>"<?= ($options['new_tab'] ?? '') === 'yes' ? ' target="_blank"' : '' ?>><?= $menu_item->get('menu_label'); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="text-center text-[#CCCCCC] pt-8 font-[Roboto] text-xs leading-[14.06px]"><?= $site_data->get('address'); ?></div>
        <div class="text-[#CCCCCC] pt-4 font-[Roboto] text-xs leading-[14.06px] flex flex-row flex-wrap gap-2 md:gap-4 justify-center">
            <?php foreach ($subFooterMenuItems as $subFooterItem) : ?>
                <?php
                $subOptions = json_decode($subFooterItem['options'], true);
                if ($subFooterItem['menu_type'] === 'page') {
                    $url = \App\Utils\SitesPage::getPageSlugById((int)$subOptions['pages_id']);
                } else {
                    $url = $subOptions['menu_url'];
                }
                ?>
                <a href="<?= $url; ?>" class="text-[#CCCCCC] no-underline" <?= $subOptions['new_tab'] === 'yes' ? ' target="_blank"' : '' ?>><?= $subFooterItem->get('menu_label'); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
