<?php

class Configuration {

    /**
     * Used to store website configuration information.
     * @param string $key
     *
     * @return mixed
     */
    function getConfiguration(string $key)
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

        return isset($config[$key]) ? $config[$key] : null;
    }

}


