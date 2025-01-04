<?php

require_once 'helpers/ugarit_database.php';
require_once 'helpers/web_response.php';

class ApiTestController
{
	public static function time_now ()
	{
		echo date('d/m/Y H:i');
	}

	public static function database_test ()
	{
		$db = new Database();
		$res = $db->query('SELECT * FROM SEARCH_WORD LIMIT 1');

		php_response(print_r($res), 200);
	}
}

?>