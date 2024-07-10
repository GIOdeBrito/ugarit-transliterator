<?php

//echo $this->action;
//echo $this->args[0];

$text = $this->args[0];

$ugarit_characters =
[
    'a' => '𐎀',
    'b' => '𐎁',
    'g' => '𐎂',
    'kh' => '𐎃',
    'hh' => '𐎈'
];

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

/* Unite certain latin characters as digraphs for future replacement */

function unify_digraph_characters ($str, $digraphs): array
{
    $split_str = mb_str_split(strtolower($str));
    
    $new_str = [];
    
    for($i = 0; $i < count($split_str); $i++)
    {
        $char = $split_str[$i];
        
        // Checks if a next character is available for comparison
        if(($i + 1) < count($split_str))
        {
            $next_char = $split_str[$i + 1];
            $try_digraph = $char.$next_char;
            
            if(array_key_exists($try_digraph, $digraphs))
            {
                $char = $try_digraph;
                $i++;
            }
        }
        
        array_push($new_str, $char);
    }
    
    return $new_str;
}

$chars = unify_digraph_characters($text, $ugarit_characters);

/* Replace the latin characters and digraphs for ugaritic letters */

function replace_for_ugaritic_letters ($str_array, $characters): string
{
    $ugarit_string = '';

    foreach($str_array as $char)
    {
        if(isset($characters[$char]))
        {
            $ugarit_string .= $characters[$char];
            continue;
        }

        $ugarit_string .= $char;
    }

    return $ugarit_string;
}

$ugaritic_text = replace_for_ugaritic_letters($chars, $ugarit_characters);

echo $ugaritic_text;

?>