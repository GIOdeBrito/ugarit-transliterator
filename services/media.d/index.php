<?php

$filename = '';

if(isset($_GET['file']))
{
    $filename = $_GET['file'];
}

if(isset($_GET['w']) && isset($_GET['h']))
{
    // Scaling logic
}

if(!file_exists('public/'.$filename))
{
    $filename = '404dead.webp';
}

header('Content-type: image/webp');

readfile('public/'.$filename);

die();

?>