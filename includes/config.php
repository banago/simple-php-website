<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
		'name' => 'Assignment',
        'batch' => 'DevOps Fundamental Course Batch - 2',
		'trainer' => 'Khalid Bin Sattar',
        'site_url' => '',
		'pretty_uri' => false,
        'sidebar_menu' => [
			'' => 'Home',
            '9-9-2020' => '9 Sep, 2020(Tuesday)',
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v3.1',
		'project_uri' => '/DevSkill/Assignment-1/simple-php-website',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
