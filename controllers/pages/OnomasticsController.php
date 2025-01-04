<?php

require 'helpers/page_controller.php';
require 'helpers/ugarit_database.php';

class OnomasticsController extends PageController
{
	public static function index (): void
	{
		self::set_title('Onomastics');
		self::set_view('onomastics.php');

		self::add_stylesheet('onomastics.css');

		self::render();
	}

	protected static function get_onomastics_items (): array
	{
		$query = "
			SELECT
				ID,
				NAME,
				MEANING,
				CASE
					WHEN ORIGIN = 0 THEN 'Levant'
					WHEN ORIGIN = 1 THEN 'Mesopotamia'
					ELSE 'Other'
				END AS ORIGIN
			FROM NAMES
				ORDER BY NAME
		";

		$db = new Database();

		$response = $db->query($query);

		return $response;
	}
}

?>