<?php

require 'models/controller.php';

class ViewController extends ModelController
{
	public function __construct ()
	{
		parent::__construct();

		$this->viewData['title'] = 'Home';
		$this->viewData['view'] = 'home';

		$this->enqueue_stylesheet('home.css');
	}
}

?>