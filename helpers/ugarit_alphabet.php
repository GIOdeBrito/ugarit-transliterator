<?php

class UgaritAlphabet
{
	protected array $ugarit_characters =
	[
		// Alpa
		'ả' => '𐎀',
		'a' => '𐎀',
		'o' => '𐎀',
		// Beta
	    'b' => '𐎁',
		'v' => '𐎁',
		// Gamla
	    'g' => '𐎂',
		// Ha
		'ḫ' => '𐎃',
	    'kh' => '𐎃',
		// Dalta
		'd' => '𐎄',
		// Ho
		'h' => '𐎅',
		// Wo
		'w' => '𐎆',
		// Zeta
		'z' => '𐎇',
		// Hota
		'ḥ' => '𐎈',
		'hh' => '𐎈',
		// Tet
		'ṭ' => '𐎉',
		// Yod
		'y' => '𐎊',
		// Kaph
		'k' => '𐎋',
		// Shin
		'š' => '𐎌',
		'sh' => '𐎌',
		// Lamda
		'l' => '𐎍',
		// Mem
		'm' => '𐎎',
		// Dhal
		'ḏ' => '𐎏',
		// Nun
		'n' => '𐎐',
		// Tzu
		'ẓ' => '𐎑',
		'tz' => '𐎑',
		// Samka
		's' => '𐎒',
		// Ain
		'ʿ' => '𐎓',
		// Pu
		'p' => '𐎔',
		// Tsade
		'ṣ' => '𐎕',
		'ts' => '𐎕',
		// Qopa
		'q' => '𐎖',
		// Rasha
		'r' => '𐎗',
		// Thanna
		'ṯ' => '𐎘',
		'th' => '𐎘',
		// Ghain
		'ġ' => '𐎙',
		'gh' => '𐎙',
		// To
		't' => '𐎚',
		// I
		'ỉ' => '𐎛',
		'i' => '𐎛',
		'e' => '𐎛',
		// U
		'ủ' => '𐎜',
		'u' => '𐎜',
		// Ssu
		's̀' => '𐎝',
		'ss' => '𐎝'
	];

	function is_character_vowel (string $char): bool
	{
		$vowels = [ 'a', 'e', 'i', 'o', 'u', 'ủ', 'ả', 'ỉ' ];

		$key = array_search($char, $this->ugarit_characters);

		if(!$key)
		{
		    return false;
		}

		if(!in_array($key, $vowels))
		{
		    return false;
		}

		return true;
	}

	function get_character (string $char): string
	{
		if(!isset($this->ugarit_characters[$char]))
		{
			return $char;
		}

		return $this->ugarit_characters[$char];
	}

	function get_character_latin (string $char): string
	{
		$key = array_search($char, $this->ugarit_characters);

		if(!$key)
		{
			return $char;
		}

		return $key;
	}

	function latin_to_ugaritic (string $text, array $options = array()): string
	{
		$text_array = $this->text_as_array_digraphs($text);

		$new_text = '';

		foreach($text_array as $char)
		{
			$new_text .= $this->get_character($char);
		}

		return $new_text;
	}

	function ugaritic_to_latin (string $text): string
	{
		$text_array = $this->text_as_array_simple($text);

		$new_text = '';

		foreach($text_array as $char)
		{
			$new_text .= $this->get_character_latin($char);
		}

		return $new_text;
	}

	private function text_as_array_digraphs (string $text): array
	{
		$split_text = mb_str_split(strtolower($text));

		$len = count($split_text);

		$new_array = [];

		for($i = 0; $i < $len; $i++)
		{
			$char = $split_text[$i];

			// Checks if there is a character available to join
			if(($i + 1) < $len)
			{
				$digraph = $char.$split_text[$i + 1];

				if(array_key_exists($digraph, $this->ugarit_characters))
				{
					$char = $digraph;
					$i++;
				}
			}

			array_push($new_array, $char);
		}

		return $new_array;
	}

	private function text_as_array_simple (string $text): array
	{
		return mb_str_split(strtolower($text));
	}
}

?>