<?php

require_once './include/admin_access_permission.php';

$registered_actions = array
(
    'fetchpage' => function () use ($args)
    {
        require_once './services/fetch_page.php';
        fetch_page_request($args->value);
    },
);

?>