<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-primary-image.webp'),
            'team_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-get-to-know.webp'),
            'quality_section_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-quality-and-support.webp'),
            'memories_bg_img' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-build-memories.webp'),
            'luxury_list' => [
                'luxury_title' => [
                    'a1' => 'RECENTLY ADDED',
                    'a2' => 'LIST YOUR PROPERTY',
                    'a3' => 'INVEST IN PROPERTY',
                    'a4' => 'ABOUT THE AREA',
                ],
                'luxury_description' => [
                    'a1' => '<p>We bring you the very best of the latest properties available for sale or rent.</p>',
                    'a2' => '<p>List your property with us to benefit from our extensive and ever growing list of interested parties.</p>',
                    'a3' => '<p>Find out all the benefits of investing in prime properties in the area.</p>',
                    'a4' => '<p>Close proximity to the airport and other major cities place it perfectly. Find out more about all it has to offer.</p>',
                ],
                'luxury_icon' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-recently-added-icon.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-list-property-icon.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-invest-in-property-icon.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-about-the-area-icon.webp'),
                ],
                'luxury_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-recently-added.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-list-your-property.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-invest-in-property.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-about-the-area.webp'),
                ],
                'luxury_url' => [
                    'a1' => '/properties?sale_rent=for_sale&sort=-website_listing_date',
                    'a2' => '/list-a-property',
                    'a3' => '/properties/for_sale',
                    'a4' => '/discover',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_slug' => 'properties',
        'page_type' => 'properties',
        'options' => [
            'featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-primary-image.webp'),
        ],
    ],
    [
        'page_title' => 'Property',
        'page_slug' => 'property',
        'page_type' => 'property',
    ],
    [
        'page_title' => 'Footer Component',
        'page_type' => 'components/footer',

    ],
    [
        'page_title' => 'Contact',
        'page_slug' => 'contact',
        'page_type' => 'contact',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-contact-us-image.webp'),
        ],
    ],
    [
        'page_title' => 'List a property',
        'page_slug' => 'list-a-property',
        'page_type' => 'list_a_property',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/list-your-property-hero.webp'),
        ],
    ],
    [
        'page_title' => 'About',
        'page_slug' => 'about',
        'page_type' => 'about',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-about-us-image.webp'),
            'about_team_image_1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-about-our-team.webp'),
            'about_team_image_2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-about-our-team-2.webp'),
        ],
    ],
    [
        'page_title' => 'Wishlist',
        'page_slug' => 'wishlist',
        'page_type' => 'wishlist',
        'options' => [
            'featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-home-primary-image.webp'),
        ],
    ],
    [
        'page_title' => 'News',
        'page_slug' => 'news',
        'page_type' => 'blogs',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-blogs-primary-image.webp'),
        ],
    ],
    [
        'page_title' => 'Building Permit changes this year',
        'page_slug' => 'building-permit-changes-this-year',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-blog-1-image.webp'),
            'blog_content' => '<p>In October 2022, there were 646 building permits issued with a total value of €203.7 million and a total area of 186.6 thousand square meters.</p><p><br></p><p>In the first ten months of 2022, there were 6,347 permits issued, a decrease of -4.9% compared to the same period in 2021. Also, the total value of permits remained steady, while the total area fell by -5.9% and the number of dwelling units declined by -4.6%. The construction of new homes in increased by 4.6%, but declined everywhere. The decline in building permits is attributed to the fact that the construction sector is facing challenges due to rising construction material prices, the impact of the war in Ukraine, and high inflation.</p><p><br></p><p>The 646 permits were authorized for following uses: residential (414 or 64%), non-residential (136), civil engineering (42), division of land plots (39), and road construction (15).</p>',
        ],
    ],
    [
        'page_title' => 'Housing Loans Update – February 2023',
        'page_slug' => 'housing-loans-update-february-2023',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-blog-2-image.webp'),
            'blog_content' => '<p>Based on available loan options the estimated interest rates for mortgages on primary residences range from 3.50% to 4.00% for the local bank base rate and 4.30% to 4.80% for Euribor or European Central Bank base rate options.</p><p><br></p><p>It’s important to note that the local bank rate may initially appear more attractive, usually due to a lower margin for the bank. However, this rate is determined by the local bank using pre-approved methodologies that could be altered in the future, making it more susceptible to changes compared to Euribor or European Central Bank rates. Before 2013, local banks used to change interest rates at will.</p><p><br></p><p>On the other hand, the European Central Bank rate is less likely to change, as it only moves if the European Central Bank decides to do so or if the Euribor rate changes. This means it is beyond the control of local banks, who usually charge a higher margin. These rates are tied to the overall European economy and are considered less risky, giving borrowers peace of mind knowing the bank can’t alter it arbitrarily.</p>',
        ],
    ],
    [
        'page_title' => 'Property market forecast for 2023 and onwards',
        'page_slug' => 'property-market-forecast-for-2023-and-onwards',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-blog-3-image.webp'),
            'blog_content' => '<p>In early 2022, Europe’s economies began to bounce back from a two-year turmoil of corona virus lockdowns. Worldwide stock markets along with crypto currencies and properties, reached new heights and inflation rose significantly. A year later, supply chain disruptions due to coronavirus have lessened, however inflationary pressure continues to increase at a pick rate of 10%, as huge amounts of cash were injected into the economy during the pandemic. All these were made worse due to the war in Ukraine and the shifting of energy supplies at substantially higher prices. Increasing interest rates in an attempt to battle inflation is expected to result in a repricing of all asset markets, including real estate. This trend is expected to get a foothold within 2023 as alternative investments become more attractive than property due to higher risk-free rates.</p><p><br></p><p>The direction of the real estate market will be determined by the interaction of factors affecting property prices positively, such as population growth, rental increase and inelastic supply, versus the factors which affect property prices negatively, such as higher interest rates, higher construction costs and less disposable income.</p>',
        ],
    ],
    [
        'page_title' => 'Discover',
        'page_slug' => 'discover',
        'page_type' => 'discover',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-discover-primary-image.webp'),
            'discover_row_1_title' => 'A historic town',
            'discover_row_1_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-discover-1st-row-image.webp'),
            'discover_row_1_description' => '<p>A sense of awe will descend when you see the beauty of the old town, with its ancient city walls, baroque buildings and the shimmer of the Adriatic.</p><p><br></p><p>George Bernard Shaw was enchanted by this beautiful city, about which he said “those who seek paradise on Earth should come to Dubrovnik”, as well as, famously, describing it as “the pearl of the Adriatic”. It really is a stunning city with an amazing Old Town, which became a UNESCO World Heritage site in 1979.</p><p><br></p><p>The Old Town is also famous for Stradun (also known as Placa), the main thoroughfare – one of the greatest pleasures for many visitors is to have a drink in one of the nearby cafes and watch the world go by.</p>',

            'discover_row_2_title' => 'Charming beauty',
            'discover_row_2_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-discover-2nd-row-image.webp'),
            'discover_row_2_description' => '<p>If you visit only one thing when sightseeing in Dubrovnik, make it the Old Town walls! The city walls were originally constructed in the 10th century, although fortified considerably in 1453. They are 3m thick along the sea wall, and 6m thick inland. The Old Town has fortresses at its four corners, which are the Minceta Tower, Revelin Fortress, St John’s Fortress, and Bokar Bastion.</p><p><br></p><p>You can of course walk along the Old Town walls, and this is highly recommended during your time in Dubrovnik. You will be rewarded by some stunning views in all directions, over the Old Town and out to sea. Try to avoid the heat of the day in summer when the walls will be busy and the blazing sun will tire you out.</p>',

            'discover_row_3_title' => 'Nature nextdoor',
            'discover_row_3_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-discover-3rd-row-image.webp'),
            'discover_row_3_description' => '<p>Live on the beach, next to the lake or on one of the many mountain hills overseeing Larnaca bay. Traditional houses, old valley walks and natural landscape, combine with luxury properties, hotels and bars to cloud the boundaries between city and rural life.</p>',

            'discover_row_4_title' => 'Dine Out',
            'discover_row_4_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-discover-4th-row-image.webp'),
            'discover_row_4_description' => '<p>Traditional pubs, music bars, taverns, restaurants and gastro bars provide visitors and citizens with many dining possibilities. One thing for sure, your nights here will be most interesting.</p><p><br></p><p>Find many restaurants and bars with stunning vistas overlooking the Old Town harbour, a fantastic location.</p><p><br></p><p>Set amongst the rocks beyond the Old Town walls, you’ll find cafes&nbsp;and bars with a number of narrow levels. Find any free table and sit yourself down – you’ll soon get attended to by the quick staff. Get a beer or a glass of wine and look out to sea to watch the boats sail by.</p><p><br></p><p>The best time of day to come – unsurprisingly – is around sunset. Everyone else has the same idea, of course, so try and turn up a little early!</p>',
        ],
    ],
    [
        'page_title' => 'Cookies',
        'page_slug' => 'cookie-policy',
        'page_type' => 'cookie_policy',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-contact-us-image.webp'),
            'cookie_content' => '<p><strong style="font-size: 1.5rem;">Strictly Necessary Cookies</strong></p><p><br></p><p>These cookies are essential for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use third-party cookies for various purposes including analytics and marketing. These cookies may track your browsing behavior on our website and may collect information such as your IP address, browser type, referring/exit pages, and operating system.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use Google Analytics to analyze the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website.</p><p><br></p><p><a href="https://policies.google.com/privacy" target="_blank">Google privacy policy</a></p><p><br></p><p><strong style="font-size: 1.5rem;">Google Tag Manager</strong></p><p>We use Google Tag Manager to manage website tags. These tags are used for tracking and analytics purposes. Google\'s privacy policy applies to Google </p><p><br></p><p><a href="https://www.google.com/analytics/tag-manager/use-policy/" target="_blank">Google Tag Manager policy</a></p><p></p>',
        ],
    ],
    [
        'page_title' => 'Privacy',
        'page_slug' => 'privacy-policy',
        'page_type' => 'privacy_policy',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Villa') . 'webroot/images/default/villa-contact-us-image.webp'),
            'privacy_content' => '<p><strong style="font-size: 1.5rem;">Introduction</strong></p><p><br></p><p>This privacy policy describes how we collect, protect and use the personally identifiable information you provide on our website.</p><p><br></p><p><strong style="font-size: 1.5rem;">Information Collection and Use</strong></p><p><br></p><p>We may collect personal information that you voluntarily provide to us when expressing an interest in obtaining information about us or when using our enquiry forms.</p><p><br></p><p>The personal information that we collect depends on the context of your interactions with us and the Website. The personal information we collect may include the following:</p><p><br></p><ul><li>Personal Information you provide to us, such as your name, email address, and other contact information.</li><li>Information automatically collected when you use the Website, which may include cookies, third party tracking technologies, and server logs.</li></ul><p><br></p><p><strong style="font-size: 1.5rem;">Security</strong></p><p><br></p><p>We are committed to securing your Personal Information and take reasonable precautions to protect it from unauthorized access, disclosure, alteration or destruction. However, please be aware that no method of transmission over the internet, or method of electronic storage is 100% secure and we are unable to guarantee the absolute security of the Personal Information we have collected from you.</p><p><br></p><p><strong style="font-size: 1.5rem;">Changes to This Policy</strong></p><p><br></p><p>We reserve the right to update or change our Policy at any time and you should check this Policy periodically. Your continued use of the Website after we post any modifications to the Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Policy.</p><p><br></p><p><strong style="font-size: 1.5rem;">Contact Us</strong></p><p><br></p><p>If you have any questions about this Policy, please contact us.</p>',
        ],
    ],
];
