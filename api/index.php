<?php

$route = strtolower(explode('/', $_SERVER['REQUEST_URI'])[2]);

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    switch($route)
    {
        case 'v1':
            new GetV1();
        break;

        default:
            die('Route version not valid.');
        break;
    }
}

class GetV1
{
    protected $action = '';
    protected $args = array();
    
    protected $params = array();
    
    function __construct ()
    {
        $this->params = explode('/', $_SERVER['REQUEST_URI']);

        //echo "params ".print_r($this->params);

        $this->action = $this->params[3];
        $this->args = array_slice($this->params, 3);
    }

    function __destruct ()
    {
        $this->params = NULL;
    }
}

?>