<?php

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

    'getdictionaryword' => function () use ($args)
    {
        require './services/get_word_search.php';
    },

    // Register a word on admin page
    'insertword_admin' => function () use ($args)
    {
        require './services/admin/insert_word.php';
    },

    // Register a word on admin page
    'deleteword_admin' => function () use ($args)
    {
        require './services/admin/delete_word.php';
    },
);

?>