<?php

namespace Speedo\App\Controllers;

// Database
use Speedo\Helpers\DB;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class BaseController
{
    public function __construct()
    {
        DB::startDb();
    }
}
