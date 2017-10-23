<?php

class Application
{

    private $configuration;

    public function __construct()
    {
        $this->configuration = new Configuration();

    }

    /**
     * Displays site name.
     */
    function getSiteName() : string
    {
        return $this->configuration->getConfiguration('name');
    }

    /**
     * Displays site version.
     */
    function getSiteVersion() : string
    {

        return $this->configuration->getConfiguration('version');
    }

    /**
     * Website navigation.
     */
    function getNavMenu() : array
    {
        $navigationItems = [];
        foreach ($this->configuration->getConfiguration('nav_menu') as $uri => $value) {
            $navigationItems[$uri] = $value;
        }

        return $navigationItems;
    }

    /**
     * Displays page title. It takes the data from
     * URL, it replaces the hyphens with spaces and
     * it capitalizes the words.
     */
    function getPageTitle() : string
    {
        $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';

        return ucwords(str_replace('-', ' ', $page));
    }

    /**
     * Displays page content. It takes the data from
     * the static pages inside the pages/ directory.
     * When not found, display the 404 error page.
     */
    function getPageContent() : string
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $path = getcwd() . '/' . $this->configuration->getConfiguration('content_path') . '/' . $page . '.phtml';

        if (!file_exists(filter_var($path, FILTER_SANITIZE_URL))) {
            $path = $this->configuration->getConfiguration('content_path') . '/404.phtml';
        }

        return file_get_contents($path, FILE_USE_INCLUDE_PATH);
    }
}
