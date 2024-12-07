<?php

require 'models/controller.php';

class ViewController extends ModelController
{
	public function __construct ()
	{
		parent::__construct();

		$this->viewData['title'] = 'Not Found';
		$this->viewData['view'] = 'not_found';

		$this->enqueue_stylesheet('not-found.css');
	}
}

?>