<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-properties'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<?php

$page = 1;
if (isset($query_params['page'])) {
    $page = $query_params['page'] ?: 1;
    unset($query_params['page']);
}

$redirect_first_result = false;
if (isset($query_params['single_search'])) {
    $redirect_first_result = true;
    unset($query_params['single_search']);
}
unset($query_params['tab']);
unset($query_params['ajax']);
$search_params = $query_params;
if (empty($search_params['sort'])) {
    $search_params['sort'] = '-created';
}

$property_data = \App\Connector\Property::searchProperties($search_params, $page, 12);

if ($redirect_first_result && !empty($property_data['data'])) {
    $property = current($property_data['data']);
    $url = $property->getUrl();
    if (!empty($url)) {
        header('Location: ' . $url);
        exit;
    }
}

$address_arr = [];

$pagination_string = '';

if (!empty($query_params['subarea'])) {
    $pagination_string = $query_params['subarea'];
}

if (!empty($query_params['area']) && empty($pagination_string)) {
    $pagination_string = $query_params['area'];
}

if (!empty($query_params['district'])) {
    $pagination_string .= (!empty($pagination_string) ? ', ' : '') . $query_params['district'];
}

$sale_rent = $query_params['sale_rent'] ?? 'for_sale';

?>

<div class="px-6 pb-20 lg:pb-24">
    <div class="container xl:max-w-[1140px] mx-auto">
        <div class="l-breadcrumb-section container-section" data-search-source="locations"></div>
        <div class="properties-page">
            <div class="container-section">
                <h1 class="my-8 text-3xl titleColor leading-tight font-bold l-pagination-header"><?= \App\Utils\CommonFunctions::getListingPageTitle($query_params, $property_data) ?></h1>
                <div class="flex box-border xl:gap-[24px]">
                    <div class="box-border relative filters-col search-menu xl:basis-1/5">
                        <?php echo \App\Utils\Search::render('Neaimoveis', ['action' => '/' . \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'), 'style' => 'listing-filters rounded-[8px] border-b border-[#E8E7E1] border-opacity-100', 'row_class' => '', 'mobile_filter' => true]); ?>
                    </div>
                    <div class="p-listing">
                        <div class="p-listing__sale-rent-tabs">
                            <div class="p-listing__sale-rent-tabs__item <?= $sale_rent === 'for_sale' ? 'p-listing__sale-rent-tabs__item--active' : '' ?>" data-value="for_sale">Buy</div>
                            <div class="p-listing__sale-rent-tabs__item <?= $sale_rent === 'for_rent' ? 'p-listing__sale-rent-tabs__item--active' : '' ?>" data-value="for_rent">Rent</div>
                            <div class="p-listing__sale-rent-tabs__line"></div>
                        </div>
                        <div class="content-results">
                            <div class="p-listing__actions">
                                <div class="filter-mobile-btn">
                                    <div class="filter-mobile-btn__icon">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.25027 9.06667C5.08065 8.68875 4.82705 8.35451 4.50878 8.08938C4.19051 7.82425 3.81595 7.63521 3.4136 7.53667V0.666667C3.4136 0.489856 3.34336 0.320287 3.21834 0.195262C3.09332 0.070238 2.92375 0 2.74694 0C2.57013 0 2.40056 0.070238 2.27553 0.195262C2.15051 0.320287 2.08027 0.489856 2.08027 0.666667V7.53333C1.9207 7.57414 1.76465 7.62765 1.6136 7.69333C1.09419 7.92855 0.660848 8.31959 0.373704 8.81221C0.0865601 9.30483 -0.0401546 9.8746 0.0111381 10.4425C0.0624308 11.0104 0.289188 11.5482 0.659953 11.9814C1.03072 12.4146 1.52711 12.7217 2.08027 12.86V15.3333C2.08027 15.5101 2.15051 15.6797 2.27553 15.8047C2.40056 15.9298 2.57013 16 2.74694 16C2.92375 16 3.09332 15.9298 3.21834 15.8047C3.34336 15.6797 3.4136 15.5101 3.4136 15.3333V12.8633C3.84535 12.7578 4.24477 12.5484 4.57709 12.2533C4.9094 11.9582 5.16453 11.5863 5.32027 11.17C5.44871 10.8323 5.50867 10.4724 5.49665 10.1113C5.48463 9.75019 5.40088 9.39509 5.25027 9.06667ZM4.0736 10.7C3.99147 10.918 3.85684 11.1124 3.68163 11.266C3.50643 11.4195 3.29606 11.5275 3.06916 11.5803C2.84226 11.6332 2.60583 11.6292 2.38081 11.5688C2.1558 11.5085 1.94915 11.3936 1.77916 11.2342C1.60917 11.0749 1.48109 10.8762 1.40627 10.6555C1.33145 10.4349 1.3122 10.1992 1.35022 9.96938C1.38824 9.73953 1.48235 9.5226 1.62423 9.33782C1.76611 9.15303 1.95137 9.00609 2.1636 8.91C2.34546 8.8262 2.54337 8.78298 2.7436 8.78333C3.01646 8.7833 3.28355 8.86187 3.51291 9.00966C3.74228 9.15745 3.92421 9.36819 4.03694 9.61667C4.11564 9.78534 4.16001 9.96799 4.16745 10.154C4.17489 10.34 4.14525 10.5256 4.08027 10.7H4.0736Z" fill="#333333" />
                                            <path d="M17.5838 9.06667C17.4141 8.68875 17.1605 8.35451 16.8423 8.08938C16.524 7.82425 16.1494 7.63521 15.7471 7.53667V0.666667C15.7471 0.489856 15.6769 0.320287 15.5518 0.195262C15.4268 0.070238 15.2572 0 15.0804 0C14.9036 0 14.7341 0.070238 14.609 0.195262C14.484 0.320287 14.4138 0.489856 14.4138 0.666667V7.53333C14.2542 7.57414 14.0981 7.62765 13.9471 7.69333C13.4277 7.92855 12.9943 8.31959 12.7072 8.81221C12.4201 9.30483 12.2933 9.8746 12.3446 10.4425C12.3959 11.0104 12.6227 11.5482 12.9934 11.9814C13.3642 12.4146 13.8606 12.7217 14.4138 12.86V15.3333C14.4138 15.5101 14.484 15.6797 14.609 15.8047C14.7341 15.9298 14.9036 16 15.0804 16C15.2572 16 15.4268 15.9298 15.5518 15.8047C15.6769 15.6797 15.7471 15.5101 15.7471 15.3333V12.8633C16.1788 12.7578 16.5783 12.5484 16.9106 12.2533C17.2429 11.9582 17.498 11.5863 17.6538 11.17C17.7822 10.8323 17.8422 10.4724 17.8301 10.1113C17.8181 9.75019 17.7344 9.39509 17.5838 9.06667ZM16.4071 10.7C16.325 10.918 16.1903 11.1124 16.0151 11.266C15.8399 11.4195 15.6296 11.5275 15.4027 11.5803C15.1758 11.6332 14.9393 11.6292 14.7143 11.5688C14.4893 11.5085 14.2826 11.3936 14.1127 11.2342C13.9427 11.0749 13.8146 10.8762 13.7398 10.6555C13.6649 10.4349 13.6457 10.1992 13.6837 9.96938C13.7217 9.73953 13.8159 9.5226 13.9577 9.33782C14.0996 9.15303 14.2849 9.00609 14.4971 8.91C14.6791 8.8265 14.8769 8.78329 15.0771 8.78333C15.35 8.7833 15.617 8.86187 15.8464 9.00966C16.0758 9.15745 16.2577 9.36819 16.3704 9.61667C16.4481 9.78579 16.4913 9.96867 16.4976 10.1547C16.5039 10.3406 16.4731 10.526 16.4071 10.7Z" fill="#333333" />
                                            <path d="M9.88357 3.33333C9.78357 3.29667 9.68357 3.26667 9.58024 3.24V0.666667C9.58024 0.489856 9.51 0.320287 9.38497 0.195262C9.25995 0.070238 9.09038 0 8.91357 0C8.73676 0 8.56719 0.070238 8.44216 0.195262C8.31714 0.320287 8.2469 0.489856 8.2469 0.666667V3.25C7.85679 3.34848 7.49301 3.53126 7.18115 3.78548C6.86929 4.03969 6.61694 4.35917 6.44185 4.72142C6.26677 5.08367 6.1732 5.4799 6.16773 5.8822C6.16227 6.28451 6.24505 6.68313 6.41023 7.05C6.55805 7.3794 6.76965 7.67625 7.03283 7.92341C7.29601 8.17057 7.60555 8.36314 7.94357 8.49C8.04357 8.52667 8.1469 8.55667 8.2469 8.58333V15.3333C8.2469 15.5101 8.31714 15.6797 8.44216 15.8047C8.56719 15.9298 8.73676 16 8.91357 16C9.09038 16 9.25995 15.9298 9.38497 15.8047C9.51 15.6797 9.58024 15.5101 9.58024 15.3333V8.58C9.74056 8.54176 9.89684 8.48817 10.0469 8.42C10.5463 8.19818 10.9681 7.83246 11.2585 7.36962C11.5489 6.90677 11.6946 6.36782 11.6771 5.8217C11.6596 5.27557 11.4796 4.74709 11.1601 4.30383C10.8406 3.86056 10.3961 3.52266 9.88357 3.33333ZM10.2502 6.41667C10.1514 6.67891 9.97692 6.90594 9.74899 7.06902C9.52106 7.2321 9.24987 7.3239 8.96975 7.33283C8.68963 7.34175 8.41315 7.26738 8.17531 7.11913C7.93746 6.97089 7.74893 6.75542 7.63357 6.5C7.53611 6.28431 7.49424 6.04764 7.5118 5.8116C7.52935 5.57557 7.60576 5.34769 7.73405 5.14879C7.86235 4.94989 8.03843 4.7863 8.24622 4.67297C8.45401 4.55963 8.68688 4.50017 8.92357 4.5C9.09425 4.50013 9.26355 4.5306 9.42357 4.59C9.59605 4.65656 9.75372 4.75648 9.88756 4.88402C10.0214 5.01157 10.1288 5.16425 10.2036 5.33333C10.2828 5.50179 10.3278 5.68432 10.3358 5.87031C10.3438 6.0563 10.3147 6.24202 10.2502 6.41667Z" fill="#333333" />
                                        </svg>
                                    </div>
                                    <div class="inline-flex whitespace-nowrap">
                                        Filter (<span class="filter-mobile-btn__counter">0</span>)
                                    </div>
                                </div>
                                <div class="flex flex-row flex-wrap gap-[10px] p-listing__actions__pagination inline-labels md:items-center flex-1 sort_by_container">
                                    <?php
                                    $field_details = [
                                        'id' => 'custom_sort',
                                        'name' => 'custom_sort',
                                        'hide_label' => true,
                                        'size' => 'small',
                                        'label' => 'Sort By',
                                        'default' => $search_params['sort'] ?? '-created',
                                        'options' => [
                                            '-created' => 'Relevance',
                                            '-website_listing_date' => 'Recently Added',
                                            'price_desc' => 'Price: High to Low',
                                            'price_asc' => 'Price: Low to High',
                                        ],
                                        'class' => 'sort-manual',
                                    ];
                                    ?>
                                    <div class="hidden xl:inline-flex text-base leading-tight text-[#333333]">
                                        Sort By:
                                    </div>
                                    <div class="w-[130px] md:w-[170px] lg:w-[200px]">
                                        <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                                    </div>
                                </div>
                                <div class="p-listing__actions__tabs">
                                    <div class="p-listing__actions__tab p-listing__actions__tab--active" data-tab="section-listing-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.7038 5.25H5.29622C3.61427 5.25 2.25 6.6143 2.25 8.29739C2.25 9.97933 3.6143 11.3436 5.29622 11.3436H18.7038C20.3857 11.3436 21.75 9.9793 21.75 8.29739C21.75 6.6143 20.3857 5.25 18.7038 5.25ZM18.7038 10.1256H5.29622C4.28729 10.1256 3.46802 9.30632 3.46802 8.29739C3.46802 7.28731 4.28729 6.46919 5.29622 6.46919H18.7038C19.7127 6.46919 20.532 7.28731 20.532 8.29739C20.532 9.30632 19.7127 10.1256 18.7038 10.1256Z" />
                                            <path d="M18.7038 13.1714H5.29622C3.61427 13.1714 2.25 14.5357 2.25 16.2188C2.25 17.9019 3.6143 19.2662 5.29622 19.2662H18.7038C20.3857 19.2662 21.75 17.9019 21.75 16.2188C21.75 14.5357 20.3857 13.1714 18.7038 13.1714ZM18.7038 18.047H5.29622C4.28729 18.047 3.46802 17.2288 3.46802 16.2188C3.46802 15.2087 4.28729 14.3906 5.29622 14.3906H18.7038C19.7127 14.3906 20.532 15.2087 20.532 16.2188C20.532 17.2288 19.7127 18.047 18.7038 18.047Z" />
                                        </svg>
                                    </div>
                                    <div class="p-listing__actions__tab" data-tab="section-listing-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="3" width="7.71428" height="7.71428" rx="1.28571" fill="none" stroke-width="1.28571" />
                                            <rect x="3" y="13.2856" width="7.71428" height="7.71428" rx="1.28571" fill="none" stroke-width="1.28571" />
                                            <rect x="13.2861" y="3" width="7.71428" height="7.71428" rx="1.28571" fill="none" stroke-width="1.28571" />
                                            <rect x="13.2861" y="13.2856" width="7.71428" height="7.71428" rx="1.28571" fill="none" stroke-width="1.28571" />
                                        </svg>

                                    </div>
                                    <div class="p-listing__actions__tab" data-tab="section-map">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5254 21.1775C9.55165 18.408 5.33337 12.8498 5.33337 9.15414C5.33337 5.57128 8.23815 2.6665 11.821 2.6665C15.4039 2.6665 18.3086 5.57128 18.3086 9.15414C18.3086 12.8546 14.0865 18.4096 12.1126 21.1831C11.9668 21.3881 11.6632 21.3801 11.5254 21.1775ZM11.8212 6.0355C10.0986 6.0355 8.70254 7.43157 8.70254 9.15414C8.70254 11.9237 12.0659 13.3188 14.0259 11.3589C15.9859 9.39966 14.5906 6.0355 11.8212 6.0355ZM13.5187 7.45669C12.01 5.94882 9.42118 7.02239 9.42118 9.15418C9.42118 11.286 12.0107 12.3595 13.5187 10.8517C14.4561 9.9142 14.4561 8.39405 13.5187 7.45669ZM11.6299 20.0974L11.8212 20.3615C13.6758 17.798 17.5909 12.4713 17.5909 9.15414C17.5909 5.96747 15.0078 3.3844 11.8212 3.3844C8.6345 3.3844 6.05143 5.96747 6.05143 9.15414C6.05143 12.396 9.81332 17.5888 11.6299 20.0974Z" stroke-width="0.5" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="inline-flex lg:hidden items-center gap-2 border border-solid rounded-lg border-[#E8E7E1] bg-white h-[var(--field-height-small)] px-3 box-border">
                                    <div class="mobile-btn mobile-btn--map mobile-btn--active">
                                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.52555 19.1775C4.55177 16.408 0.333496 10.8498 0.333496 7.15414C0.333496 3.57128 3.23828 0.666504 6.82113 0.666504C10.404 0.666504 13.3088 3.57128 13.3088 7.15414C13.3088 10.8546 9.08663 16.4096 7.11277 19.1831C6.96692 19.3881 6.66328 19.3801 6.52555 19.1775ZM6.82129 4.0355C5.09869 4.0355 3.70266 5.43157 3.70266 7.15414C3.70266 9.92367 7.06606 11.3188 9.02602 9.35886C10.986 7.39966 9.59077 4.0355 6.82129 4.0355ZM8.51878 5.45669C7.01009 3.94882 4.4213 5.02239 4.4213 7.15418C4.4213 9.28597 7.0108 10.3595 8.51878 8.85166C9.45623 7.9142 9.45623 6.39405 8.51878 5.45669ZM6.63007 18.0974L6.82129 18.3615C8.67596 15.798 12.591 10.4713 12.591 7.15414C12.591 3.96747 10.008 1.3844 6.82129 1.3844C3.63462 1.3844 1.05156 3.96747 1.05156 7.15414C1.05156 10.396 4.81344 15.5888 6.63007 18.0974Z" fill="#333333" stroke="#003C46" stroke-width="0.5" />
                                        </svg>
                                        <span class="hidden m-mobile:inline-block text-sm">Map</span>
                                    </div>
                                    <div class="mobile-btn mobile-btn--list">
                                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.7038 0.25H3.29622C1.61427 0.25 0.25 1.6143 0.25 3.29739C0.25 4.97933 1.6143 6.3436 3.29622 6.3436H16.7038C18.3857 6.3436 19.75 4.9793 19.75 3.29739C19.75 1.6143 18.3857 0.25 16.7038 0.25ZM16.7038 5.12558H3.29622C2.28729 5.12558 1.46802 4.30632 1.46802 3.29739C1.46802 2.28731 2.28729 1.46919 3.29622 1.46919H16.7038C17.7127 1.46919 18.532 2.28731 18.532 3.29739C18.532 4.30632 17.7127 5.12558 16.7038 5.12558Z" fill="#333333" />
                                            <path d="M16.7038 8.17139H3.29622C1.61427 8.17139 0.25 9.53569 0.25 11.2188C0.25 12.9019 1.6143 14.2662 3.29622 14.2662H16.7038C18.3857 14.2662 19.75 12.9019 19.75 11.2188C19.75 9.53569 18.3857 8.17139 16.7038 8.17139ZM16.7038 13.047H3.29622C2.28729 13.047 1.46802 12.2288 1.46802 11.2188C1.46802 10.2087 2.28729 9.39058 3.29622 9.39058H16.7038C17.7127 9.39058 18.532 10.2087 18.532 11.2188C18.532 12.2288 17.7127 13.047 16.7038 13.047Z" fill="#333333" />
                                        </svg>
                                        <span class="hidden m-mobile:inline-block text-sm">List</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-listing__results p-listing <?= empty($property_data['data']) ? 'hidden' : '' ?>">
                                <div id="section-listing-1" class='grid grid-cols-1 gap-6 p-listing__results__section p-listing__results__section--active md:gap-[24px]'>
                                    <?php
                                    foreach ($property_data['data'] as $property) :
                                        include __DIR__ . '/components/property-list-item.php';
                                    endforeach;
                                    ?>
                                </div>
                                <div id="section-listing-2" class='grid grid-cols-1 gap-6 md:grid-cols-2 p-listing__results__section md:gap-8'>
                                    <?php
                                    foreach ($property_data['data'] as $property) :
                                        include __DIR__ . '/components/property-item.php';
                                    endforeach;
                                    ?>
                                </div>
                                <div id="section-map" class='p-listing__results__section'>
                                    <div class="relative w-full h-full">
                                        <?php // @codingStandardsIgnoreStart 
                                        ?>
                                        <?= $this->element('maps/single', [
                                            'id' => 'map-listing',
                                            'map_defaults' => [
                                                'scrollWheelZoom' => true,
                                                'center' => [
                                                    40.4380986,
                                                    -3.8443431,
                                                ],
                                            ],
                                            'popup_html_callback' => 'neaimoveisMapPopup',
                                            'markers' => []
                                        ]); ?>
                                        <?php // @codingStandardsIgnoreEnd 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($property_data['pagination']['count'])) : ?>
                                <div class="box-border flex flex-col items-center justify-center w-full mt-[40px] mb-[48px] bg-transparent md:flex-row c-pagination-section">
                                    <div class="flex-1 py-[1.5px]">
                                        <?php
                                        $pagination_params = [
                                            'pagination' => $property_data['pagination'],
                                            'pagination_options' => [
                                                'first_label' => '',
                                                'previous_label' => '<svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9.5L1 5.5L5 1.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                                                'next_label' => '<svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 9.5L5 5.5L1 1.5" stroke="#003C46" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                                                'last_label' => '',
                                            ],
                                        ]
                                        ?>
                                        <?= $this->element('pagination/pagination', $pagination_params); ?>
                                    </div>
                                    <div class="">
                                        <?= sprintf('%1$d - %2$d de %3$d resultados', $property_data['pagination']['firstIndexRecord'], $property_data['pagination']['lastIndexRecord'], $property_data['pagination']['count']); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="no-results-section <?= empty($property_data['data']) ? 'no-results-section--active' : '' ?>">
                                <div>
                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="80" height="80" rx="40" fill="#E5E7FF" />
                                        <path d="M38 54C46.8366 54 54 46.8366 54 38C54 29.1634 46.8366 22 38 22C29.1634 22 22 29.1634 22 38C22 46.8366 29.1634 54 38 54Z" stroke="#003C46" stroke-width="2.33334" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M58.0008 57.9998L49.3008 49.2998" stroke="#003C46" stroke-width="2.33334" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="pt-8 text-2xl font-medium text-theme-primary-color">Oops, we couldn't find what you were looking for.</div>
                                <div class="pb-8 text-lg">Try expanding your search by changing a filter.</div>
                                <div><button class="border-0 btn-pill reset-filters">Reset Filters</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset($query_params['sort']); ?>
<script>
    const query_params = '<?= http_build_query($query_params ?: ['sale_rent' => \App\Utils\CommonFunctions::getQueryParam('sale_rent', 'for_sale')]) ?>'
    const properties_slug = '/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>';
    const gmkey = '<?= $site_data_options['integrations_google_maps'] ?? '' ?>';
    document.body.classList.add('header__light');
</script>

<?php include __DIR__ . '/components/footer.php' ?>

<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->Html->script('/general/js/location-breadcrumbs.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/config.js'); ?>
<?= $this->html->script('/general/js/routing.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>

<?= $this->html->script('/neaimoveis/js/properties.js'); ?>

<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>