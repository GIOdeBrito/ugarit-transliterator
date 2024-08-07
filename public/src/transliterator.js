
import { getAlphabetMap, getAlphabetDigraphs, getKnownVowels } from "./ugarit-alphabet.js";

const TRANSLITERATOR_GLOBALS =
{
    omitVowels: false,
};

function convertTextToCuneiform (text = String())
{
    let alphabet = getAlphabetMap();
    let textArray = parseToConvertArray(text);
    let finalString = String();

    for(let i = 0; i < textArray.length; i++)
    {
        let char = textArray[i];

        // Check if the key exists
        if(alphabet.has(char))
        {
            finalString += alphabet.get(char);
            continue;
        }

        finalString += char;
    }

    return finalString;
}

function parseToConvertArray (text = String())
{
    // Omit the vowels if selected
    if(TRANSLITERATOR_GLOBALS.omitVowels)
    {
        text = filterOutVowelsInstances(text);
    }
    
    let textArray = text.toLocaleLowerCase().split('');

    // Gets list of known digraphs
    let digraphs = getAlphabetDigraphs();

    // Unite the digraphs of the word
    for(let i = 0; i < textArray.length; i++)
    {
        // Breaks if next char does not exist
        if(Number(i + 1) >= textArray.length)
        {
            break;
        }
        
        // Get a pair of chars
        let char = String(textArray[i] + textArray[i + 1]);
        
        // Checks if pair is a known digraph
        if(!digraphs.includes(char))
        {
            continue;
        }
        
        // Removes the items at first char's position
        textArray.splice(i, 2);
        // Inserts digraph
        textArray.splice(i, 0, char);
    }

    // Checks for special characters
    let finalArray = textArray.map(function (char, i)
    {
        // Sets a special characters to the key '_space'
        if(char === '.' || char === ',' || char === ' ')
        {
            return '_space';
        }
        
        return char;
    });

    return finalArray;
}

function filterOutVowelsInstances (text = String())
{
    /* Removes all the other vowels 
    from each word */

    let textArray = text.split(' ');
    let vowels = getKnownVowels();
    
    let neoArray = textArray.map(function (word)
    {
        for(let i = 1; i < word.length; i++)
        {
            if(!vowels.includes(word[i]))
            {
                continue;
            }

            let wordArray = word.split('');
            wordArray.splice(i, 1, '');
            word = wordArray.join('');
        }
        
        return word;
    });
    
    return neoArray.join(' ');
}

function setGlobal (globalvar, neovalue)
{   
    TRANSLITERATOR_GLOBALS[globalvar] = neovalue;
}

export {
    convertTextToCuneiform,
    setGlobal
}

