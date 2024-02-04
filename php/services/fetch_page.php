<?php

function fetch_page_request ($name)
{
    if($name === 'main')
    {
        require_once './components/page_header.php';
        require_once './components/page_body.php';
        die();
    }


}

?>