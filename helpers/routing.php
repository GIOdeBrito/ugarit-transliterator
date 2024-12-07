<?php

function get_view_controller (): ViewController
{
	$slug = $_GET['view'] ?? 'index';

	$pathfile = 'controllers/'.$slug.'.controller.php';

	if(!file_exists($pathfile))
	{
		$pathfile = 'controllers/notfound.controller.php';
	}

	require_once $pathfile;

	return new ViewController();
}

/* Accessible throughout the document */
$controller = get_view_controller();

?>