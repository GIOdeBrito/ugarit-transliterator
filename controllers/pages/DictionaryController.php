<?php

require 'helpers/page_controller.php';

class DictionaryController extends PageController
{
	public static function index (): void
	{
		self::set_title('Dictionary');
		self::set_view('dictionary.php');

		self::add_stylesheet('dictionary.css');
		self::add_script('views/dictionary.js', true);

		self::render();
	}
}

?>