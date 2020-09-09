<?php

/**
 * Displays site name.
 */
function site_name()
{
    echo config('name');
}

/**
 * Displays site url provided in config.
 */
function site_url()
{
    echo config('site_url').config('project_uri').'/template/';
}

/**
 * Displays site version.
 */
function site_version()
{
    echo config('version');
}

/**
 * Displays batch name.
 */
function batch_name()
{
    echo config('batch');
}

/**
 * Displays trainer name.
 */
function trainer_name()
{
    echo config('trainer');
}

/**
 * Website navigation.
 */
function sidebar_menu($sep = ' -------------------------------- ')
{
    $sidebar_menu = '';
    $sidebar_items = config('sidebar_menu');
    
    foreach ($sidebar_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $uri ? ' active' : '';
		
		$url = config('site_url') . config('project_uri') . (config('pretty_uri') || $uri == '' ? '/' : '?page=') . $uri;
        			
		// Add nav item to list. See the dot in front of equal sign (.=)
        $sidebar_menu .= '<a href="' . $url . '">' . $name . '</a>' . $sep;
    }

    echo trim($sidebar_menu, $sep);
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'DevOps';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';

    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/404.phtml';
    }

    echo file_get_contents($path);
}

/**
 * Starts everything and displays the template.
 */
function init()
{
	require config('template_path') . '/template.php';
}
