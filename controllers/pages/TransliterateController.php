<?php

require 'helpers/page_controller.php';

class TransliterateController extends PageController
{
	public static function index (): void
	{
		self::set_title('Transliterate');
		self::set_view('transliterate.php');

		self::add_stylesheet('transliterate.css');
		self::add_script('views/transliterate.js', true);

		self::render();
	}
}

?>