<?php

require 'helpers/page_controller.php';

class HomeController extends PageController
{
	public static function index (): void
	{
		self::set_title('Home');
		self::set_view('home.php');

		self::add_stylesheet('home.css');
		self::add_script('parallax.js');

		self::render();
	}
}

?>