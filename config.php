<?php

/**
 * Used to store different static data.
 *
 * @var array
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