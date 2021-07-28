<?php
// Autoload the composer
require_once('vendor/autoload.php');

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\DebugClassLoader;

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
        $arrayConfig[$name] = include $dir . '/' . $config;
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


/**
 * All website routes pass in here first
 *
 * @param mixed $url
 *
 * @return [type]
 */
function route($url)
{
    Debug::enable();

    // Route files to load
    $dir            = 'src/routes';
    $scanned_routes = array_diff(scandir($dir), array('..', '.'));

    // Loop the files
    $arrayRoutes = [];
    foreach ($scanned_routes as $key => $config) {
        $name = str_replace('.php', '', $config);
        $arrayRoutes[$name] = include $dir . '/' . $config;
    }

    // Get the route we try to acess
    $routeRequest = str_replace(config()['app']['base_route'] . '/', '', $url);
    // Check if the get request is sending data
    if (str_contains($routeRequest, '?')) {
        $routeRequest = strstr($routeRequest, '?', true);
    }

    $canLoad = false;
    // Im here we check if the acess can continue
    foreach ($arrayRoutes as $key => $route) {
        foreach ($route as $name => $subroute) {
            if (!empty($arrayRoutes['web'][$routeRequest])) {
                // Load the controler in here based in the route
                $controller = $arrayRoutes['web'][$routeRequest];
            }
        }
    }
    // Url not found
    if (empty($controller)) {
        throw new Exception("Route Not found");
    }

    // Instanciate the class and acess the method
    $classToLoad = new $controller['class']();

    // Check if the request method match
    if (strtoupper($controller['method']) != $_SERVER['REQUEST_METHOD']) {
        throw new Exception("Route Method Don't match");
    }

    // Load the controller function in here
    $method      = $controller['function'];
    $classToLoad->$method();
}
