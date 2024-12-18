<?php

/* Removes unnecessary characters from the main string */

function filter_out_garbage (string $str): string
{
    if(str_contains($str, '%20'))
    {
        $str = str_replace('%20', '.', $str);
    }

    return $str;
}

$textarg = $this->args->text;

$text = filter_out_garbage($textarg);

/* Imports the Ugaritic Alphabet class */
require '../../helpers/ugarit_alphabet.php';

$alphabetus = new UgaritAlphabet();

/* Translate from Latin characters to Ugaritic */

echo $alphabetus->latin_to_ugaritic($text);

?>