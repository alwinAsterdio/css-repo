<?php
ob_start();
\App\Utils\IntegrationsGtm::loadInHead($site_data_options);
\App\Utils\IntegrationsRecaptchav3::load($site_data_options);
\App\Utils\IntegrationsGa::load($site_data_options);
\App\Utils\IntegrationsGtm::loadInBody($site_data_options);
$scripts_in_head = ob_get_clean();

$html = \App\Utils\CustomTemplates::loadHtml($page_data_options['template'], [
    'site_data' => $site_data,
    'site_data_options' => $site_data_options,
    'page_data' => $page_data,
    'page_data_options' => $page_data_options,
]);

if (!empty($scripts_in_head)) {
    if (strpos('</head>', $html) === false) {
        $html = str_replace('</head>', $scripts_in_head . '</head>', $html);
    } else {
        $html .= $scripts_in_head;
    }
}

echo $html;
