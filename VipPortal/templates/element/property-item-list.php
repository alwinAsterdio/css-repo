<?php foreach ($properties['data'] as $property) { ?>
    <?php
    $district = $property->getLocation()->get('district');
    $municipality = $property->getLocation()->get('area');
    $address = implode(', ', array_filter([$district, $municipality]));
    ?>
    <a href='<?= $property->getUrl(template_type: 'vip_admin/property') ?>' id="<?= $property->getField('id'); ?>"
        class="no-underline text-[var(--text-dark)] hover:bg-[var(--border-color)]">
        <div
            class="grid grid-cols-1 md:grid-cols-9 items-center gap-2 text-sm leading-tight py-2.5 relative after:content-[''] after:block after:h-px after:w-full after:absolute after:left-0 after:bottom-0 after:bg-[linear-gradient(90deg,_#CED9E800_.25%,_#CED9E899_13.13%)] hover:bg-slate-50 duration-300">
            <div class="group hidden md:block aspect-video w-16 relative transition-opacity">
                <img loading="lazy" class="absolute top-0 left-0 object-cover w-full h-full cursor-pointer rounded-lg"
                    alt="<?= $property->get('name') ?>" src="<?= $property->getFeaturedPhotoURL('medium') ?>"
                    onerror="onError.call(this)" />
                <div
                    class="hidden group-hover:block w-60 bg-white p-3 absolute z-10 -right-64 top-1/2 -translate-y-1/2 shadow-md rounded-lg">
                    <div class="w-full text-base">
                        <div class="flex flex-col">
                            <div class="relative z-0 bg-gray-400 rounded-2xl">
                                <div class="block relative">
                                    <div class="aspect-video">
                                    </div>
                                    <img loading="lazy"
                                        class="absolute top-0 left-0 object-cover w-full h-full cursor-pointer rounded-2xl opacity-100"
                                        alt="<?= $property->get('name') ?>"
                                        src="<?= $property->getFeaturedPhotoURL('medium') ?>"
                                        onerror="onError.call(this)" />
                                    <div
                                        class="absolute right-2 bottom-2 text-xs font-light bg-white rounded-full px-2 py-1">
                                        #<span><?= $property->getField('ref') ?></span></div>
                                </div>
                            </div>
                            <div class="flex flex-col mt-4">
                                <div class="font-bold line-clamp-1 text-base text-theme-primary-color">
                                    <span><?= $property->getWebsitePrice(['default_value' => '--']) ?>&nbsp;</span>
                                    <span
                                        class="font-bold text-xs leading-tight text-[var(--text-light)]"><?= $property->getField('sale_rent') ?></span>
                                </div>
                                <div class="font-bold line-clamp-1 text-[var(--text-dark)]">
                                    <?= $property->get('name') ?>
                                </div>
                                <ul
                                    class="property_feature_listing m-0 p-0 flex no-wrap text-sm font-bold tracking-wider line-clamp-1 text-[var(--text-light)]">
                                    <?php if ($property->getField('bedrooms')) : ?>
                                        <li class="flex no-wrap items-center gap-1 relative">
                                            <span><?= $property->getField('bedrooms') ?></span>Beds
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($property->getField('bathrooms')) : ?>
                                        <li class="flex no-wrap items-center gap-1 relative">
                                            <span><?= $property->getField('bathrooms') ?></span>Baths
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($property->getField('internal_area_amount')) : ?>
                                        <li class="flex no-wrap items-center gap-1 relative">
                                            <span><?= $property->getField('internal_area_amount') ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="line-clamp-1 text-sm text-[var(--text-light)]"><?= $address ?></div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 -left-2.5 border-solid border-t-8 border-b-8 border-r-8 border-transparent border-r-white">
                    </div>
                </div>
            </div>
            <div>
                <div class="font-bold inline-block md:hidden">Property Type: </div>
                <?= !empty($property->getField('property_type')) ? $property->getField('property_type') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Location: </div>
                <?= !empty($property->getField('Properties.location')) ? $property->getField('Properties.location') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Listing Selling Price: </div>
                <?= !empty($property->getField('list_selling_price_amount')) ? $property->getField('list_selling_price_amount') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Listing Rental Price: </div>
                <?= !empty($property->getField('list_rental_price_amount')) ? $property->getField('list_rental_price_amount') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Bedrooms: </div>
                <?= !empty($property->getField('bedrooms')) ? $property->getField('bedrooms') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Bathrooms: </div>
                <?= !empty($property->getField('bathrooms')) ? $property->getField('bathrooms') : '--' ?>
            </div>
            <div class="md:text-center">
                <div class="font-bold inline-block md:hidden">Status: </div>
                <?= !empty($property->getField('status')) ? $property->getField('status') : '--' ?>
            </div>
            <div class="md:text-right">
                <div class="font-bold inline-block md:hidden">Total Area: </div>
                <?= !empty($property->getField('total_area_amount')) ? $property->getField('total_area_amount') : '--' ?>
            </div>
        </div>
    </a>
<?php } ?>