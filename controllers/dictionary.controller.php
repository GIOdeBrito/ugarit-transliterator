<?php

require 'models/controller.php';

class ViewController extends ModelController
{
	public function __construct ()
	{
		parent::__construct();

		$this->viewData['title'] = 'Dictionary';
		$this->viewData['view'] = 'dictionary';

		$this->enqueue_stylesheet('dictionary.css');
		$this->enqueue_script('views/dictionary.js', true);
	}
}

?>