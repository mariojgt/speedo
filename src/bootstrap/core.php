<?php

namespace Speedo\bootstrap;

class core
{
    public static function scanRoutes($url)
    {
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

        return [
            'routes' => $arrayRoutes,
            'route'  => $routeRequest,
        ];
    }
}
