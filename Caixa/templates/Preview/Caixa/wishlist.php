<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-wishlist'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<div class="bg-[#FAFAF9] py-6 lg:pt-[40px] lg:pb-[80px] wishlist-section">
    <div class="container-section flex gap-6">
        <div class="min-w-[274px] hidden xl:block">
            <?= $this->element('login-user-menu'); ?>
        </div>
        <div class="flex-1">
            <div class="listing-group flex flex-col md:flex-row md:items-center">
                <div class="flex-1">
                    <div class="text-2xl text-theme-primary-color"><?= $page_data['page_title'] ?></div>
                    <div class="text-[#333333] font-base font-[Roboto]">
                        Todos tus favoritos (<span class="wishlist-counter">0</span>)
                    </div>
                </div>
                <div class="flex-1 md:flex-initial py-4 md:py-0">
                    <div class="flex flex-row flex-wrap gap-2 p-listing__actions__pagination inline-labels items-center flex-1">
                        <?php
                        $field_details = [
                            'id' => 'sale_rent',
                            'name' => 'sale_rent',
                            'hide_label' => true,
                            'size' => 'small',
                            'label' => 'Sort By',
                            'default' => 'for_sale_and_rent',
                            'options' => [
                                'for_sale_and_rent' => 'Compra y alquiler',
                                'for_rent' => 'Alquiler',
                                'for_sale' => 'Compra',
                            ],
                        ];
                        ?>
                        <div class="w-[170px] lg:w-[200px]">
                            <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listing-group p-listing__actions py-6">
                <div class="flex flex-row flex-wrap gap-2 p-listing__actions__pagination inline-labels items-center flex-1">
                    <?php
                    $field_details = [
                        'id' => 'sort',
                        'name' => 'sort',
                        'hide_label' => true,
                        'size' => 'small',
                        'label' => 'Sort By',
                        'default' => $query_params['sort'] ?? '-website_listing_date',
                        'options' => [
                            '-website_listing_date' => 'Recientes',
                            'price_desc' => 'Precio más alto',
                            'price_asc' => 'Baratos',
                            '-price_per_square' => 'Caros eur/m²',
                            'price_per_square' => 'Baratos eur/m²',
                            'internal_area_amount' => 'Grandes',
                            '-internal_area_amount' => 'Pequeños',
                        ],
                        'class' => 'sort-manual',
                    ];
                    ?>
                    <div class="hidden xl:inline-flex text-base">
                        Ordenar por:
                    </div>
                    <div class="w-[130px] md:w-[170px] lg:w-[200px]">
                        <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                    </div>
                </div>
                <div class="p-listing__actions__tabs">
                    <div class="p-listing__actions__tab p-listing__actions__tab--active" data-tab="section-listing-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.7038 5.25H5.29622C3.61427 5.25 2.25 6.6143 2.25 8.29739C2.25 9.97933 3.6143 11.3436 5.29622 11.3436H18.7038C20.3857 11.3436 21.75 9.9793 21.75 8.29739C21.75 6.6143 20.3857 5.25 18.7038 5.25ZM18.7038 10.1256H5.29622C4.28729 10.1256 3.46802 9.30632 3.46802 8.29739C3.46802 7.28731 4.28729 6.46919 5.29622 6.46919H18.7038C19.7127 6.46919 20.532 7.28731 20.532 8.29739C20.532 9.30632 19.7127 10.1256 18.7038 10.1256Z"/>
                            <path d="M18.7038 13.1714H5.29622C3.61427 13.1714 2.25 14.5357 2.25 16.2188C2.25 17.9019 3.6143 19.2662 5.29622 19.2662H18.7038C20.3857 19.2662 21.75 17.9019 21.75 16.2188C21.75 14.5357 20.3857 13.1714 18.7038 13.1714ZM18.7038 18.047H5.29622C4.28729 18.047 3.46802 17.2288 3.46802 16.2188C3.46802 15.2087 4.28729 14.3906 5.29622 14.3906H18.7038C19.7127 14.3906 20.532 15.2087 20.532 16.2188C20.532 17.2288 19.7127 18.047 18.7038 18.047Z"/>
                        </svg>
                    </div>
                    <div class="p-listing__actions__tab" data-tab="section-listing-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7.71428" height="7.71428" rx="1.28571" stroke-width="1.28571"/>
                            <rect x="3" y="13.2856" width="7.71428" height="7.71428" rx="1.28571" stroke-width="1.28571"/>
                            <rect x="13.2858" y="3" width="7.71428" height="7.71428" rx="1.28571" stroke-width="1.28571"/>
                            <rect x="13.2858" y="13.2856" width="7.71428" height="7.71428" rx="1.28571" stroke-width="1.28571"/>
                        </svg>
                    </div>
                    <div class="p-listing__actions__tab" data-tab="section-map">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5254 21.1775C9.55165 18.408 5.33337 12.8498 5.33337 9.15414C5.33337 5.57128 8.23815 2.6665 11.821 2.6665C15.4039 2.6665 18.3086 5.57128 18.3086 9.15414C18.3086 12.8546 14.0865 18.4096 12.1126 21.1831C11.9668 21.3881 11.6632 21.3801 11.5254 21.1775ZM11.8212 6.0355C10.0986 6.0355 8.70254 7.43157 8.70254 9.15414C8.70254 11.9237 12.0659 13.3188 14.0259 11.3589C15.9859 9.39966 14.5906 6.0355 11.8212 6.0355ZM13.5187 7.45669C12.01 5.94882 9.42118 7.02239 9.42118 9.15418C9.42118 11.286 12.0107 12.3595 13.5187 10.8517C14.4561 9.9142 14.4561 8.39405 13.5187 7.45669ZM11.6299 20.0974L11.8212 20.3615C13.6758 17.798 17.5909 12.4713 17.5909 9.15414C17.5909 5.96747 15.0078 3.3844 11.8212 3.3844C8.6345 3.3844 6.05143 5.96747 6.05143 9.15414C6.05143 12.396 9.81332 17.5888 11.6299 20.0974Z" stroke-width="0.5"/>
                        </svg>
                    </div>
                </div>
                <div class="inline-flex lg:hidden items-center gap-2 border border-solid rounded-lg border-[#E8E7E1] bg-white h-[var(--field-height-small)] px-3 box-border">
                    <div class="mobile-btn mobile-btn--map mobile-btn--active">
                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.52555 19.1775C4.55177 16.408 0.333496 10.8498 0.333496 7.15414C0.333496 3.57128 3.23828 0.666504 6.82113 0.666504C10.404 0.666504 13.3088 3.57128 13.3088 7.15414C13.3088 10.8546 9.08663 16.4096 7.11277 19.1831C6.96692 19.3881 6.66328 19.3801 6.52555 19.1775ZM6.82129 4.0355C5.09869 4.0355 3.70266 5.43157 3.70266 7.15414C3.70266 9.92367 7.06606 11.3188 9.02602 9.35886C10.986 7.39966 9.59077 4.0355 6.82129 4.0355ZM8.51878 5.45669C7.01009 3.94882 4.4213 5.02239 4.4213 7.15418C4.4213 9.28597 7.0108 10.3595 8.51878 8.85166C9.45623 7.9142 9.45623 6.39405 8.51878 5.45669ZM6.63007 18.0974L6.82129 18.3615C8.67596 15.798 12.591 10.4713 12.591 7.15414C12.591 3.96747 10.008 1.3844 6.82129 1.3844C3.63462 1.3844 1.05156 3.96747 1.05156 7.15414C1.05156 10.396 4.81344 15.5888 6.63007 18.0974Z" fill="#333333" stroke="#003C46" stroke-width="0.5"/>
                        </svg>
                        <span class="hidden m-mobile:inline-block text-sm font-[Roboto]">Mapa</span>
                    </div>
                    <div class="mobile-btn mobile-btn--list">
                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7038 0.25H3.29622C1.61427 0.25 0.25 1.6143 0.25 3.29739C0.25 4.97933 1.6143 6.3436 3.29622 6.3436H16.7038C18.3857 6.3436 19.75 4.9793 19.75 3.29739C19.75 1.6143 18.3857 0.25 16.7038 0.25ZM16.7038 5.12558H3.29622C2.28729 5.12558 1.46802 4.30632 1.46802 3.29739C1.46802 2.28731 2.28729 1.46919 3.29622 1.46919H16.7038C17.7127 1.46919 18.532 2.28731 18.532 3.29739C18.532 4.30632 17.7127 5.12558 16.7038 5.12558Z" fill="#333333"/>
                            <path d="M16.7038 8.17139H3.29622C1.61427 8.17139 0.25 9.53569 0.25 11.2188C0.25 12.9019 1.6143 14.2662 3.29622 14.2662H16.7038C18.3857 14.2662 19.75 12.9019 19.75 11.2188C19.75 9.53569 18.3857 8.17139 16.7038 8.17139ZM16.7038 13.047H3.29622C2.28729 13.047 1.46802 12.2288 1.46802 11.2188C1.46802 10.2087 2.28729 9.39058 3.29622 9.39058H16.7038C17.7127 9.39058 18.532 10.2087 18.532 11.2188C18.532 12.2288 17.7127 13.047 16.7038 13.047Z" fill="#333333"/>
                        </svg>
                        <span class="hidden m-mobile:inline-block text-sm font-[Roboto]">Lista</span>
                    </div>
                </div>
            </div>
            <div class="pb-10 mx-auto listing-section">
                <div id="section-listing-1" class="wishlist-list p-listing__results__section p-listing__results__section--active"></div>
                <div id="section-listing-2" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-listing__results__section md:gap-8"></div>
                <div id="section-map" class="p-listing__results__section">
                    <div class="relative w-full h-full">
                        <?php // @codingStandardsIgnoreStart ?>
                        <?= $this->element('maps/single', [
                            'id' => 'map-listing',
                            'popup_html_callback' => 'caixaMapPopup',
                            'map_defaults' => [
                                'scrollWheelZoom' => true,
                                'center' => [
                                    40.4380986,
                                    -3.8443431,
                                ],
                            ],
                            'markers' => []]); ?>
                        <?php // @codingStandardsIgnoreEnd ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-form-popup">
    <div class="contact-form-popup__inner">
        <?= $this->element('contact-form') ?>
    </div>
</div>
<script>
    const no_results_options = {
        title: 'Aún no tienes ningún favorito guardado',
        description: '<p>Comienza a buscar inmuebles según tus intereses.</p>',
        search_placeholder: '<?= __('Searching...') ?>',
        no_results_label: '<?= __('No Results') ?>',
        label: 'Provincia, ciudad o código postal',
    }
    const default_img = '<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'default_property_featured_photo') ?>';
    const properties_slug = '/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>';
</script>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
<?php endif; ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->html->script('/config.js'); ?>'
<?= $this->html->script('/general/js/routing.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->html->script('/caixa/js/wishlist.js'); ?>
<?= $this->html->script('/caixa/js/properties-common.js'); ?>
<?= $this->html->script('/caixa/js/contact-us-form.js'); ?>