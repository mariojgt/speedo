<?php
// Boot the framework
require_once('src/bootstrap/bootstrap.php');
// Handle the routes
route($_SERVER['REQUEST_URI']);
