<?php
/**
 * Used to store different static data.
 *
 * @var array
 */
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

/**
 * Displays site name. Uses $config global.
 */
function siteName()
{
    global $config;

    echo $config['name'];
}

/**
 * Displays site version. Uses $config global.
 */
function siteVersion()
{
    global $config;

    echo $config['version'];
}

/**
 * Website navigation. Uses $config global.
 */
function navMenu($sep = ' | ')
{
    global $config;

    $nav_manu = '';

    foreach ($config['nav_menu'] as $uri => $name) {
        $nav_manu .= '<a href="/'.($config['pretty_uri'] || $uri == '' ? '' : '?page=').$uri.'">'.$name.'</a>'.$sep;
    }

    echo trim($nav_manu, ' |');
}

/**
 * Displays page title. It takes the data from 
 * URL, it replaces the hyphens with spaces and 
 * it capitalizes the words.
 */
function pageTitle()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from 
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function pageContent()
{
    global $config;

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    $path = getcwd().'/'.$config['content_path'].'/'.$page.'.php';

    if (file_exists($path)) {
        include $path;
    } else {
        include $config['content_path'].'/404.php';
    }
}

/**
 * Starts everything and displays the template.
 * Uses $config global.
 */
function run()
{
    global $config;

    include $config['template_path'].'/template.php';
}
