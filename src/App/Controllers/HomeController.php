<?php

namespace Speedo\App\Controllers;

use Speedo\App\Models\User;
/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class HomeController extends BaseController
{
    public function index()
    {

        view('content.home', ['home' => 'Hellow i am a page']);
    }
}
