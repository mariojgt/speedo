<?php

use Speedo\App\Controllers\HomeController;

return [
    '/index' => [
        'method'     => 'get',
        'class'      => HomeController::class,
        'function'   => 'index',
        'middleware' => 'web',
        'name_route' => 'home'
    ],
];
