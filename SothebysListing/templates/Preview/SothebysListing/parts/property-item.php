<?php
$sale_rent = $property->getField('sale_rent');

$property_type = $property->getField('property_type');
?>
<a href='<?= $property->getUrl() ?>' class="property-item" id="<?= $property->getField('id'); ?>" data-sale-rent="<?= $property->getCustomSaleRent() ?>">
    <div class="property-item__inner">
        <div class="property-item__inner__row1">
            <div class="property-item__inner__row1__img">
                <img src="<?= $property->getFeaturedPhotoURL('medium') ?>" alt="property-image" loading="lazy" onerror="onError.call(this)"/>
            </div>
        </div>
        <div class="property-item__inner__row2">
            <div class="property-item__inner__row2__details">
                <div class="property-item__inner__row2__details__name"><?= $property->get('name') ?></div>
                <div class="property-item__inner__row2__details__address">
                    <div>
                        <svg width="12" height="14" viewBox="0 0 12 14" class="fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2175 13.5069L9.37178 9.60274C9.33496 9.52483 9.27119 9.46512 9.19461 9.43257L8.27642 9.02377L9.86745 6.35729C9.87123 6.35089 9.8748 6.34442 9.87823 6.33779C10.1946 5.7204 10.3549 5.05324 10.3549 4.35497C10.3549 3.1803 9.89433 2.07906 9.0579 1.25413C8.22161 0.429385 7.11365 -0.0160723 5.93832 0.000443303C4.79677 0.0162754 3.72194 0.474803 2.91177 1.29161C2.10169 2.10837 1.65182 3.18689 1.64505 4.32858C1.64089 5.02625 1.80575 5.721 2.12167 6.33777C2.12507 6.34436 2.12865 6.35086 2.13245 6.35727L3.72342 9.02377L2.79991 9.43474C2.72436 9.46834 2.66338 9.52791 2.62805 9.60267L0.782431 13.5069C0.720663 13.6375 0.746724 13.7927 0.847727 13.896C0.948709 13.9993 1.10325 14.0288 1.23525 13.9701L3.54737 12.9408L5.85951 13.9701C5.94895 14.0099 6.05105 14.0099 6.14051 13.9701L8.45268 12.9408L10.7648 13.9701C10.8099 13.9902 10.8578 14 10.9052 14C10.9963 14 11.0859 13.9639 11.1523 13.896C11.2532 13.7927 11.2793 13.6375 11.2175 13.5069ZM2.73166 6.01306C2.4656 5.48992 2.33247 4.92464 2.336 4.33271C2.3477 2.35222 3.96803 0.718683 5.94794 0.691256C6.93683 0.677967 7.86916 1.05216 8.57273 1.74607C9.27651 2.44014 9.66403 3.36665 9.66403 4.35499C9.66403 4.93902 9.53096 5.49678 9.26832 6.01306L6.29668 10.9936C6.20596 11.1457 6.05896 11.1621 6.00002 11.1621C5.941 11.1621 5.79405 11.1457 5.70335 10.9936L2.73166 6.01306ZM8.5931 12.2471C8.50364 12.2072 8.40151 12.2072 8.31205 12.2471L5.99994 13.2764L3.68782 12.2471C3.59837 12.2072 3.49625 12.2072 3.4068 12.2471L1.80506 12.9601L3.1979 10.0139L4.07995 9.62136L5.10994 11.3476C5.29872 11.664 5.63144 11.853 5.99989 11.853C6.36836 11.853 6.70107 11.664 6.88986 11.3476L7.91984 9.62136L8.80198 10.0141L10.1947 12.9601L8.5931 12.2471Z"/>
                            <path d="M6.00007 2.77832C5.13071 2.77832 4.42346 3.48557 4.42346 4.35491C4.42346 5.22425 5.13071 5.9315 6.00007 5.9315C6.8694 5.93152 7.57668 5.22425 7.57668 4.35491C7.57668 3.48557 6.8694 2.77832 6.00007 2.77832ZM6.00007 5.24063C5.51169 5.24065 5.11433 4.84335 5.11433 4.35491C5.11433 3.86652 5.51166 3.46919 6.00007 3.46919C6.48846 3.46919 6.88578 3.86652 6.88578 4.35491C6.88578 4.84329 6.48846 5.24063 6.00007 5.24063Z"/>
                        </svg>
                        <?= $property->getLocation()->get('district'); ?>
                    </div>
                    <?php $legacy_id = $property->getField('legacy_id'); ?>
                    <?php if (!empty($legacy_id)) { ?>
                        <div>
                            <span class="text-theme-secondary-color">ID</span><?= $legacy_id; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="property-item__inner__row3">
            <?php include __DIR__ . '/short-layout.php'; ?>
            <div class="property-item__inner__row3__price"><?= $property->getWebsitePrice(['default_value' => '--', 'plus_vat_class' => 'property-item__inner__row3__price__vat']) ?></div>
        </div>
    </div>
</a>