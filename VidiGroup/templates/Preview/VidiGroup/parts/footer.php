<div class="border-solid border-0 border-t border-[#dee7e9] xl:bg-[#f7f7f7] footer">
    <div class="px-10 xl:px-5 py-8 xl:py-4 flex flex-col-reverse xl:flex-row box-border justify-between text-[#687F82]">
        <div class="flex flex-col text-[15px] font-light xl:flex-row left-content">
            <?php $address = $site_data->get('address'); ?>
            <?php if (!empty($address)) : ?>
                <span class="mt-3.5 xl:mr-3 xl:pr-3 2xl:mr-5 2xl:pr-5 xl:mt-0 xl:border-solid xl:border-r-2 xl:border-0 xl:border-[#E2E2E2]"><?= $address ?></span>
            <?php endif; ?>
            <span class="mt-3.5 xl:mr-3 xl:pr-3 2xl:mr-5 2xl:pr-5 xl:mt-0 xl:border-solid xl:border-r-2 xl:border-0 xl:border-[#E2E2E2]">Tel: <?= $site_data->get('phone') ?></span>
            <span class="mt-3.5 xl:mr-3 xl:pr-3 2xl:mr-5 2xl:pr-5 xl:mt-0"><?= $site_data->get('email') ?></span>
        </div>
        <div class="text-[15px] mb-3.5 xl:mb-0 font-light left-content">
            &copy; <?= $site_data->get('site_title') ?> <script>
                document.write(new Date().getFullYear())
            </script>, all rights reserved.
        </div>
    </div>
</div>