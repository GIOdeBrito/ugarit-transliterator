

import { GString } from "./string-tools.js";

function searchTable (text, table)
{
    let body = table.getElementsByTagName('tbody')[0];
    let keywords = text.split(' ');

    if(hasOnlyInvalidEntries(text, keywords))
    {
        for(let entry of body.children)
        {
            entry.hidden = false;
        }

        return;
    }

    filterTableItems(body.children, keywords);
}

function filterTableItems (children, keywords)
{
    /* Hides or show the items if they
    contain a keyword or not */
    
    for(let entry of children)
    {
        for(let key of keywords)
        {
            // Ignores empty and null values
            if(GString.isNullOrEmpty(key))
            {
                continue;
            }
            
            if(entry.textContent.includes(key))
            {
                entry.hidden = false;
                break;
            }
            
            entry.hidden = true;
        }
    }
}

function hasOnlyInvalidEntries (keywords)
{
    /* Checks if the keywords
    are actually valid ones */
    
    let invalidNum = 0;
    
    for(let key of keywords)
    {
        if(GString.isNullOrEmpty(key))
        {
            invalidNum++;
            continue;
        }
    }

    if(invalidNum >= keywords)
    {
        return true;
    }

    return false;
}

export {
    searchTable
}


