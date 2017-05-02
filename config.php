<?php

/**
 * Used to store website configuration information.
 *
 * @var string
 */
function config($key = '')
{
    $config = [

        'name' => 'Simple PHP Website',

        'nav_menu' => [
            '' => 'Home',
            'about-us' => 'About Us',
            'products' => 'Products',
            'contact' => 'Contact',
        ],

        'template_path' => 'template',

        'content_path' => 'content',

        'pretty_uri' => true,

        'version' => 'v2.0',
    ];

    return $config[$key] ?: null;
}
