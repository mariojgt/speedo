<?php

namespace Speedo\bootstrap;

interface middlewareInterface
{
    public function check(); // Check if the user is logged in or headers for example
    public function error(); // What to do if the user is not logged in or headt is false
}
