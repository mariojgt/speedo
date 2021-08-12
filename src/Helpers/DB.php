<?php

namespace Speedo\Helpers;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class DB
{
    public static function startDb()
    {
        // Start the instance of the capslue
        $capsule = new Capsule;

        // Start the mysql conemtion
        $capsule->addConnection([
            'driver'    => config()['database']['driver'],
            'host'      => config()['database']['host'],
            'database'  => config()['database']['database'],
            'username'  => config()['database']['username'],
            'password'  => config()['database']['password'],
            'charset'   => config()['database']['charset'],
            'collation' => config()['database']['collation'],
            'prefix'    => config()['database']['prefix'],
        ]);

        // Make this Capsule instance available globally.
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM.
        $capsule->bootEloquent();
    }
}
