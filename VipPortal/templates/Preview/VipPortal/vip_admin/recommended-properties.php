<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-recommended-properties'); ?>

<?= $this->element('top-menu'); ?>
<?= $this->element('sidenav') ?>

<div class="va_content_wrapper py-5 px-6 md:px-10">
    <div>
        <div class="text-2xl leading-none font-bold"><?= $page_data_options['primary_title'] ?></div>
        <div class="text-theme-primary-color text-lg leading-none font-bold">
            <?= $page_data_options['primary_details'] ?>
        </div>
    </div>
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

    $property_data = \App\Connector\Property::searchProperties($query_params, $page, 15);

    if ($redirect_first_result && !empty($property_data['data'])) {
        $property = current($property_data['data']);
        $url = $property->getUrl();
        if (!empty($url)) {
            header('Location: ' . $url);
            exit;
        }
    }
    ?>

    <div class='properties-listing-section'>
        <?php if (!empty($property_data['data'])): ?>
            <div class="my-5 flex flex-wrap justify-end md:justify-between m-mobile:flex-row md:items-center gap-5 sort_container">
                <?php
                $field_details = [
                    'id' => 'sort',
                    'name' => 'sort',
                    'hide_label' => true,
                    'size' => 'small',
                    'label' => 'Sort By',
                    'default' => $query_params['sort'] ?? '-website_listing_date',
                    'options' => [
                        '-website_listing_date' => 'Recently Added',
                        'Properties.name' => 'Alphabetical Order',
                        '-Properties.created' => 'Newest to Oldest',
                        'Properties.created' => 'Oldest to Newest',
                        '-Properties.modified' => 'Recently Modified',
                        '-Properties.list_selling_price_amount' => 'Highest Selling Price to Lowest',
                        '-Properties.list_rental_price_amount' => 'Highest Rental Price to Lowest',
                        'Properties.list_selling_price_amount' => 'Lowest Selling Price to Highest',
                        'Properties.list_rental_price_amount' => 'Lowest Rental Price to Highest',
                    ],
                ];
                ?>
                <div class="hidden md:block w-64 select_placeholder_container relative z-10">
                    <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                </div>
                <div class="p-listing__actions__tabs">
                    <ul>
                        <li class="p-listing__actions__tab p-listing__actions__tab--active" data-tab="section-listing-1">
                            <svg viewBox="0 0 31 28">
                                <rect width="7" height="4" rx="2"></rect>
                                <rect width="7" height="4" y="8" rx="2"></rect>
                                <rect width="7" height="4" y="16" rx="2"></rect>
                                <rect width="7" height="4" x="12" rx="2"></rect>
                                <rect width="7" height="4" x="12" y="8" rx="2"></rect>
                                <rect width="7" height="4" x="12" y="16" rx="2"></rect>
                                <rect width="7" height="4" x="24" rx="2"></rect>
                                <rect width="7" height="4" x="24" y="8" rx="2"></rect>
                                <rect width="7" height="4" x="24" y="16" rx="2"></rect>
                                <rect width="7" height="4" y="24" rx="2"></rect>
                                <rect width="7" height="4" x="12" y="24" rx="2"></rect>
                                <rect width="7" height="4" x="24" y="24" rx="2"></rect>
                            </svg>
                        </li>
                        <li class="view-map-btn">
                            <svg viewBox="0 0 22 30">
                                <path
                                    d="M20.472 5.137C18.53 1.995 15.082.076 11.246.002a13 13 0 0 0-.492 0C6.919.076 3.47 1.995 1.528 5.137c-1.985 3.212-2.039 7.07-.145 10.32l7.933 13.616.011.018c.35.57.975.909 1.673.909s1.324-.34 1.673-.909l.01-.018 7.934-13.616c1.894-3.25 1.84-7.108-.145-10.32M11 13.594c-2.48 0-4.5-1.893-4.5-4.219S8.52 5.156 11 5.156s4.5 1.893 4.5 4.219-2.02 4.219-4.5 4.219">
                                </path>
                            </svg>
                        </li>
                        <li class="p-listing__actions__tab flex" data-tab="section-listing-2">
                            <svg viewBox="0 0 31 27">
                                <rect width="31" height="3" rx="1.5"></rect>
                                <rect width="31" height="3" y="8" rx="1.5"></rect>
                                <rect width="31" height="3" y="16" rx="1.5"></rect>
                                <rect width="31" height="3" y="24" rx="1.5"></rect>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-listing__results p-listing mt-5 mb-10 <?= empty($property_data['data']) ? 'hidden' : '' ?>">
                <div id="section-listing-1" class="p-listing__results__section p-listing__results__section--active">
                    <div class='grid gap-x-5 gap-y-10 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5'>
                        <?=$this->element('property-item', [ 'properties' => $property_data ]);?>
                    </div>
                </div>
                <div id="section-listing-2" class="p-listing__results__section">
                    <?= $this->element('property-list-sort-header') ?>
                    <?=$this->element('property-item-list', [ 'properties' => $property_data ]);?>
                </div>
            </div>
        <?php else: ?>
            <div class="w-full text-center text-3xl opacity-50">No Properties</div>
        <?php endif; ?>
    </div>
    <?php if (!empty($property_data['pagination']['count'])): ?>
        <div
            class="flex justify-center w-full py-5 qcf-search-pagination border-0 border-solid border-t border-[var(--border-light)]">
            <?= $this->element('pagination/pagination', ['pagination' => $property_data['pagination']]); ?>
        </div>
    <?php endif; ?>
    <div class="properties-map-section fixed top-0 left-0 w-full h-full hidden z-[999]">
        <div class="relative h-full w-full">
            <span
                class="close-map-btn inline-block h-[30px] absolute top-[10px] right-[20px] z-10 hover:cursor-pointer hover:scale-110 transition-all ease-linear">
                <div
                    class="h-full before:content-[''] before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:inline-block before:h-[20px] before:w-[20px] before:rounded-full before:bg-white z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full fill-theme-primary-color relative"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                </div>
            </span>
            <?php // @codingStandardsIgnoreStart ?>
            <?= $this->element('maps/single', [
                'id' => 'map-listing',
                'map_defaults' => [
                    'scrollWheelZoom' => true,
                ],
                'markers' => []
            ]); ?>
            <?php // @codingStandardsIgnoreEnd ?>
        </div>
    </div>
    <?php unset($query_params['sort']); ?>
    <script>
        var query_params = '<?= http_build_query($query_params ?: ['sale_rent' => \App\Utils\CommonFunctions::getQueryParam('sale_rent', '')]) ?>'
    </script>
</div>
</div>

<?= $this->element('footer') ?>
<?= $this->render('/Preview/general/footer'); ?>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/VipPortal/js/general.js'); ?>
<?= $this->html->script('/VipPortal/js/properties.js'); ?>
<?= $this->html->script('/VipPortal/js/properties-common.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if (default_listing_image) {
            this.onerror = null;
            this.src = default_listing_image;
        }
    }

    function addClassToSubMenu() {
        const subMenus = document.querySelectorAll('.va_sub_menu');
        subMenus.forEach(menu => {
            menu.classList.add('accordion_active');
        });
    }
    addClassToSubMenu();
    
    function addClassToCircleIndicator() {
        document.getElementById("circle_indicator_recommendedproperties").classList.add("circle_indicator_active");
    }
    addClassToCircleIndicator();
</script>