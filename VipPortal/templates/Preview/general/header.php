<!DOCTYPE html>
<html lang="<?= \Locale::getPrimaryLanguage(Locale::getDefault()) ?>">
<head>
    <?php
    if ($gdpr_details['is_enabled']) {
        if ($gdpr_details['integrations']['third-party']) {
            \App\Utils\IntegrationsGtm::loadInHead($site_data_options);
        }
    } else {
        \App\Utils\IntegrationsGtm::loadInHead($site_data_options);
    }
    ?>
    <meta charset="UTF-8" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=1" />
    <?= \App\Utils\HtmlTags::printTags(); ?>
    <style><?= \App\Utils\Theme::styles($site_data); ?></style>
    <?php if (!empty($site_data_options['favicon'])) { ?>
        <link rel="icon" href="<?= $this->Url->build(['_name' => 'file_download', 'media_id' => $site_data_options['favicon']]); ?>"/>
        <link rel="apple-touch-icon" href="<?= $this->Url->build(['_name' => 'file_download', 'media_id' => $site_data_options['favicon']]); ?>"/>
        <meta name="msapplication-TileImage" content="<?= $this->Url->build(['_name' => 'file_download', 'media_id' => $site_data_options['favicon']]); ?>"/>
    <?php } else { ?>
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico"/>
        <link rel="apple-touch-icon" href="/img/favicon.ico"/>
        <meta name="msapplication-TileImage" content="/img/favicon.ico"/>
    <?php } ?>
</head>
<body class="body-<?= $body_class ?? '' ?>">
<?php
if ($gdpr_details['is_enabled']) {
    if ($gdpr_details['integrations']['third-party']) {
        \App\Utils\IntegrationsGa::load($site_data_options);
        \App\Utils\IntegrationsGtm::loadInBody($site_data_options);
    }
} else {
    \App\Utils\IntegrationsGa::load($site_data_options);
    \App\Utils\IntegrationsGtm::loadInBody($site_data_options);
}
?>
