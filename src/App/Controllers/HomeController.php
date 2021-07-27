<?php

namespace Speedo\App\Controllers;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'mariojgt' => 'ere'
        ];

        // Create a template
        $r = $this->loadBlade('index', 'src/views/content/home.blade.php', [
            'home' => 'here'
        ]);

        // render the template
        echo $r->render();
    }
}
