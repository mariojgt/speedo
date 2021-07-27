<?php

namespace Gate\App\Controllers;

// the required libs
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container as Container;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\View as View;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class HomeController extends BaseController
{
    public function index()
    {
        // create a template
        $r = $this->loadBlade('index', 'src/views/content/home.blade.php', [
            'home' => 'here'
        ]);
        // render the template
        echo $r->render();
    }
}
