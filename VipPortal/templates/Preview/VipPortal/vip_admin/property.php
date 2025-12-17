<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-property'); ?>

<?= $this->element('top-menu'); ?>
<?= $this->element('sidenav'); ?>

<?php
$district = $property->getLocation()->get('district');
$municipality = $property->getLocation()->get('area');
$subarea = $property->getLocation()->get('subarea');
$street = $property->getField('street');
$address = implode(', ', array_filter([$district, $municipality]));

$sale_rent = $property->get('sale_rent');
if ($sale_rent === 'for_sale_and_rent') {
    $sale_rent = \App\Utils\CommonFunctions::getQueryParam('sale_rent', 'for_sale');
}
$property_type = $property->get('property_type');
$features_list = \App\Utils\Config::read('features/vip_portal/full.php');
if (empty($features_list[$sale_rent])) {
    return;
}
foreach ($features_list[$sale_rent] as $column_data) {
    if (isset($column_data['Details'])) {
        $details_column = $column_data['Details'];
    }
    if (isset($column_data['Areas'])) {
        $areas_column = $column_data['Areas'];
    }
    if (isset($column_data['Energy'])) {
        $energy_column = $column_data['Energy'];
    }
    if (isset($column_data['Features'])) {
        $features_column = $column_data['Features'];
    }
    if (isset($column_data['Further Features'])) {
        $further_features_column = $column_data['Further Features'];
    }
}
?>

