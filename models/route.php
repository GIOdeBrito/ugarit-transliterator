<?php

class RouteV1
{
	private string $view = "";

	public function __construct ()
	{
		$this->view = $_GET['view'] ?? 'index';
	}

	public function get_view (): string
	{
		return $this->view;
	}

	public function get_controller (): object
	{
		$slug = $this->view;

		$pathfile = 'controllers/'.$slug.'.controller.php';

		if(!file_exists($pathfile))
		{
			$pathfile = 'controllers/notfound.controller.php';
		}

		require_once $pathfile;

		return new ViewController();
	}
}

?>