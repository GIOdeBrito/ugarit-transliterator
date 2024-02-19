<?php

/* This file needs to inherit the args variable
from the previous file in actions_registered */

$slug = $page_name;

function fetch_page_request ($slug)
{
    require_once './include/ugarit_database.php';
    
    $db = new UDatabase();

    $sql = 'SELECT * FROM PAGES WHERE SLUG = :slug';
    $param = array(':slug' => strval($slug));
    $res = $db->query($sql, $param);
    
    if(empty($res))
    {
        header('HTTP/2 404 Not found');

        $param = array(':slug' => 'not_found');
        $res = $db->query($sql, $param);

        return $res[0];
    }

    $item = $res[0];

    if(empty($item['HEAD']))
    {
        $item['HEAD'] = './components/page_header.php';
    }

    return $item;
}

$page_obj = fetch_page_request($slug);

require './components/doc_root.php';

?>