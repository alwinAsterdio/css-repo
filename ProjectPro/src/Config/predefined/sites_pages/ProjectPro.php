<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'project',
    ],
    [
        'page_title' => 'Property',
        'page_slug' => 'property',
        'page_type' => 'property',
    ],
    [
        'page_title' => 'Cookie Policy',
        'page_slug' => 'cookie-policy',
        'page_type' => 'cookie_policy',
        'options' => [
            'cookie_content' => '<p><strong style="font-size: 1.5rem;">Strictly Necessary Cookies</strong></p><p><br></p><p>These cookies are essential for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use third-party cookies for various purposes including analytics and marketing. These cookies may track your browsing behavior on our website and may collect information such as your IP address, browser type, referring/exit pages, and operating system.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use Google Analytics to analyze the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website.</p><p><br></p><p><a href="https://policies.google.com/privacy" target="_blank">Google privacy policy</a></p><p><br></p><p><strong style="font-size: 1.5rem;">Google Tag Manager</strong></p><p>We use Google Tag Manager to manage website tags. These tags are used for tracking and analytics purposes. Google\'s privacy policy applies to Google </p><p><br></p><p><a href="https://www.google.com/analytics/tag-manager/use-policy/" target="_blank">Google Tag Manager policy</a></p><p></p>',
        ],
    ],
];
