<?php

namespace Speedo\App\Controllers;

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
use Speedo\helpers\DB;
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

    function loadBlade($view, $viewPath = false, $data = array())
    {
        // echo $this->viewPath;
        if (isset($viewPath)) {
            $this->viewPath = $viewPath;
        }

        // This path needs to be array
        $FileViewFinder = new FileViewFinder(
            new Filesystem,
            array($this->viewPath)
        );

        // use blade instead of phpengine
        // pass in filesystem object and cache path
        $compiler = new BladeCompiler(new Filesystem(), 'src/views');
        $BladeEngine = new CompilerEngine($compiler);

        // create a dispatcher
        $dispatcher = new Dispatcher(new Container);

        // build the factory
        $factory = new Factory(
            new EngineResolver,
            $FileViewFinder,
            $dispatcher
        );

        // this path needs to be string
        $viewObj = new View(
            $factory,
            $BladeEngine,
            $view,
            $this->viewPath,
            $data
        );

        return $viewObj;
    }
}
