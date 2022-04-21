<?php

namespace Speedo\App\Controllers;

// Start the database in here
use Speedo\helpers\DB;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 * in here we are first loading the database so we can use the models
 */
class BaseController
{
    public function __construct()
    {
        DB::startDb();
    }
}
