<?php

declare(strict_types=1);

$district_list = \App\Connector\Reports::propertyDistrictDropdownList();
$district_list_keys = [];
if (!empty($district_list)) {
    $district_list_keys = array_keys($district_list);
}

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-hero.webp'),
            'about_us_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-about-us.webp'),
            'info_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-info.webp'),
            'services_list' => [
                'service_icon' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-service-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-service-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-service-3.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-service-4.webp'),
                ],
                'service_title' => [
                    'a1' => 'PROPERTY MANAGEMENT',
                    'a2' => 'INVESTMENT POTENTIAL',
                    'a3' => 'LIST YOUR PROPERTY',
                    'a4' => 'DISCOVER THE AREA',
                ],
                'service_description' => [
                    'a1' => 'We are here to help, take advantage of our stellar property management services.',
                    'a2' => 'Need advice? Find out all the benefits of investing in prime properties in the area.',
                    'a3' => 'Access thousands of potential buyers, list your property with us for sale or rent.',
                    'a4' => 'Learn all there is to know and discover all the hidden gems of the location.',
                ],
                'service_url' => [
                    'a1' => '/',
                    'a2' => '/',
                    'a3' => '/',
                    'a4' => '/',
                ],
                'service_btn_label' => [
                    'a1' => 'LEARN MORE',
                    'a2' => 'LEARN MORE',
                    'a3' => 'LEARN MORE',
                    'a4' => 'LEARN MORE',
                ],
            ],
            'location_list' => [
                'location_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-location-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-location-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-location-3.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-location-4.webp'),
                ],
                'location_district' => [
                    'a1' => !empty($district_list_keys[0]) ? $district_list_keys[0] : 'Salerno',
                    'a2' => !empty($district_list_keys[1]) ? $district_list_keys[1] : 'Rome',
                    'a3' => !empty($district_list_keys[2]) ? $district_list_keys[2] : 'Milan',
                    'a4' => !empty($district_list_keys[3]) ? $district_list_keys[3] : 'Genoa',
                ],
                'location_btn_label' => [
                    'a1' => 'VIEW THE PROPERTIES',
                    'a2' => 'VIEW THE PROPERTIES',
                    'a3' => 'VIEW THE PROPERTIES',
                    'a4' => 'VIEW THE PROPERTIES',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'News',
        'page_slug' => 'news',
        'page_type' => 'blogs',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/blogs-hero.webp'),
        ],
    ],
    [
        'page_title' => 'The importance of powerful visuals in real estate',
        'page_slug' => 'the-importance-of-powerful-visuals-in-real-estate',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/blog-1-image.webp'),
            'blog_content' => '<p>In the world of real estate, powerful visuals play a significant role in captivating potential buyers and showcasing properties effectively. With the rise of social media platforms, real estate professionals have a powerful tool at their disposal to leverage visuals and reach a wider audience. In this blog post, we will explore the importance of visuals in real estate marketing. In addition, we will discuss effective strategies for leveraging social media platforms, and provide insights from authority real estate sites to support our findings.</p><h2>The Impact of Visuals in Real Estate Marketing</h2><p>When it comes to real estate marketing, visuals hold immense power. The psychology behind visual appeal in property listings is well-established. Powerful visuals and high quality&nbsp;<a href="https://qobrix.com/2019/08/01/video-content-real-estate/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">videos</a>&nbsp;have the ability to grab attention, create desire, and drive engagement. Buyers often form their initial impressions based on visuals, making them a crucial aspect of any successful marketing campaign. Furthermore, by showcasing visually appealing properties, real estate professionals can leave a lasting impact. In turn, this will attract potential buyers who are drawn to stunning visuals.</p><p>Powerful visuals are essential in catching a buyer’s attention in the competitive real estate market. Studies have consistently shown that listings with professional-quality photos receive higher engagement and generate more leads. These insights emphasize the need to prioritize visuals and leverage social media platforms to stand out in a crowded marketplace.</p><h2>Choosing the Right Social Media Platforms</h2><p>Selecting the appropriate&nbsp;<a href="https://qobrix.com/2022/12/12/social-media-for-real-estate-2/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">social media platforms</a>&nbsp;is essential for effective real estate marketing. Different platforms offer distinct features and cater to specific demographics. By understanding the preferences of your target audience, you can strategically choose platforms that align with your goals. For example,&nbsp;<a href="https://www.instagram.com/qobrix_crm/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">Instagram</a>&nbsp;and Pinterest are visual-centric platforms that work well for showcasing property images. LinkedIn and Facebook can provide opportunities for community engagement and networking. Choose powerful visuals and content and tailor them to the specific platform. This ensures maximum impact and engagement.</p>',
        ],
    ],
    [
        'page_title' => 'Property market forecast for 2023 and onwards',
        'page_slug' => 'property-market-forecast-for-2023-and-onwards',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/blog-2-image.webp'),
            'blog_content' => '<p>In early 2022, Europe’s economies began to bounce back from a two-year turmoil of corona virus lockdowns. Worldwide stock markets along with crypto currencies and properties, reached new heights and inflation rose significantly. A year later, supply chain disruptions due to coronavirus have lessened, however inflationary pressure continues to increase at a pick rate of 10%, as huge amounts of cash were injected into the economy during the pandemic. All these were made worse due to the war in Ukraine and the shifting of energy supplies at substantially higher prices. Increasing interest rates in an attempt to battle inflation is expected to result in a repricing of all asset markets, including real estate. This trend is expected to get a foothold within 2023 as alternative investments become more attractive than property due to higher risk-free rates.</p><p>The direction of the real estate market will be determined by the interaction of factors affecting property prices positively, such as population growth, rental increase and inelastic supply, versus the factors which affect property prices negatively, such as higher interest rates, higher construction costs and less disposable income.</p>',
        ],
    ],
    [
        'page_title' => 'Building permit changes this year',
        'page_slug' => 'building-permit-changes-this-year',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/blog-3-image.webp'),
            'blog_content' => '<p>In October 2022, there were 646 building permits issued with a total value of €203.7 million and a total area of 186.6 thousand square meters.</p><p>In the first ten months of 2022, there were 6,347 permits issued, a decrease of -4.9% compared to the same period in 2021. Also, the total value of permits remained steady, while the total area fell by -5.9% and the number of dwelling units declined by -4.6%. The construction of new homes in increased by 4.6%, but declined everywhere. The decline in building permits is attributed to the fact that the construction sector is facing challenges due to rising construction material prices, the impact of the war in Ukraine, and high inflation.</p><p>The 646 permits were authorized for following uses: residential (414 or 64%), non-residential (136), civil engineering (42), division of land plots (39), and road construction (15).</p>',
        ],
    ],
    [
        'page_title' => 'About',
        'page_slug' => 'about',
        'page_type' => 'about',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/about-hero.webp'),
            'about_team_image_1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/about-image-1.webp'),
            'about_team_image_2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/about-image-2.webp'),
            'about_content_1' => '<p>We are the best real estate agency around and an independent company established in 2020.  We provide services for rent and sale of high quality housing, we are engaged in investments, we assist in immigration and legal aspects, as well as in property management.</p><p>We can say safely that real estate is a passion for us, and seeing the happiness on the faces of our customers who believe and trust our recommendations is our reward.</p>',
            'about_content_2' => '<p>Our real estate is exclusively modern, with carefully selected properties to guarantee you comfort, convenience and safety. Our main goal is to be attentive to the wishes of each client to build a strong long-term relationship with them! We not only sell housing, but also strive to help our clients find their own cosy place and increase the amount of capital!</p><p>Our aim is to provide high quality properties suitable for both investment and personal living wit our dedicated and honest real estate consultants always available to support our customers. We want to be the first company that comes to your mind for quality, profitable real estate investment.</p><p>Over the years many of our customers have evolved from clients to friends, and this is reflected in our reviews, and the fact they return time and time again.</p>',
            'client_reviews_list' => [
                'client_name' => [
                    'a1' => 'Bob Smith',
                ],
                'client_location' => [
                    'a1' => 'Vera, Almería',
                ],
                'client_description' => [
                    'a1' => '<p>As an entrepreneur, I value the stability and continuity offered by Ramos Ballesta Holding. By renting an office with them, I have experienced impeccable service and an environment conducive to the growth of my business. Definitely, a smart choice in the real estate market.</p>',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Discover',
        'page_slug' => 'discover',
        'page_type' => 'discover',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/discover-hero.webp'),
            'discover_list' => [
                'discover_list_title' => [
                    'a1' => 'Explore & have fun',
                    'a2' => 'Relax & enjoy',
                    'a3' => 'Be adventurous',
                ],
                'discover_list_description' => [
                    'a1' => '<p>Explore Rome at your own pace by enjoying unique experiences. Discover the rich history and heritage, enjoy exquisite hospitality, and immerse yourself in a wealth of culture.</p><p>Seeking adventure? There are so many things to do, parks and museums to visit. Discover the breath-taking art and architecture of Vatican City with a local guide. In Rome, follow in the footsteps of the ancient Romans.</p>',
                    'a2' => '<p>Indulge in the perfect holiday experience. Stay in one of our selected hotels and enjoy access to world-class attractions.</p><p>Make the most of your time in the city that never sleeps on a guided tour of Rome’s top attractions.</p><p>Then hop aboard a one-trip Ferry ride for a sightseeing cruise past the Island, complete with stunning views of the world-famous skyline and  Bridge. See the highlights of  theCity on a guided tour Hear informative commentary on the history and people that shaped Rome Snap pics of historic antiquities.</p>',
                    'a3' => '<p>Rome, the “Eternal City,” brims with ancient history, from the Colosseum to the port of Ostia Antica to majestic Vatican City and the Sistine Chapel. Because of its history, art, architecture, and beauty – and perhaps its gelato and pasta! – Rome is one of our most popular cities.</p><p>Italy calls to people in a unique way. The rich and colorful culture melts into a warm atmosphere filled with light and life. Ancient traditions combine with a spiritual pride expressed in the art and food that epitomize what we have come to know as La Bella Vita</p>',
                ],
                'discover_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/discover-image-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/discover-image-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/discover-image-3.webp'),
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Wishlist',
        'page_slug' => 'wishlist',
        'page_type' => 'wishlist',
        'options' => [
            'featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-hero.webp'),
        ],
    ],
    [
        'page_title' => 'Contact',
        'page_slug' => 'contact',
        'page_type' => 'contact',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/contact-hero.webp'),
            'contact_form_title' => 'SEND US A MESSAGE',
            'contact_form_name' => 'Your Name',
            'contact_form_email' => 'Your Email',
            'contact_form_phone' => 'Your Phone',
            'contact_form_message' => 'Your Message(Optional)',
            'contact_form_btn' => 'Submit',
            'coordinates' => '47.367638,8.54174,16',
            'map_title' => 'HOW CAN WE HELP?',
            'map_description' => '<p>Thank you for considering us as to assist you with your property requirements.</p>',
        ],
    ],
    [
        'page_title' => 'Footer Component',
        'page_type' => 'components/footer',
        'options' => [
            'footer_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/footer-logo.webp'),
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_slug' => 'properties',
        'page_type' => 'properties',
        'options' => [
            'featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/home-hero.webp'),
        ],
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
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/privacy-hero.webp'),
            'cookie_content' => '<p><strong style="font-size: 1.5rem;">Strictly Necessary Cookies</strong></p><p><br></p><p>These cookies are essential for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use third-party cookies for various purposes including analytics and marketing. These cookies may track your browsing behavior on our website and may collect information such as your IP address, browser type, referring/exit pages, and operating system.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use Google Analytics to analyze the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website.</p><p><br></p><p><a href="https://policies.google.com/privacy" target="_blank">Google privacy policy</a></p><p><br></p><p><strong style="font-size: 1.5rem;">Google Tag Manager</strong></p><p>We use Google Tag Manager to manage website tags. These tags are used for tracking and analytics purposes. Google\'s privacy policy applies to Google </p><p><br></p><p><a href="https://www.google.com/analytics/tag-manager/use-policy/" target="_blank">Google Tag Manager policy</a></p><p></p>',
        ],
    ],
    [
        'page_title' => 'Privacy Policy',
        'page_slug' => 'privacy-policy',
        'page_type' => 'privacy_policy',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/privacy-hero.webp'),
            'privacy_content' => '<p><strong style="font-size: 1.5rem;">Introduction</strong></p><p><br></p><p>This privacy policy describes how we collect, protect and use the personally identifiable information you provide on our website.</p><p><br></p><p><strong style="font-size: 1.5rem;">Information Collection and Use</strong></p><p><br></p><p>We may collect personal information that you voluntarily provide to us when expressing an interest in obtaining information about us or when using our enquiry forms.</p><p><br></p><p>The personal information that we collect depends on the context of your interactions with us and the Website. The personal information we collect may include the following:</p><p><br></p><ul><li>Personal Information you provide to us, such as your name, email address, and other contact information.</li><li>Information automatically collected when you use the Website, which may include cookies, third party tracking technologies, and server logs.</li></ul><p><br></p><p><strong style="font-size: 1.5rem;">Security</strong></p><p><br></p><p>We are committed to securing your Personal Information and take reasonable precautions to protect it from unauthorized access, disclosure, alteration or destruction. However, please be aware that no method of transmission over the internet, or method of electronic storage is 100% secure and we are unable to guarantee the absolute security of the Personal Information we have collected from you.</p><p><br></p><p><strong style="font-size: 1.5rem;">Changes to This Policy</strong></p><p><br></p><p>We reserve the right to update or change our Policy at any time and you should check this Policy periodically. Your continued use of the Website after we post any modifications to the Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Policy.</p><p><br></p><p><strong style="font-size: 1.5rem;">Contact Us</strong></p><p><br></p><p>If you have any questions about this Policy, please contact us.</p>',
        ],
    ],
    [
        'page_title' => 'List a property',
        'page_type' => 'list_a_property',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Mansion') . 'webroot/images/default/list-a-property-hero.webp'),
        ],
    ],
];
