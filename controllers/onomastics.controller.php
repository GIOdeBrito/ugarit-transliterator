<?php

require 'models/controller.php';
require 'helpers/ugarit_database.php';

class ViewController extends ModelController
{
	public function __construct ()
	{
		parent::__construct();

		$this->viewData['title'] = 'Onomastics';
		$this->viewData['view'] = 'onomastics';

		$this->enqueue_stylesheet('onomastics.css');
	}

	public function get_onomastics_items (): array
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