<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Banner_Home.webp'),
            'partners_list' => [
                'partners_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_02.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_03.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_04.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_05.webp'),
                    'a5' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_06.webp'),
                    'a6' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/P_07.webp'),
                ],
                'partners_title' => [
                    'a1' => 'Rolex',
                    'a2' => 'Revolut',
                    'a3' => 'Emirates',
                    'a4' => 'Alphabet',
                    'a5' => 'Visa',
                    'a6' => 'Hyundai',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'About Us',
        'page_type' => 'about',
        'options' => [
            'gallery_column_one' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_1.webp'),
            'gallery_column_two_a' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_2a.webp'),
            'gallery_column_two_b' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_2b.webp'),
            'gallery_column_three' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_3.webp'),
            'gallery_column_four_a' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_4a.webp'),
            'gallery_column_four_b' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_4b.webp'),
            'gallery_column_five' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Gallery_5.webp'),
            'whyus_list' => [
                'whyus_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
                    'a4' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
                ],
                'whyus_title' => [
                    'a1' => 'Expert Guidance',
                    'a2' => 'Handpicked Properties',
                    'a3' => 'Personalized Service',
                    'a4' => 'Investment Opportunities',
                ],
                'whyus_details' => [
                    'a1' => 'Our experienced real estate consultants provide in-depth market knowledge and strategic advice.',
                    'a2' => 'We offer a carefully curated selection of modern, high-quality homes and investment properties.',
                    'a3' => 'We take the time to understand your needs and provide tailored solutions.',
                    'a4' => 'We help you grow your wealth with smart, profitable real estate investments.',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_type' => 'properties',
    ],
    [
        'page_title' => 'Properties Listing',
        'page_type' => 'propertieslisting',
    ],
    [
        'page_title' => 'Property',
        'page_type' => 'property',
        'options' => [
            'agent_email_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Footer_Icon_Mail.webp'),
            'agent_call_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Footer_Icon_Call.webp'),
        ],
    ],
    [
        'page_title' => 'Contact Us',
        'page_type' => 'contact',
        'options' => [
            'getintouch_email_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
            'getintouch_call_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
            'getintouch_whatsapp_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
            'getintouch_address_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Why_Us_Icon.webp'),
        ],
    ],
    [
        'page_title' => 'Pricing',
        'page_type' => 'pricing',
    ],
    [
        'page_title' => 'Add Listing',
        'page_type' => 'listing',
    ],
    [
        'page_title' => 'Services',
        'page_type' => 'services',
    ],
    [
        'page_title' => 'Our Services',
        'page_type' => 'components/services',
        'options' => [
            'services_list' => [
                'services_image' => [
                    'a1' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Service_01.webp'),
                    'a2' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Service_02.webp'),
                    'a3' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Service_03.webp'),
                ],
                'services_title' => [
                    'a1' => 'Buy and Sell Services',
                    'a2' => 'Valuation of Properties',
                    'a3' => 'Moving Services',
                ],
                'services_details' => [
                    'a1' => 'Secure and hassle-free property transactions with expert guidance and trusted agents.',
                    'a2' => 'Accurate, certified property valuations for sales, investments, financing, and legal needs.',
                    'a3' => 'Stress-free relocation with professional packing, transport, and settling-in support.',
                ],
                'services_description' => [
                    'a1' => '<p><b>Nea </b><b>Imoveis</b> makes buying and selling properties easy and secure by connecting buyers and sellers with trusted real estate agents and certified professionals.</p><br><p><strong>Buying Services</strong></p><br><ul><li>Wide selection of verified residential, commercial, and land properties.</li><li>Expert guidance and flexible financing options.</li></ul><br><p><strong>Selling Services</strong></p><br><ul><li>Free Listings – List properties for free.</li><li>Featured Listings – Boost visibility for 20,000 Kz.</li><li>Professional valuation and direct buyer communication.</li><li>2% commission on successful deals.</li></ul><br><p><strong>Why Nea Imoveis</strong></p><br><ul><li>Wide reach</li><li>Transparency</li><li>Fast and secure transactions</li></ul>',
                    'a2' => '<p>Nea Imoveis offers a Property Valuation Service conducted by certified valuators accredited by CMC Angola. The service provides accurate property assessments for buying, selling, financing, investment, insurance, and legal purposes.</p><br><p><strong>How It Works:</strong></p><br><ol><li>Request a Valuation – Submit a request through the platform.</li><li>Certified Valuator Assignment – A CMC-certified valuator is assigned.</li><li>On-Site Inspection – Property size, condition, location, and market data are evaluated.</li><li>Market Analysis and Report – A detailed report with market value and influencing factors is prepared.</li><li>Final Certification – A certified valuation report is issued.</li></ol><br><p><b>Why Choose Nea </b><b>Imoveis</b></p><br><ul><li>Certified by CMC Angola</li><li>Accurate and transparent assessments</li><li>Fast turnaround</li><li>Accepted by financial institutions</li></ul>',
                    'a3' => '<p>Nea Imoveis offers professional Moving Services for residential, office, and commercial relocations.</p><br><p><strong>Services Include:</strong></p><br><ul><li>Residential and Office Moves – Safe and efficient relocation.</li><li>Packing and Unpacking – Professional packing with quality materials.</li><li>Furniture Assembly/Disassembly – Handled by experts.</li><li>Local and Long-Distance Moves – Reliable transport and tracking.</li></ul><br><p><strong>Why Choose Nea Imoveis:</strong></p><br><ul><li>Experienced team</li><li>Affordable rates</li><li>Insurance coverage</li><li>Flexible scheduling</li></ul>',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Footer Component',
        'page_type' => 'components/footer',
        'options' => [
            'aboutus_email_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Footer_Icon_Mail.webp'),
            'aboutus_call_icon' => new \App\Utils\MediaUpload(\Cake\Core\Plugin::path('Neaimoveis') . 'webroot/images/default/Footer_Icon_Call.webp'),
        ],
    ],
];
