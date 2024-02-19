<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    header('HTTP/2 403 Forbidden');
    die("Request method not allowed");
}

/*if($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')
{
    header('HTTP/2 403 Forbidden');
    die("Request not from known host");
}*/

if(!isset($_POST['action']) || !isset($_POST['args']))
{
    header('HTTP/2 400 Bad request');
    die("Bad Request");
}

if(!isset($_SESSION['localkey']))
{
    $_SESSION['localkey'] = md5(rand(10000,99999));
}

session_start();
define('UGARIT_VERSION', '1.0.0');

$action = $_POST['action'];
$args = json_decode($_POST['args']);

require_once './actions.php';
action_start($action, $args);

?>