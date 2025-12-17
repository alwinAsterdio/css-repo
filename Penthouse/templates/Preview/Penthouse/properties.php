<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Penthouse/css/tw-properties'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>
<div class="search-menu pt-[90px] md:pt-[75px] lg:pt-[90px] pb-5 md:pb-0 border-0 border-b border-solid border-b-gray-300">
    <?= \App\Utils\Search::render('advance-2', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6', 'mobile_filter' => true]); ?>
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

$property_data = \App\Connector\Property::searchProperties($query_params, $page, 12);

if ($redirect_first_result && !empty($property_data['data'])) {
    $property = current($property_data['data']);
    $url = $property->getUrl();
    if (!empty($url)) {
        header('Location: ' . $url);
        exit;
    }
}
?>
<div class='bg-white px-5 md:px-10 2xl:px-12 py-5 md:py-10 properties-listing-section'>
    <?php if (!empty($property_data['data'])) : ?>
        <div class="qcf-container inline-labels flex flex-wrap m-mobile:flex-row flex-col md:items-center gap-5">
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
                        'price_desc' => 'Price: High to Low',
                        'price_asc' => 'Price: Low to High',
                    ],
                ];
                ?>
            <div class="w-[170px] lg:w-[200px] order-2 m-mobile:order-1">
                <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
            </div>
            <div class="flex-1 order-3 md:order-2 text-sm lg:text-base">
                <?= $property_data['pagination']['paginationInfo'] ?>
            </div>
            <div class="order-1 m-mobile:order-2 md:order-3 inline-flex justify-center gap-2 items-center hover:cursor-pointer view-map-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] inline-block" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                <span class="text-base">View on the map</span>
            </div>
        </div>
        <div class='grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3'>
            <?php
            if (!empty($property_data['data'])) {
                foreach ($property_data['data'] as $property) :
                    include __DIR__ . '/components/property-item.php';
                endforeach;
            }
            ?>
        </div>
    <?php else : ?>
        <div class="w-full text-center text-theme-primary-color-darker text-3xl opacity-50">No Properties</div>
    <?php endif; ?>
</div>
<?php if (!empty($property_data['pagination']['count'])) : ?>
    <div class="flex justify-center w-full bg-white py-5 qcf-search-pagination">
        <?= $this->element('pagination/pagination', ['pagination' => $property_data['pagination']]); ?>
    </div>
<?php endif; ?>
<div class="properties-map-section fixed top-0 left-0 w-full h-full hidden z-[999]">
    <div class="relative h-full w-full">
        <span class="close-map-btn inline-block h-[30px] absolute top-[10px] right-[20px] z-10 hover:cursor-pointer hover:scale-110 transition-all ease-linear">
            <div class="h-full before:content-[''] before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:inline-block before:h-[20px] before:w-[20px] before:rounded-full before:bg-white z-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full fill-theme-primary-color relative" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
            </div>
        </span>
        <?php // @codingStandardsIgnoreStart ?>
        <?= $this->element('maps/single', [
            'id' => 'map-listing',
            'map_defaults' => [
                'scrollWheelZoom' => true,
            ],
            'markers' => []]); ?>
        <?php // @codingStandardsIgnoreEnd ?>
    </div>
</div>
<?php unset($query_params['sort']); ?>
<script>
    var query_params = '<?= http_build_query($query_params ?: ['sale_rent' => \App\Utils\CommonFunctions::getQueryParam('sale_rent', '')]) ?>'
</script>
<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/Penthouse/js/properties.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<script>
    var default_listing_image = '<?= \App\Utils\Media::getDefaultPropertyPhotoUrl(); ?>';
    function onError(event) {
        if( default_listing_image ){
            this.onerror = null;
            this.src = default_listing_image;
        }
    }
</script>
