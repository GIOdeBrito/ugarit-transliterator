<?php

/* This file needs to inherit the args variable
from the previous file in actions_registered */

$slug = $page_name;

function fetch_page_request ($slug)
{
    require_once './include/ugarit_database.php';
    
    $db = new UPage();

    $sql = 'SELECT * FROM PAGES WHERE SLUG = :slug';
    $param = array(':slug' => strval($slug));
    $res = $db->query($sql, $param);
    
    if(empty($res))
    {
        header('HTTP/2 404 Not found');
        die('Page not found');
    }

    $item = $res[0];

    $page_array = array
    (
        'title' => $item['TITLE'],
        'slug' => $item['SLUG'],
        'head' => $item['HEAD'] ?? './components/page_header.php',
        'mainhtml' => $item['MAINHTML'],
    );

    $page_obj = (object) $page_array;

    return $page_obj;
}

$page_obj = fetch_page_request($slug);

require './components/doc_root.php';

?>