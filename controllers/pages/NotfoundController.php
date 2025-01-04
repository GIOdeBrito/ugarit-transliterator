<?php

require 'helpers/page_controller.php';

class NotfoundController extends PageController
{
	public static function index (): void
	{
		self::set_title('Not Found');
		self::set_view('not_found.php');

		self::add_stylesheet('not-found.css');
		
		self::render();
	}
}

?>