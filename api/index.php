<?php

header('Access-Control-Allow-Methods: GET, POST');

$route = strtolower(explode('/', $_SERVER['REQUEST_URI'])[2]);

session_start();

define('UGARIT_VERSION', '1.0.0');

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    switch($route)
    {
        case 'v1':
            new GetV1();
        break;

        default:
            header('HTTP/2 400 Bad Request');
            die('Route not valid.');
        break;
    }
}

class GetV1
{
    private $action = '';
    private $args = array('' => '');
    
    function __construct ()
    {
        $params = explode('/', $_SERVER['REQUEST_URI']);

        //echo "params ".print_r($this->params);

        $this->action = $params[3];
        $this->args = array_slice($params, 4);

        $method = $this->action;

        if(method_exists($this, $this->action))
        {
            $this->{$method}();
            return;
        }
        
        header('HTTP/2 400 Bad Request');
        die('GET action not found.');
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    switch($route)
    {
        case 'v1':
            new PostV1();
        break;

        default:
            header('HTTP/2 400 Bad Request');
            die('Route not valid.');
        break;
    }
}

class PostV1
{
    private $action = '';
    private $args = array('' => '');
    
    function __construct ()
    {
        if(!isset($_POST['action']))
        {
            header('HTTP/2 400 Bad Request');
            die('An action is required to proceed request.');
        }
        
        $this->action = $_POST['action'];

        if(isset($_POST['args']))
        {
            $this->args = json_decode($_POST['args']);
        }

        $this->process_request();
    }

    function __destruct ()
    {
        $action = NULL;
        $args = NULL;
    }

    function process_request ()
    {
        require_once './actions.php';
        action_start($this->action, $this->args);
    }
}

?>