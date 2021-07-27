<?php

namespace Speedo\helpers;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class DB
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'database',
            'username'  => 'root',
            'password'  => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
    }
}
