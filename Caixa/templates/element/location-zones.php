<?php $zones_districts = \App\Connector\Reports::propertyMappingDistrictList('locations'); ?>
<?php if (!empty($zones_districts)) { ?>
    <div class="px-5 pt-10 mb-3 lg:mb-8 text-2xl font-semibold lg:text-[28px] text-theme-primary-color lg:pt-[68px] lg:px-20">
        <?= $page_data_options['location_section_title'] ?>
    </div>
    <div class="location-list">
        <?php foreach ($zones_districts as $zone => $districts) : ?>
            <div class="location-list__item">
                <div class="location-list__item__label"><?= $zone ?></div>
                <div class="location-list__item__areas">
                    <div>
                        <?php foreach ($districts as $district) : ?>
                            <div><a class="no-underline text-[#333333]" href="<?= $this->Url->build(['_name' => 'properties', \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'), 'for_sale', '', $district]); ?>"><?= $district ?></a></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        const location_items = document.querySelectorAll('.location-list__item__label')
        location_items.forEach(location_item => {
            location_item.addEventListener('click', function(){
                this.closest('.location-list__item').classList.toggle('location-list__item--open')
            })
        })
    </script>
<?php } ?>
