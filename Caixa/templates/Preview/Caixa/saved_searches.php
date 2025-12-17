<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-saved_searches'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>
<?php
$page = 1;
if (isset($query_params['page'])) {
    $page = $query_params['page'] ?: 1;
    unset($query_params['page']);
}

if (empty($query_params['sale_rent'])) {
    $sale_rent = 'for_sale_and_rent';
} else {
    $sale_rent = $query_params['sale_rent'];
}

$savedSearchedData = \App\Connector\Opportunity::findSavedSearches(search: ['sale_rent' => $sale_rent], page: $page, limit: 12);
$total_items = $savedSearchedData['pagination']['count'] ?? 0;
?>
<div class="bg-[#FAFAF9] py-6 lg:pt-[40px] lg:pb-[80px]" data-num-saved="<?= $total_items ?>">
    <div class="container-section flex gap-6">
        <div class="min-w-[274px] hidden xl:block">
            <?= $this->element('login-user-menu'); ?>
        </div>
        <div class="flex-1">
            <div class="flex flex-col xl:flex-row xl:items-center">
                <div class="flex-1 inline-flex flex-col gap-[8px]">
                    <h4 class="text-2xl leading-7 font-normal my-0 text-theme-primary-color"><?= $page_data['page_title'] ?></h4>
                    <div class="text-[#333333] text-base font-normal font-[Roboto]">
                        <?= $page_data_options['sub_title'] ?> (<span class="wishlist-counter"><?= $total_items ?></span>)
                    </div>
                </div>
                <div>
                    <div class="flex flex-row flex-wrap gap-2 p-listing__actions__pagination inline-labels items-center flex-1  pt-[24px]">
                        <?php
                        $field_details = [
                            'id' => 'sale_rent',
                            'name' => 'sale_rent',
                            'hide_label' => true,
                            'size' => 'small',
                            'label' => 'Sort By',
                            'default' => $sale_rent,
                            'options' => [
                                'for_sale_and_rent' => 'Compra y alquiler',
                                'for_rent' => 'Alquiler',
                                'for_sale' => 'Compra',
                            ],
                        ];
                        ?>
                        <div class="w-[198px] md:w-[170px] lg:w-[200px]">
                            <?= \App\Utils\CustomFields::fieldSelect($field_details); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php
                    foreach ($savedSearchedData['data'] as $obj) :
                        echo $this->element('saved-search-item', ['item' => $obj]);
                    endforeach;
                    ?>
                </div>
                <?php if (!empty($savedSearchedData['pagination']['count'])) : ?>
                <div class="box-border flex flex-row items-center w-full my-5 bg-transparent c-pagination-section">
                    <div class="flex-1">
                        <?= $this->element('pagination/pagination', ['pagination' => $savedSearchedData['pagination'], 'pagination_options' => [ 'first_label' => '', 'last_label' => '', 'previous_label' => '<svg width="6" height="11" class="stroke-theme-primary-color" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 9.5L1 5.5L5 1.5" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>', 'next_label' => '<svg width="6" height="11" class="stroke-theme-primary-color" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 9.5L5 5.5L1 1.5" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
],
]); ?>
                    </div>
                    <div>
                        <?= sprintf('%1$d - %2$d de %3$d resultados', $savedSearchedData['pagination']['firstIndexRecord'], $savedSearchedData['pagination']['lastIndexRecord'], $savedSearchedData['pagination']['count']); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?php if (\App\Utils\IntegrationsTealium::isEnabled($site_data_options)) : ?>
    <?= $this->html->script('/caixa/js/tealium.js'); ?>
<?php endif; ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/caixa/js/saved_searches.js'); ?>
