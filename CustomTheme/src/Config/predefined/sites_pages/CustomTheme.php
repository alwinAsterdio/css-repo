<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Sample Layout',
        'page_type' => 'html',
        'visibility' => 'private',
        'options' => [
            'html_content' => '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>{{PageTitle}}</title><style>body{font-family:Arial,sans-serif;margin:0;padding:0}header{background-color:#333;color:#fff;padding:10px;text-align:center}nav{display:flex;background-color:#444;padding:10px}nav a{color:#fff;text-decoration:none;padding:10px;margin:0 10px}.hero-container__image svg{height:200px;fill:gray}.hero-container{display:flex;justify-content:center;align-items:center;height:400px;background-color:#ddd}.hero-container img{max-width:100%;max-height:100%}.blog-container{padding:20px}.blog-post{margin-bottom:20px;border-bottom:1px solid #ddd;padding-bottom:20px}</style></head><body><header><h1>{{PageTitle}}</h1></header><nav> <a href="#">Home</a> <a href="#">About</a> <a href="#">Services</a> <a href="#">Contact</a> </nav><div class="hero-container"><div class="hero-container__image"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><pathd="M448 80c8.8 0 16 7.2 16 16V415.8l-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3V96c0-8.8 7.2-16 16-16H448zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" /></svg></div></div><div class="blog-container"><div class="blog-post"><h2>Sample Blog Post 1</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p></div><div class="blog-post"><h2>Sample Blog Post 2</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p></div><div class="blog-post"><h2>Sample Blog Post 3</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p></div></div></body></html>',
        ],
    ],
    [
        'page_title' => 'Sample Website',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'custom_template',
    ],
];
