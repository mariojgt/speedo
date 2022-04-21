<?php

namespace Speedo\middleware;

// Import the middlewareInterface
use Speedo\bootstrap\middlewareInterface;

class web implements middlewareInterface
{
    /**
     * You middleware check in here
     * @return [type]
     */
    public function check()
    {
        // Check if the user is logged in
        // if (!isset($_SESSION['user'])) {
        //     // Redirect to the login page
        //     header('Location: /login');
        //     exit;
        // }
        return true;
    }

    public function error()
    {
        // Redirect to the login page
        header('Location: /login');
        exit;
    }
}
