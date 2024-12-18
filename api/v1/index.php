<?php

header('Access-Control-Allow-Methods: POST');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	session_start();
	new PostV1();
	die();
}
else
{
	http_response_code(403);
	die(-1);
}

class PostV1
{
    private ?string $action = NULL;
    private ?object $args = NULL;

    function __construct ()
    {
        if(!isset($_POST['action']))
        {
			http_response_code(500);
			die(-1);
        }

        $this->action = $_POST['action'] ?? '';

        if(isset($_POST['args']))
        {
            $this->args = json_decode($_POST['args']);
        }

        $this->invoke();
    }

    function invoke (): void
    {
		$actionfile = str_replace('-', '_', $this->action);

		$file = 'actions/'.$actionfile.'.php';

		if(!file_exists($file))
		{
			http_response_code(500);
			die(-1);
		}

		http_response_code(200);

		require_once $file;
    }
}

?>