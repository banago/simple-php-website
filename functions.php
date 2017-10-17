<?php

class Functions
{

    private $configuration;

    public function __construct()
    {
        $this->configuration = new Configuration();

    }

    /**
     * Displays site name.
     */
    function siteName()
    {
        echo $this->configuration->config('name');
    }

    /**
     * Displays site version.
     */
    function siteVersion()
    {

        echo $this->configuration->config('version');
    }

    /**
     * Website navigation.
     */
    function navMenu($sep = ' | ')
    {
        $nav_menu = '';

        foreach ($this->configuration->config('nav_menu') as $uri => $name) {
            $nav_menu .= '<a href="/' . ($this->configuration->config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri . '">' . $name . '</a>' . $sep;
        }

        echo trim($nav_menu, $sep);
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
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        $path = getcwd() . '/' . $this->configuration->config('content_path') . '/' . $page . '.php';

        if (file_exists(filter_var($path, FILTER_SANITIZE_URL))) {
            include $path;
        } else {
            include $this->configuration->config('content_path') . '/404.php';
        }
    }

    /**
     * Starts everything and displays the template.
     */
    function run()
    {
        include $this->configuration->config('template_path') . '/template.php';
    }
}
