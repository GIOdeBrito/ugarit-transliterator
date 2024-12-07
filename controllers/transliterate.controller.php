<?php

require 'models/controller.php';

class ViewController extends ModelController
{
	public function __construct ()
	{
		parent::__construct();

		$this->viewData['title'] = 'Transliterate';
		$this->viewData['view'] = 'transliterate';

		$this->enqueue_stylesheet('transliterate.css');
		$this->enqueue_script('views/transliterate.js', true);
	}
}

?>