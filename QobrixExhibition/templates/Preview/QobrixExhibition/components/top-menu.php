<div class="w-full">
    <div class="px-6">
        <div class="container max-w-screen-xl m-auto py-10">
            <div class="flex flex-nowrap items-center justify-between gap-5">
                <div style="max-width:<?= $site_data_options['logo_width_left'] ?>px">
                    <img src="<?= $site_data->getLogoUrl() ?>" alt="Qobrix" class="w-full h-auto block" />
                </div>
                <div style="max-width:<?= $site_data_options['logo_width_right'] ?>px">
                    <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'logo_right'); ?>" alt="Logo" class="w-full h-auto block" />
                </div>
            </div>
        </div>
    </div>
</div>