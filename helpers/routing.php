<?php

require 'models/route.php';

session_start();

$route = new RouteV1();

$controller = $route->get_controller();

?>