<?php

require_once './include/admin_access_permission.php';

$registered_actions = array
(
    'fetchpage' => function () use ($args)
    {
        $page_name = $args->value;
        require './services/fetch_page.php';
    },

    'testdb' => function ()
    {
        require './services/db_test.php';
    },
);

?>