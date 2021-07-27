<?php
    use Gate\App\Controllers\HomeController;

    return [
        '/index' => [
            'method'   => 'get',
            'class'    => HomeController::class,
            'function' => 'index'
        ]
    ];
