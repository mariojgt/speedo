<?php
// Boot the framework
require_once('src/boostrap/boostrap.php');
// Handle the routes
route($_SERVER['REQUEST_URI']);
