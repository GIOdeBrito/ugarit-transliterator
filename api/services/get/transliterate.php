<?php

//echo $this->action;
//echo $this->args[0];

$text = $this->args[0];

/* Removes unnecessary characters from the main string */

function filter_out_garbage ($str): string
{
    if(str_contains($str, '%20'))
    {
        $str = str_replace('%20', '.', $str);
    }

    return $str;
}

$text = filter_out_garbage($text);

/* Imports the Ugaritic Alphabet class */
require_once 'ugarit_alphabet.php';
$a_object = new UgaritAlphabet();

/* Translate from Latin characters to Ugaritic */

echo $a_object->latin_to_ugaritic($text);

?>