<div class="va_content_wrapper">
    <div class="property-single-page property-item" id="<?= $property->get('id') ?>"
        data-sale-rent="<?= $property->getCustomSaleRent() ?>">

        <!-- Title -->
        <div
            class="sticky top-[73px] bg-white z-10 border-0 border-b border-solid border-[var(--border-light)] py-5 px-6 md:px-10">
            <div class="flex gap-4">
                <a href="#" class="back-link w-4 rotate-90">
                    <svg fill="none" viewBox="0 0 11 7" fit="" height="100%" width="100%">
                        <path stroke="var(--text-dark)" stroke-width="2" d="m1 1 4.5 4L10 1"></path>
                    </svg>
                </a>
                <div>
                    <div class="text-2xl leading-none font-bold"><?= $property->get('name') ?></div>
                    <div class="text-theme-primary-color text-lg leading-none font-bold"><?= $address ?></div>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div class="relative px-6 md:px-10 my-8">
            <?php echo $this->element('gallery', ['obj' => $property]); ?>
        </div>

        <!-- Description -->
        <div
            class="px-6 md:px-10 mb-8 pb-8 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-xs text-[#3F5877]">Short Description</div>
                <div class="text-sm"><?= $property->get('short_description') ?></div>
            </div>
            <div>
                <div class="text-xs text-[#3F5877]">Description</div>
                <div class="text-sm"><?= $property->getField('description') ?></div>
            </div>
        </div>

        <!-- Details -->
        <div
            class="px-6 md:px-10 mb-8 pb-8 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Details</div>
                <div class="text-theme-primary-color font-bold">The property's essential info</div>
            </div>
            <div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($details_column as $field_name): ?>
                    <?php
                    $field_value = $property->getField($field_name);
                    if (!empty($field_value)): ?>
                        <div>
                            <div class="text-xs text-[#3F5877]"><?= $property->getLabel($field_name); ?></div>
                            <div><?= $field_value; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Main Features -->
        <div
            class="px-6 md:px-10 mb-8 pb-8 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Main Features</div>
                <div class="text-theme-primary-color font-bold">Key features that define the property</div>
            </div>
            <div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($features_column as $field_name): ?>
                    <?php
                    $field_value = $property->getField($field_name);
                    if (!empty($field_value)): ?>
                        <div>
                            <div class="text-xs text-[#3F5877]"><?= $property->getLabel($field_name); ?></div>
                            <div><?= $field_value; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Areas -->
        <div
            class="px-6 md:px-10 mb-8 pb-8 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Areas</div>
                <div class="text-theme-primary-color font-bold">Measurements & technical information</div>
            </div>
            <div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($areas_column as $field_name): ?>
                    <?php
                    $field_value = $property->getField($field_name);
                    if (!empty($field_value)): ?>
                        <div>
                            <div class="text-xs text-[#3F5877]"><?= $property->getLabel($field_name); ?></div>
                            <div><?= $field_value; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Energy & Heating -->
        <div
            class="px-6 md:px-10 mb-8 pb-8 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Energy & Heating</div>
                <div class="text-theme-primary-color font-bold">Insulation, temperature and efficiency</div>
            </div>
            <div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($energy_column as $field_name): ?>
                    <?php
                    $field_value = $property->getField($field_name);
                    if (!empty($field_value)): ?>
                        <div>
                            <div class="text-xs text-[#3F5877]"><?= $property->getLabel($field_name); ?></div>
                            <div><?= $field_value; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Map -->
        <div
            class="grid gap-6 overflow-hidden px-6 md:px-10 mb-8 pb-8 relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Address</div>
                <div class="text-theme-primary-color font-bold">The location of the property</div>
            </div>
            <div class="flex flex-wrap w-full gap-5">
                <div class="w-full md:w-2/3">
                    <div class="box-border w-full overflow-hidden rounded-3xl">
                        <?php
                        $coordinates = $property->getField('coordinates');
                        $markers = [];
                        if (!empty($coordinates)) {
                            $markers = [
                                [
                                    'coordinates' => $coordinates,
                                    'popupDetails' => [
                                        'title' => $property->get('name'),
                                        'description' => $property->get('description'),
                                        'price' => [
                                            'label' => 'Starting From:',
                                            'value' => $property->getWebsitePrice(),
                                        ],
                                        'url' => $property->getUrl(template_type: 'vip_admin/property'),
                                        'image' => $property->getPhotoUrl('featured_photo', 'medium', true),
                                    ],
                                ],
                            ];
                        }
                        ?>
                        <?= $this->element('maps/single', ['markers' => $markers]); ?>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="text-sm grid gap-6">
                        <div>
                            <div class="text-xs text-[#3F5877]">Coordinates</div>
                            <div><?= $property->getField('coordinates', ['default_value' => '--']) ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">Street</div>
                            <div><?= $street ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">Post Code</div>
                            <div><?= $property->getField('post_code', ['default_value' => '--']) ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">Subarea</div>
                            <div><?= $subarea ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">Area</div>
                            <div><?= $municipality ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">District</div>
                            <div><?= $district ?></div>
                        </div>
                        <div>
                            <div class="text-xs text-[#3F5877]">Country</div>
                            <div><?= $property->getField('country', ['default_value' => '--']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Further Features -->
        <div
            class="grid gap-6 overflow-hidden px-6 md:px-10 mb-8 pb-8 relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
            <div>
                <div class="text-lg font-bold">Further Features</div>
                <div class="text-theme-primary-color font-bold">Features that add value to the property</div>
            </div>
            <div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($further_features_column as $field_name): ?>
                    <?php
                    $field_value = $property->getField($field_name); ?>
                    <div class="flex items-center gap-2">
                        <div
                            class="<?php echo $field_value ? 'further_features has_value' : 'further_features no_value'; ?>">
                            <div class="h-5 w-5">
                            </div>
                        </div>
                        <div><?= $property->getLabel($field_name); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Media -->
        <?php if ($page_data_options['display_property_media'] === 'on'): ?>
            <div class="px-6 md:px-10 mb-8 pb-8 md:pb-0 grid gap-6 overflow-hidden relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)]">
                <div>
                    <div class="text-2xl leading-none font-bold">Media</div>
                    <div class="text-theme-primary-color text-lg leading-none font-bold">Related files, images & documents</div>
                </div>
                <?php echo $this->element('media', ['obj' => $property]); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    const back_link_elm = document.querySelector('.back-link');
    if (back_link_elm !== null) {
        const back_url = document.referrer
        if (back_url) {
            back_link_elm.href = back_url
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        function updateSVG(element) {
            const innerDiv = element.querySelector('div');
            innerDiv.innerHTML = '<svg fill="none" viewBox="0 0 24 24" height="100%" width="100%"><circle cx="12" cy="12" r="10.539" stroke="var(--border-color)" stroke-width="2"></circle><path fill="var(--theme-primary-color)" d="M18 11v2H6v-2z"></path></svg>';
            if (element.classList.contains('has_value')) {
                innerDiv.innerHTML = '<svg fill="none" viewBox="0 0 24 24" height="100%" width="100%"><circle cx="12" cy="12" r="10.539" stroke="var(--border-color)" stroke-width="2"></circle><path stroke="var(--theme-primary-color)" stroke-width="2" d="m6.615 10.988 4.17 4.858 6.6-7.692" class="svg-color-3-stroke"></path></svg>';
            }
        }
        const featureSections = document.querySelectorAll('.further_features');
        featureSections.forEach(updateSVG);
    });

</script>

<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->html->script('/VipPortal/js/general.js'); ?>