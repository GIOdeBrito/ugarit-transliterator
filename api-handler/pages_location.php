<?php

/* Page location script */

$page_param = strtolower($_GET['page'] ?? 'HOME');

$page_settings = array();
$page_settings['HEAD'] = './api-handler/components/page_header.php';

/* Website pages */
$_pages = array
(
    'home' => function () use ($page_settings)
    {
        $page_settings['TITLE'] = 'Home';
        $page_settings['MAINHTML'] = './api-handler/components/page_body.php';
        return $page_settings;
    },

    'transliterator' => function () use ($page_settings)
    {
        $page_settings['TITLE'] = 'Transliterate';
        $page_settings['MAINHTML'] = './api-handler/components/pages/page_transliterator.php';
        return $page_settings;
    },

    'dictionary' => function () use ($page_settings)
    {
        $page_settings['TITLE'] = 'Dictionary';
        $page_settings['MAINHTML'] = './api-handler/components/pages/page_dictionary.php';
        return $page_settings;
    },

    '_NOT_FOUND' => function () use ($page_settings)
    {
        $page_settings['TITLE'] = 'Not Found';
        $page_settings['MAINHTML'] = './api-handler/components/pages/page_notfound.php';
        return $page_settings;
    }
);

if(!array_key_exists($page_param, $_pages))
{
    $page_param = '_NOT_FOUND';
}

$page_obj = (object) $_pages[$page_param]();

?>