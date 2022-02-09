<?php
// Autoload the composer
require_once('vendor/autoload.php');

use Symfony\Component\ErrorHandler\Debug;
use Speedo\Helpers\Blade;

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
    // Enable the debug
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

    $canLoad    = false;
    $controller = null;

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
        return view('core.404');
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

/**
 * Render a blade file using this fuction, we call a helper similar to laravel
 *
 * @param mixed $view
 * @param null $data
 *
 * @return [type]
 */
function view($view, $data = [])
{
    // The path base where we keep the views
    $baseViewPath = config()['app']['base_view_path'];

    // Start the render class
    $blade = new Blade(
        $baseViewPath,
        'src/storage/cache/view'
    );
    // $baseViewPath, 'src/storage/cache/view'

    echo $blade->render($view, $data);
}
