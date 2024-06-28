<?php

/* Page location script */

$page_param = $_GET['view'];

$page_settings = array();
$page_settings['HEAD'] = 'api/components/page_header.php';

if(isset($_GET['category']))
{
    $category = $_GET['category'];
    
    switch($category)
    {
        case 'articles':
            require_once 'views_articles.php';
        break;
    }
}

if(!isset($_GET['category']))
{
    require_once 'views_root.php';
}

if(!array_key_exists($page_param, $_pages))
{
    $page_param = '_NOT_FOUND';
}

$page_obj = (object) $_pages[$page_param]();

?>