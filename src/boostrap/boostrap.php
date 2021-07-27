<?php
// Autoload the composer
require_once('vendor/autoload.php');

/**
 * For debug
 * @param mixed $data
 *
 * @return [type]
 */
function dd($data)
{
    echo '<hr><pre>';
    print_r($data);
    die('</pre><hr>');
}

/**
 * Load the configurations
 *
 * @return [type]
 */
function config()
{
    $dir    = 'src/config';
    $scanned_config = array_diff(scandir($dir), array('..', '.'));
    // Loop the files
    $arrayConfig = [];
    foreach ($scanned_config as $key => $config) {
        $name = str_replace('.php', '', $config);
        $arrayConfig[$name] = include $dir.'/'.$config;
    }
    return $arrayConfig;
}

/**
 * Make url
 * @param mixed $url
 *
 * @return [type]
 */
function url($url)
{
    return config()['app']['url'] . $url;
}

// Check this after
function route($url)
{
    $dir            = 'src/routes';
    $scanned_routes = array_diff(scandir($dir), array('..', '.'));

    // Loop the files
    $arrayRoutes = [];
    foreach ($scanned_routes as $key => $config) {
        $name = str_replace('.php', '', $config);
        $arrayRoutes[$name] = include $dir.'/'.$config;
    }

    // Get the route we try to acess
    $routeRequest = str_replace(config()['app']['base_route'].'/', '' , $url);

    if (empty($arrayRoutes['web'][$routeRequest])) {
        die('url not found');
    }
    // Load the controler in here based in the route
    $controller = $arrayRoutes['web'][$routeRequest];

    // Instanciate the class and acess the method
    $classToLoad = new $controller['class']();
    $method      = $controller['function'];
    $classToLoad->$method();
}
