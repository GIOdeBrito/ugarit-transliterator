<?php

/* Website root pages */

$_pages = array
(
    'home' => function () use ($page_settings): array
    {
        $page_settings['TITLE'] = 'Home';
        $page_settings['MAINHTML'] = 'api/views/home.php';
        return $page_settings;
    },

    'transliterate' => function () use ($page_settings): array
    {
        $page_settings['TITLE'] = 'Transliterate';
        $page_settings['MAINHTML'] = 'api/views/transliterator.php';
        return $page_settings;
    },

    'dictionary' => function () use ($page_settings): array
    {
        $page_settings['TITLE'] = 'Dictionary';
        $page_settings['MAINHTML'] = 'api/views/dictionary.php';
        return $page_settings;
    },

    '_NOT_FOUND' => function () use ($page_settings): array
    {
        $page_settings['TITLE'] = 'Not Found';
        $page_settings['MAINHTML'] = 'api/views/notfound.php';
        return $page_settings;
    }
);

?>