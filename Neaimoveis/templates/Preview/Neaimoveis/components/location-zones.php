<?php $zones_districts = \App\Connector\Reports::propertyMappingDistrictList('locations'); ?>
<?php if (!empty($zones_districts)) { ?>
    <div class="section-wrapper">
        <div class="mt-10 bg-white rounded-2xl border border-solid border-slate-500 p-5 md:p-6 lg:p-7 xl:p-pl-12">
            <div class="grid grid-flow-row-dense gap-5 md:gap-6 lg:gap-7 xl:gap-10 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($zones_districts as $zone => $districts) : ?>
                    <div class="location-list">
                        <div class="location-list__item">
                            <div class="text-primary text-headingSm leading-[1.136] font-semibold mb-5 block">
                                <?= $zone ?>
                            </div>
                            <div class="location-list__item__areas list-wrapper">
                                <div class="my-[-5px]">
                                    <?php foreach ($districts as $district) : ?>
                                        <div class="my-[5px] grid grid-flow-row-dense grid-cols-[40px,1fr]">
                                            <a class="no-underline textColor hover:text-primary duration-300" href="<?= $this->Url->build(['_name' => 'properties', \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'), 'for_sale', '', $district]); ?>">
                                                <?= $district ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        const location_items = document.querySelectorAll('.location-list__item__label')
        location_items.forEach(location_item => {
            location_item.addEventListener('click', function() {
                this.closest('.location-list__item').classList.toggle('location-list__item--open')
            })
        })
    </script>
<?php } ?>