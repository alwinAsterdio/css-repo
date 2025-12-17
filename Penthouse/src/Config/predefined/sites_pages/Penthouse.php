<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-primary-img.webp'),
            'primary_title' => 'Find your dream home on top of the world.',
            'about_us_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-about-us-img.webp'),
            'about_us_description' => '<p style="text-align: center;">Dedicated to offering true value, our personalised services provides you with unrivalled access to our vast New York network of experts who can help you navigate the ins and outs of the property and property investment market. As we firmly believe that communication, connectivity and passion for real estate define success, you’re in safe hands with us.</p><p style="text-align: center;"><br></p><p style="text-align: center;"><strong style="background-color: transparent;">Get in touch today.</strong></p>',
            'shortcut_links_list' => [
                'shortcut_title' => [
                    'a1' => 'Recently Listed',
                    'a2' => 'Property Services',
                    'a3' => 'Investment Advice',
                ],
                'shortcut_description' => [
                    'a1' => 'We bring you the very best of the latest properties available for sale or rent.',
                    'a2' => 'Take advantage of our stellar property management services, guaranteed to take the weight off your shoulders.',
                    'a3' => 'Find out all the benefits of investing in prime properties in the area.',
                ],
                'shortcut_url' => [
                    'a1' => '/properties?sale_rent=for_sale&sort=-website_listing_date',
                    'a2' => '/services',
                    'a3' => '/services',
                ],
                'shortcut_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-recently-added.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-property-services.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-investment-advice.webp'),
                ],
            ],
            'info_section_list' => [
                'info_section_title' => [
                    'a1' => 'Lifestyle',
                    'a2' => 'Quality of Service',
                ],
                'info_section_sub_title' => [
                    'a1' => 'THE ULTIMATE IN LOCATION & PRESTIGE',
                    'a2' => 'A TEAM THAT WILL ALLWAYS TAKE CARE OF YOU',
                ],
                'info_section_description' => [
                    'a1' => 'Our mission is to simplify your life and find the most prestigious properties for you to view.',
                    'a2' => 'We are dedicated to helping you find the right property that caters to your unique style and requirements. We leverage our prime network and local knowledge to ensure we meet your standards.',
                ],
                'info_section_btn_label' => [
                    'a1' => 'MORE',
                    'a2' => 'MORE',
                ],
                'info_section_btn_url' => [
                    'a1' => '',
                    'a2' => '',
                ],
                'info_section_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-info-section-1-img.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-info-section-2-img.webp'),
                ],
            ],
        ],
    ],
    [
        'page_title' => 'News',
        'page_slug' => 'news',
        'page_type' => 'blogs',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/blogs-primary-image.webp'),
        ],
    ],
    [
        'page_title' => 'The importance of powerful visuals in real estate',
        'page_slug' => 'the-importance-of-powerful-visuals-in-real-estate',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/blog-1-image.webp'),
            'blog_content' => '<p>In the world of real estate, powerful visuals play a significant role in captivating potential buyers and showcasing properties effectively. With the rise of social media platforms, real estate professionals have a powerful tool at their disposal to leverage visuals and reach a wider audience. In this blog post, we will explore the importance of visuals in real estate marketing. In addition, we will discuss effective strategies for leveraging social media platforms, and provide insights from authority real estate sites to support our findings.</p><h2>The Impact of Visuals in Real Estate Marketing</h2><p>When it comes to real estate marketing, visuals hold immense power. The psychology behind visual appeal in property listings is well-established. Powerful visuals and high quality&nbsp;<a href="https://qobrix.com/2019/08/01/video-content-real-estate/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">videos</a>&nbsp;have the ability to grab attention, create desire, and drive engagement. Buyers often form their initial impressions based on visuals, making them a crucial aspect of any successful marketing campaign. Furthermore, by showcasing visually appealing properties, real estate professionals can leave a lasting impact. In turn, this will attract potential buyers who are drawn to stunning visuals.</p><p>Powerful visuals are essential in catching a buyer’s attention in the competitive real estate market. Studies have consistently shown that listings with professional-quality photos receive higher engagement and generate more leads. These insights emphasize the need to prioritize visuals and leverage social media platforms to stand out in a crowded marketplace.</p><h2>Choosing the Right Social Media Platforms</h2><p>Selecting the appropriate&nbsp;<a href="https://qobrix.com/2022/12/12/social-media-for-real-estate-2/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">social media platforms</a>&nbsp;is essential for effective real estate marketing. Different platforms offer distinct features and cater to specific demographics. By understanding the preferences of your target audience, you can strategically choose platforms that align with your goals. For example,&nbsp;<a href="https://www.instagram.com/qobrix_crm/" target="_blank" style="color: rgb(137, 99, 58); background-color: initial;">Instagram</a>&nbsp;and Pinterest are visual-centric platforms that work well for showcasing property images. LinkedIn and Facebook can provide opportunities for community engagement and networking. Choose powerful visuals and content and tailor them to the specific platform. This ensures maximum impact and engagement.</p>',
        ],
    ],
    [
        'page_title' => 'Property market forecast for 2023 and onwards',
        'page_slug' => 'property-market-forecast-for-2023-and-onwards',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/blog-2-image.webp'),
            'blog_content' => '<p>In early 2022, Europe’s economies began to bounce back from a two-year turmoil of corona virus lockdowns. Worldwide stock markets along with crypto currencies and properties, reached new heights and inflation rose significantly. A year later, supply chain disruptions due to coronavirus have lessened, however inflationary pressure continues to increase at a pick rate of 10%, as huge amounts of cash were injected into the economy during the pandemic. All these were made worse due to the war in Ukraine and the shifting of energy supplies at substantially higher prices. Increasing interest rates in an attempt to battle inflation is expected to result in a repricing of all asset markets, including real estate. This trend is expected to get a foothold within 2023 as alternative investments become more attractive than property due to higher risk-free rates.</p><p>The direction of the real estate market will be determined by the interaction of factors affecting property prices positively, such as population growth, rental increase and inelastic supply, versus the factors which affect property prices negatively, such as higher interest rates, higher construction costs and less disposable income.</p>',
        ],
    ],
    [
        'page_title' => 'Building permit changes this year',
        'page_slug' => 'building-permit-changes-this-year',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/blog-3-image.webp'),
            'blog_content' => '<p>In October 2022, there were 646 building permits issued with a total value of €203.7 million and a total area of 186.6 thousand square meters.</p><p>In the first ten months of 2022, there were 6,347 permits issued, a decrease of -4.9% compared to the same period in 2021. Also, the total value of permits remained steady, while the total area fell by -5.9% and the number of dwelling units declined by -4.6%. The construction of new homes in increased by 4.6%, but declined everywhere. The decline in building permits is attributed to the fact that the construction sector is facing challenges due to rising construction material prices, the impact of the war in Ukraine, and high inflation.</p><p>The 646 permits were authorized for following uses: residential (414 or 64%), non-residential (136), civil engineering (42), division of land plots (39), and road construction (15).</p>',
        ],
    ],
    [
        'page_title' => 'SERVICES',
        'page_slug' => 'services',
        'page_type' => 'blog',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/blog-services-hero.webp'),
            'blog_content' => '<p>Property management comprises the daily oversight of residential, commercial, or industrial real estate by a third-party contractor. Generally, as property managers we take responsibility for day-to-day repairs and ongoing maintenance, security, and upkeep of our clients properties.</p><p><br></p><h2>Property Management</h2><p>Our experienced team can also assist you and advise you on all aspects of residential and commercial management including maintenance. The letting and management of residential property is a complex and detailed business requiring special skills, careful administration and a great deal of experience.</p><p><br></p><h2>Property Letting</h2><p>With a a number of stringent regulations to wade through, the services of a good property management company can help remove some of the stress and help guide you through the problems and pitfalls that can occur, when you decide to let a property.</p><p>With us you can feel safe in the knowledge that your interests are well and properly protected.</p>',
        ],
    ],
    [
        'page_title' => 'About',
        'page_slug' => 'about',
        'page_type' => 'about',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/about-us-primary-img.webp'),
            'about_team_image_1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/about-us-image-1.webp'),
            'about_team_image_2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/about-us-image-2.webp'),
            'about_content_1' => '<p>We are the best real estate agency around and an independent company established in 2020.  We provide services for rent and sale of high quality housing, we are engaged in investments, we assist in immigration and legal aspects, as well as in property management.</p><br/>
            <p>We can say safely that real estate is a passion for us, and seeing the happiness on the faces of our customers who believe and trust our recommendations is our reward.</p>',
            'about_content_2' => '<p>Our real estate is exclusively modern, with carefully selected properties to guarantee you comfort, convenience and safety. Our main goal is to be attentive to the wishes of each client to build a strong long-term relationship with them! We not only sell housing, but also strive to help our clients find their own cosy place and increase the amount of capital!</p><br/><p>Our aim is to provide high quality properties suitable for both investment and personal living wit our dedicated and honest real estate consultants always available to support our customers. We want to be the first company that comes to your mind for quality, profitable real estate investment.</p><br/>
            <p>Over the years many of our customers have evolved from clients to friends, and this is reflected in our reviews, and the fact they return time and time again.</p>',
        ],
    ],
    [
        'page_title' => 'Discover',
        'page_slug' => 'discover',
        'page_type' => 'discover',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-primary-img.webp'),
            'discover_list' => [
                'discover_list_title' => [
                    'a1' => 'Explore & have fun',
                    'a2' => 'Relax & enjoy',
                    'a3' => 'Be adventurous',
                    'a4' => 'Visit the great lady',
                ],
                'discover_list_description' => [
                    'a1' => '<p>Explore New York at your own pace by enjoying unique experiences. Discover the rich history and heritage, enjoy exquisite hospitality, and immerse yourself in a wealth of culture.</p><p><br></p><p>Seeking adventure? There are so many things to do, parks and museums to visit. Lets not forget all the shows on Broadway and for those that like to shop…</p>',
                    'a2' => '<p>Indulge in the perfect holiday experience. Stay in one of our selected hotels and enjoy access to world-class attractions.</p><p><br></p><p>Make the most of your time in the city that never sleeps on a guided tour of NYC’s top attractions.</p><p><br></p><p>Travel by both the Staten Island Ferry and bus as you swing by the 9/11 Memorial, Central Park, Rockefeller Center and more.</p><p><br></p>Then hop aboard a one-trip Ferry ride for a sightseeing cruise past the Statue of Liberty and Ellis Island, complete with stunning views of the world-famous skyline and Brooklyn Bridge. See the highlights of New York City on a guided tour Hear informative commentary on the history and people that shaped NYC Snap pics of Lady Liberty, Ellis Island, and the city skyline seen from the Staten Island Ferry View the 9/11 Memorial at <p>the former World Trade Center site. Finally visit the stunning Hudson Yards.</p>',
                    'a3' => '<p>Take a break from Manhattan’s major tourist zones on a day trip through Harlem, the Bronx, Queens, Brooklyn, and Coney Island. Avoid the hassle of planning logistics, and enjoy the views as your guide navigates the way through neighborhoods often missed by visitors.</p><p><br></p><p>Going with a guide also ensures you spot hidden landmarks and leave with an insider’s understanding of New York’s outer boroughs.</p><p><br></p><p>Get off the beaten track on a New York boroughs tour Visit Harlem, the Bronx, Queens, Brooklyn and Coney Island all in one day. Your guide does all the planning so you can sit back and relax See the Brooklyn Bridge, Apollo Theater, Yankee Stadium and more</p>',
                    'a4' => '<p>In a city where almost everything is iconic, Lady Liberty could just edge it as the icon of icons. Get up close and personal with Ellis Island and the Statue of Liberty on a tour that covers two NYC landmarks.</p><p><br></p><p>Listen to the live narration from your guide. Enjoy priority access to the ferry and get the best views of Manhattan as you cross New York Harbor by boat.</p><p><br></p><p>Our tip is to avoid the foam-crown-sporting masses and pre-book a combo cruise-and-tour ticket.</p><p><br></p><p>A climb to the crown – and why wouldn’t you? – affords a panoramic view of New York Harbor and the chance to see the literal nuts and bolts of Frédéric Auguste Bartholdi’s creation, which was given to the people of America by the people of France in 1886.</p>',
                ],
                'discover_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-image-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-image-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-image-3.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-image-4.webp'),
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Wishlist',
        'page_slug' => 'wishlist',
        'page_type' => 'wishlist',
        'options' => [
            'featured_photo' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/home-primary-img.webp'),
        ],
    ],
    [
        'page_title' => 'Contact',
        'page_slug' => 'contact',
        'page_type' => 'contact',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/contact-us-primary-image.webp'),
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
            'footer_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/footer-image.webp'),
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_slug' => 'properties',
        'page_type' => 'properties',
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
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-primary-img.webp'),
            'cookie_content' => '<p><strong style="font-size: 1.5rem;">Strictly Necessary Cookies</strong></p><p><br></p><p>These cookies are essential for the website to function properly. They enable basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use third-party cookies for various purposes including analytics and marketing. These cookies may track your browsing behavior on our website and may collect information such as your IP address, browser type, referring/exit pages, and operating system.</p><p><br></p><p><strong style="font-size: 1.5rem;">Google Analytics</strong></p><p><br></p><p>We use Google Analytics to analyze the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website.</p><p><br></p><p><a href="https://policies.google.com/privacy" target="_blank">Google privacy policy</a></p><p><br></p><p><strong style="font-size: 1.5rem;">Google Tag Manager</strong></p><p>We use Google Tag Manager to manage website tags. These tags are used for tracking and analytics purposes. Google\'s privacy policy applies to Google </p><p><br></p><p><a href="https://www.google.com/analytics/tag-manager/use-policy/" target="_blank">Google Tag Manager policy</a></p><p></p>',
        ],
    ],
    [
        'page_title' => 'Privacy Policy',
        'page_slug' => 'privacy-policy',
        'page_type' => 'privacy_policy',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/discover-primary-img.webp'),
            'privacy_content' => '<p><strong style="font-size: 1.5rem;">Introduction</strong></p><p><br></p><p>This privacy policy describes how we collect, protect and use the personally identifiable information you provide on our website.</p><p><br></p><p><strong style="font-size: 1.5rem;">Information Collection and Use</strong></p><p><br></p><p>We may collect personal information that you voluntarily provide to us when expressing an interest in obtaining information about us or when using our enquiry forms.</p><p><br></p><p>The personal information that we collect depends on the context of your interactions with us and the Website. The personal information we collect may include the following:</p><p><br></p><ul><li>Personal Information you provide to us, such as your name, email address, and other contact information.</li><li>Information automatically collected when you use the Website, which may include cookies, third party tracking technologies, and server logs.</li></ul><p><br></p><p><strong style="font-size: 1.5rem;">Security</strong></p><p><br></p><p>We are committed to securing your Personal Information and take reasonable precautions to protect it from unauthorized access, disclosure, alteration or destruction. However, please be aware that no method of transmission over the internet, or method of electronic storage is 100% secure and we are unable to guarantee the absolute security of the Personal Information we have collected from you.</p><p><br></p><p><strong style="font-size: 1.5rem;">Changes to This Policy</strong></p><p><br></p><p>We reserve the right to update or change our Policy at any time and you should check this Policy periodically. Your continued use of the Website after we post any modifications to the Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Policy.</p><p><br></p><p><strong style="font-size: 1.5rem;">Contact Us</strong></p><p><br></p><p>If you have any questions about this Policy, please contact us.</p>',
        ],
    ],
    [
        'page_title' => 'List a property',
        'page_slug' => 'list-a-property',
        'page_type' => 'list_a_property',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Penthouse') . 'webroot/images/default/list-a-property-hero.webp'),
        ],
    ],
];
