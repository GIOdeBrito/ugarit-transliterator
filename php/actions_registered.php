<?php

require_once './include/admin_access_permission.php';

$registered_actions = array
(
    'fetchpage' => function () use ($args)
    {
        require './services/fetch_page.php';
        fetch_page_request($args->value);
    },

    'testdb' => function ()
    {
        require './services/db_test.php';
    },
);

?>