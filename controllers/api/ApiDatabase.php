<?php

require_once 'helpers/ugarit_database.php';
require 'helpers/ugarit_alphabet.php';
require_once 'helpers/web_response.php';

class ApiDatabase
{
	public static function word_search ()
	{
		$query_sql =
		    "SELECT *
		    FROM (
		        SELECT *
		        FROM SEARCH_WORD
		        WHERE WORD LIKE :qparam
		        UNION
		        SELECT *
		        FROM SEARCH_WORD
		        WHERE TRANSLATION LIKE :qparam
		    )
		    AS RESULT
		    ORDER BY WORD ASC
		";

		$args = json_decode($_POST['args']);

		$param = strval($args->param);
		$entries = [];

		// Executes query only if param is not empty
		if(!empty($param))
		{
		    $db = new Database();

		    /* if parameter does not contain the 'percentage' character,
		    and the string is equal or greater than two characters, we
		    include the 'percentage' for the search query */
		    if(!str_contains($param, '%') && strlen($param) >= 2)
		    {
		        $param = '%'.$param.'%';
		    }

		    $res = $db->query($query_sql, [ ':qparam' => $param ]);

		    foreach($res as $item)
		    {
		        $keyvalue = [
		            'word' => $item['WORD'],
		            'translation' => $item['TRANSLATION'],
		            'logograms' => $item['CUNEIFORM'],
		            'information' => $item['INFORMATION']
		        ];

		        array_push($entries, $keyvalue);
		    }
		}

		json_response([ 'result' => $entries ], 200);
	}

	public static function transliterate ()
	{
		$args = json_decode($_POST['args']);

		$textarg = $args->text;

		$text = static::filter_garbage($textarg);

		$alphabetus = new UgaritAlphabet();

		/* Translate from Latin characters to Ugaritic */

		echo $alphabetus->latin_to_ugaritic($text);
	}

	protected static function filter_garbage (string $str): string
	{
		if(str_contains($str, '%20'))
		{
			$str = str_replace('%20', '.', $str);
		}

		return $str;
	}
}

?>