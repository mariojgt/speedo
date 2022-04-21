<?php
// Autoload the composer
require_once('vendor/autoload.php');

use Symfony\Component\ErrorHandler\Debug;
use Speedo\helpers\Blade;
use Speedo\bootstrap\core;

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
    $finalUrl = config()['app']['url'] . $url;
    // Remove double //
    $finalUrl = str_replace('//', '/', $finalUrl);
    return $finalUrl;
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
    // Class that real all the routes in the routes folder
    $routesInfo   = core::scanRoutes($url);
    $arrayRoutes  = $routesInfo['routes'];
    $routeRequest = $routesInfo['route'];

    // COntroler information
    $controller   = null;
    // Middleware information
    $middleware  = null;

    // Im here we check if the acess can continue
    foreach ($arrayRoutes as $key => $route) {
        foreach ($route as $name => $subroute) {
            if (!empty($arrayRoutes['web'][$routeRequest])) {
                // Load the controler in here based in the route
                $controller = $arrayRoutes['web'][$routeRequest];
                // Instalciate the middleware class
                $middlewareClass = "Speedo\middleware\\" . $controller['middleware'];
                $middleware = new $middlewareClass();
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

    // CHeck the middleware first
    $middlewhereCheck = $middleware->check();
    if ($middlewhereCheck) {
        // Load the controller function in here
        $method      = $controller['function'];
        $classToLoad->$method();
    } else {
        return $middlewhereCheck->error();
    }
}

/**
 * Create a link of the route using the named route
 *
 * @param mixed $name named route
 *
 * @return string [routename]
 */
function routeName($routeName)
{
    $dir            = 'src/routes';
    $scanned_routes = array_diff(scandir($dir), array('..', '.'));

    // Loop the files
    $arrayRoutes = [];
    foreach ($scanned_routes as $key => $config) {
        $name = str_replace('.php', '', $config);
        $arrayRoutes[$name] = include $dir . '/' . $config;
    }
    $routeUrl = '';
    // Im here we check if the acess can continue
    foreach ($arrayRoutes as $key => $route) {
        foreach ($route as $name => $subroute) {
            if ($subroute['name_route'] == $routeName) {
                $routeUrl = url($name);
                // stop the loop
                break;
            }
        }
    }

    return $routeUrl;
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
