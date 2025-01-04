<?php

require_once 'helpers/router.php';

$router = new Router();

require 'routes/pages.php';
require 'routes/api.php';

$router->handle_request();

?>