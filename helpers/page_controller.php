<?php

abstract class PageController
{
	protected static ?string $title = NULL;
	protected static ?string $view = NULL;
	protected static ?object $args = NULL;
	protected static ?array $stylesheets = [];
	protected static ?array $scripts = [];

	/* Must be implemented by child class */
	abstract public static function index (): void;

	protected static function get_title (): string
	{
		return self::$title;
	}

	protected static function set_title (string $title): void
	{
		self::$title = $title;
	}

	protected static function get_view (): string
	{
		return self::$view;
	}

	protected static function set_view (string $viewname): void
	{
		self::$view = $viewname;
	}

	protected static function set_args (object $args): void
	{
		self::$args = $args;
	}

	protected static function get_stylesheets (): array
	{
		return self::$stylesheets;
	}

	protected static function add_stylesheet (string $filename): void
	{
		self::$stylesheets[] = '/public/styles/'.$filename;
	}

	protected static function get_scripts (): array
	{
		return self::$scripts;
	}

	protected static function add_script (string $filename, $is_module = false): void
	{
		$type = 'text/javascript';

		if($is_module)
		{
			$type = 'module';
		}

		self::$scripts[] = [ 'src' => '/public/src/'.$filename, 'type' => $type ];
	}

	protected static function render (): void
	{
		require 'views/_layout.php';
	}

	protected static function render_body (): void
	{
		require 'views/'.self::get_view();
	}
}

?>