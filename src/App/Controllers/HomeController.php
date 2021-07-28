<?php

namespace Speedo\App\Controllers;

use Speedo\App\Models\User;
use Speedo\Helpers\Request;
/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class HomeController extends BaseController
{
    public function index()
    {
        $request = new Request();
        dd($request->all());
        $data = [
            'mariojgt' => 'ere'
        ];

        // Create a template
        $r = $this->loadBlade('index', 'src/views/content/home.blade.php', [
            'home' => 'here'
        ]);

        // Render the template
        echo $r->render();
    }
}
