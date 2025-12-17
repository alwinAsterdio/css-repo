<?php
$my_profile_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/my-profile');
$recommended_properties_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/recommended-properties');
$favourite_properties_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/favourite-properties');
$matching_properties_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/matching-properties');
$my_offers_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/my-offers');
$documents_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/documents');
$get_in_touch_url = \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/get-in-touch');
?>
<div class="sidenav_bar">
    <div class="sidenav_wrapper h-full">
        <div class="sidenav_wrapper_inner h-full">
            <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/properties'); ?>"
                class="sidenav_logo block w-full border-0 border-solid border-b border-[var(--border-light)] px-6 py-3 absolute z-20 top-0 bg-white">
                <img loading="lazy" alt="Qobrix Logo" src="<?= $site_data->getLogoUrl() ?>" class="w-auto h-12 block">
            </a>
            <div class="vip_admin_sidenav">
                <ul>
                    <li class="sidenav_menu_item">
                        <a onclick="toggleAccordion(1)" class="group sidenav_menu_link">
                            <div class="menu_container w-full">
                                <div class="menu_icon">
                                    <svg viewBox="0 0 28 28" height="28px" width="28px">
                                        <mask id="a" width="28" height="28" x="0" y="0">
                                            <circle cx="14" cy="14" r="14"></circle>
                                        </mask>
                                        <circle cx="14" cy="14" r="14"></circle>
                                        <path
                                            d="M21.5 20v-9.01a1.5 1.5 0 0 0-.579-1.183l-3.5-2.724a1.5 1.5 0 0 0-1.842 0l-3.5 2.724a1.5 1.5 0 0 0-.579 1.184V20a1.5 1.5 0 0 0 1.5 1.5h7a1.5 1.5 0 0 0 1.5-1.5Z">
                                        </path>
                                        <path
                                            d="M16.5 20v-9.01a1.5 1.5 0 0 0-.579-1.183l-3.5-2.724a1.5 1.5 0 0 0-1.842 0l-3.5 2.724a1.5 1.5 0 0 0-.579 1.184V20A1.5 1.5 0 0 0 8 21.5h7a1.5 1.5 0 0 0 1.5-1.5Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="menu_label w-full flex justify-between items-center">
                                    My Properties
                                    <span id="icon-1" class="sidenav_menu_item_arrow ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="20px"
                                            width="20px" class="block fill-gray-500 group-hover:fill-white">
                                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <div id="sub_menu_inner-1" class="va_sub_menu">
                        <ul>
                            <?php if (!empty($recommended_properties_url)) : ?>
                            <li>
                                <a href="<?= $recommended_properties_url; ?>" id="circle_indicator_recommendedproperties">
                                    <div class="circle_indicator">
                                        <div class="circle_indicator_inner">
                                        </div>
                                    </div>
                                    <span>Recommended</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($favourite_properties_url)) : ?>
                            <li>
                                <a href="<?= $favourite_properties_url; ?>" id="circle_indicator_favourites">
                                    <div class="circle_indicator">
                                        <div class="circle_indicator_inner">
                                        </div>
                                    </div>
                                    <span>My Favourites</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (!empty($matching_properties_url)) : ?>
                            <li>
                                <a href="<?= $matching_properties_url; ?>" id="circle_indicator_mymatchingproperties">
                                    <div class="circle_indicator">
                                        <div class="circle_indicator_inner">
                                        </div>
                                    </div>
                                    <span>My Matching Properties</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/properties'); ?>" id="circle_indicator_all">
                                    <div class="circle_indicator">
                                        <div class="circle_indicator_inner">
                                        </div>
                                    </div>
                                    <span>All</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php if (!empty($my_offers_url)) : ?>
                    <li class="sidenav_menu_item<?= \App\Utils\CommonFunctions::isCurrentPageActive($my_offers_url, $page_data['page_url'] ?? '') ? ' sidenav_menu_item--active' : ''; ?>">
                        <a href="<?= $my_offers_url; ?>" class="sidenav_menu_link" id="sidenav_menu_item_myoffers">
                            <div class="menu_container">
                                <div class="menu_icon">
                                    <svg viewBox="0 0 28 28" height="28px" width="28px"
                                        class="rounded-full overflow-hidden">
                                        <circle cx="14" cy="14" r="14"></circle>
                                        <path
                                            d="m6.413 13.706 6.3-6.3c.252-.252.602-.406.987-.406h4.9c.77 0 1.4.63 1.4 1.4v4.9c0 .385-.154.735-.413.994l-6.3 6.3A1.4 1.4 0 0 1 12.3 21c-.385 0-.735-.154-.987-.413l-4.9-4.9A1.37 1.37 0 0 1 6 14.7c0-.385.161-.742.413-.994M17.55 10.5c.581 0 1.05-.469 1.05-1.05s-.469-1.05-1.05-1.05-1.05.469-1.05 1.05.469 1.05 1.05 1.05">
                                        </path>
                                    </svg>
                                </div>
                                <div class="menu_label">
                                    My Offers
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($documents_url)) : ?>
                    <li class="sidenav_menu_item<?= \App\Utils\CommonFunctions::isCurrentPageActive($documents_url, $page_data['page_url'] ?? '') ? ' sidenav_menu_item--active' : ''; ?>">
                        <a href="<?= $documents_url; ?>" class="sidenav_menu_link" id="sidenav_menu_item_documents">
                            <div class="menu_container">
                                <div class="menu_icon">
                                    <svg viewBox="0 0 28 28" height="28px" width="28px"
                                        class="rounded-full overflow-hidden">
                                        <circle cx="14" cy="14" r="14"></circle>
                                        <path d="M2 16h11v19H2z"></path>
                                        <path d="M5 22h7v1H5z"></path>
                                        <path d="M5 19h7v1H5z"></path>
                                        <path d="M5 25h7v1H5z"></path>
                                        <path d="M10.5 8.5h15v24h-15z"></path>
                                        <path d="M14 18h8v1h-8z"></path>
                                        <path d="M14 15h8v1h-8z"></path>
                                        <path d="M14 12h8v1h-8z"></path>
                                        <path d="M14 21h8v1h-8z"></path>
                                        <path d="M14 24h8v1h-8z"></path>
                                        <path d="M14 27h8v1h-8z"></path>
                                    </svg>
                                </div>
                                <div class="menu_label">
                                    Documents
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($get_in_touch_url)) : ?>
                    <li class="sidenav_menu_item<?= \App\Utils\CommonFunctions::isCurrentPageActive($get_in_touch_url, $page_data['page_url'] ?? '') ? ' sidenav_menu_item--active' : ''; ?>">
                        <a href="<?= $get_in_touch_url; ?>" class="sidenav_menu_link" id="sidenav_menu_item_getintouch">
                            <div class="menu_container">
                                <div class="menu_icon">
                                    <svg viewBox="0 0 28 28" height="28px" width="28px"
                                        class="rounded-full overflow-hidden">
                                        <circle cx="14" cy="14" r="14"></circle>
                                        <path
                                            d="M19 8H9c-1.1 0-1.99.9-1.99 2L7 19c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-9c0-1.1-.9-2-2-2m-.4 4.25-4.07 1.42c-.32.2-.74.2-1.06 0L9.4 12.25a.85.85 0 1 1 .9-1.44L14 12l3.7-1.19a.85.85 0 1 1 .9 1.44">
                                        </path>
                                    </svg>
                                </div>
                                <div class="menu_label">
                                    Get in Touch
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($my_profile_url)) : ?>
                    <li class="sidenav_menu_item<?= \App\Utils\CommonFunctions::isCurrentPageActive($my_profile_url, $page_data['page_url'] ?? '') ? ' sidenav_menu_item--active' : ''; ?>">
                        <a href="<?= $my_profile_url; ?>" class="sidenav_menu_link" id="sidenav_menu_item_myprofile">
                            <div class="menu_container">
                                <div class="menu_icon">
                                    <svg fill="none" viewBox="0 0 28 28" height="28px" width="28px"
                                        class="rounded-full overflow-hidden">
                                        <circle cx="14" cy="14" r="14"></circle>
                                        <path
                                            d="M14 13.566c2.355 0 4.265-1.917 4.265-4.283C18.265 6.918 16.355 5 14 5S9.735 6.918 9.735 9.283s1.91 4.283 4.265 4.283m9 11.926a9 9 0 0 0-18 0V29h18v-3.028c-.018-.157 0-.314 0-.48">
                                        </path>
                                    </svg>
                                </div>
                                <div class="menu_label">
                                    My Profile
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>

                <div class="hide_label_wrapper" onclick="toggleSidebarWidth()">
                    <div class="arrow_icon_top">
                    </div>
                    <div class="arrow_icon_bottom">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidenav_overlay"></div>
</div>