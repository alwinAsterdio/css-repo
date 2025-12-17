<?php foreach ($properties['data'] as $property) { ?>
    <div class="w-full text-base">
        <div class="flex flex-col">
            <div class="relative z-0 bg-gray-400 rounded-2xl">
                <a href='<?= $property->getUrl(template_type: 'vip_admin/property') ?>' id="<?= $property->getField('id'); ?>"
                    class="block hover:opacity-80 transition-opacity">
                    <div class="aspect-video">

                    </div>
                    <img loading="lazy"
                        class="absolute top-0 left-0 object-cover w-full h-full cursor-pointer rounded-2xl opacity-100"
                        alt="<?= $property->get('name') ?>" src="<?= $property->getFeaturedPhotoURL('medium') ?>"
                        onerror="onError.call(this)" />

                    <div class="absolute right-2 bottom-2 text-xs font-light bg-white text-[var(--text-dark)] rounded-full px-2 py-1">
                        <span><?= $property->getField('ref') ?></span>
                    </div>
                </a>
                <div
                    class="hidden absolute z-10 right-4 top-4 w-6 h-6 p-1 flex items-center justify-center bg-[#0000004d] rounded-full box-border">
                    <div class="va_dropdown_action !h-full !w-full">
                        <span class="icon_container">
                            <svg viewBox="0 0 2 10" fit="" class="group h-full w-full fill-none">
                                <circle cx="1" cy="1" r="1"
                                    class="fill-white group-hover:fill-[var(--theme-primary-color)] duration-300"></circle>
                                <circle cx="1" cy="5" r="1"
                                    class="fill-white group-hover:fill-[var(--theme-primary-color)] duration-300"></circle>
                                <circle cx="1" cy="9" r="1"
                                    class="fill-white group-hover:fill-[var(--theme-primary-color)] duration-300"></circle>
                            </svg>
                        </span>
                        <div class="va_dropdown_action_menu">
                            <ul>
                                <li>
                                    <a href="/" class="">Favourite</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
<?php } ?>
