<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Request callback form - Component',
        'page_type' => 'components/request-call-back',
    ],
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'top_properties',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-main-image.webp'),
            'book_viewing_bg_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-book-your-viewing.webp'),
            'about_us_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-about-us.webp'),
            'location_city_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-location-icon.webp'),
            'international_realty_list' => [
                'int_realty_img' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/agent.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/experts.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/approach.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/portfolio.webp'),
                    'a5' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/inter-standards.webp'),
                    'a6' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/brand.webp'),
                ],
                'int_realty_title' => [
                    'a1' => 'Licensed Agents',
                    'a2' => 'Experts in real estate business',
                    'a3' => 'Comprehensive approach and support',
                    'a4' => 'Real estate portfolio management',
                    'a5' => 'International standards',
                    'a6' => 'Advantages of the brand',
                ],
                'int_realty_description' => [
                    'a1' => '<p>Registration No.: 1013 | License No.: 517/E. Our agents are local employees with financial and legal expertise in investments and guaranteed profitability.<p>',
                    'a2' => '<p>We offer the guidance of qualified specialists working in all segments of real estate – residential and commercial.</p>',
                    'a3' => '<p>Each of our clients receives a full range of services related to the purchase or sale of real estate - from a detailed analysis of available properties according to the client\'s criteria to the targeted selection of the best options.</p>',
                    'a4' => '<p>Clients of Cyprus Sotheby\'s International Realty can be sure that we carefully take into account all the nuances of the market and local legislation, as well as fully take over the management of their real estate portfolio.</p>',
                    'a5' => '<p>We work in accordance with strict international standards and focus on the active application of the world\'s best practices and modern methods of working with real estate.</p>',
                    'a6' => '<p>Cyprus Sotheby\'s International Realty has full access to the closed databases of Sotheby\'s International Realty. This allows our clients to choose real estate on exclusive terms.</p>',
                ],
            ],
            'footer_item_list' => [
                'footer_item_title' => [
                    'a1' => 'Countries & Territories',
                    'a2' => 'Offices Worldwide',
                    'a3' => 'Agents',
                    'a4' => 'Worldwide Sales',
                ],
                'footer_item_value' => [
                    'a1' => '84',
                    'a2' => '1.115',
                    'a3' => '26.500',
                    'a4' => '143 billion',
                ],
            ],
            'properties_status_list' => [
                'status' => [
                    'a1' => 'sold',
                ],
                'color' => [
                    'a1' => '#EB1515',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Property',
        'page_slug' => '/property',
        'page_type' => 'property',
        'options' => [
            'contact_us_section_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/property-contact-us.webp'),
        ],
    ],
    [
        'page_title' => 'Cookie Policy',
        'page_slug' => 'cookie-policy',
        'page_type' => 'cookie_policy',
        'options' => [
            'cookie_bg_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-book-your-viewing.webp'),
            'cookie_content' => '<p><strong style="font-size: 1.5rem;">Strictly Necessary Cookies</strong></p><p><br></p><p>These cookies are essential for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use third-party cookies for various purposes including analytics and marketing. These cookies may track your browsing behavior on our website and may collect information such as your IP address, browser type, referring/exit pages, and operating system.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use Google Analytics to analyze the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website.</p><p><br></p><p><a href="https://policies.google.com/privacy" target="_blank">Google privacy policy</a></p><p><br></p><p><strong style="font-size: 1.5rem;">Google Tag Manager</strong></p><p>We use Google Tag Manager to manage website tags. These tags are used for tracking and analytics purposes. Google\'s privacy policy applies to Google </p><p><br></p><p><a href="https://www.google.com/analytics/tag-manager/use-policy/" target="_blank">Google Tag Manager policy</a></p><p></p>',
        ],
    ],
    [
        'page_title' => 'Terms and Conditions',
        'page_slug' => 'privacy-policy',
        'page_type' => 'privacy_policy',
        'options' => [
            'privacy_bg_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/home-book-your-viewing.webp'),
            'privacy_content' => '<p><strong style="font-size: 1.5rem;">Introduction</strong></p><p><br></p><p>This privacy policy describes how we collect, protect and use the personally identifiable information you provide on our website.</p><p><br></p><p><strong style="font-size: 1.5rem;">Information Collection and Use</strong></p><p><br></p><p>We may collect personal information that you voluntarily provide to us when expressing an interest in obtaining information about us or when using our enquiry forms.</p><p><br></p><p>The personal information that we collect depends on the context of your interactions with us and the Website. The personal information we collect may include the following:</p><p><br></p><ul><li>Personal Information you provide to us, such as your name, email address, and other contact information.</li><li>Information automatically collected when you use the Website, which may include cookies, third party tracking technologies, and server logs.</li></ul><p><br></p><p><strong style="font-size: 1.5rem;">Security</strong></p><p><br></p><p>We are committed to securing your Personal Information and take reasonable precautions to protect it from unauthorized access, disclosure, alteration or destruction. However, please be aware that no method of transmission over the internet, or method of electronic storage is 100% secure and we are unable to guarantee the absolute security of the Personal Information we have collected from you.</p><p><br></p><p><strong style="font-size: 1.5rem;">Changes to This Policy</strong></p><p><br></p><p>We reserve the right to update or change our Policy at any time and you should check this Policy periodically. Your continued use of the Website after we post any modifications to the Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Policy.</p><p><br></p><p><strong style="font-size: 1.5rem;">Contact Us</strong></p><p><br></p><p>If you have any questions about this Policy, please contact us.</p>',
        ],
    ],
    [
        'page_title' => 'Thank you Page',
        'page_slug' => '/thank-you-page',
        'page_type' => 'thank-you',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Sothebys') . 'webroot/images/default/thank-you.webp'),
        ],
    ],
];
