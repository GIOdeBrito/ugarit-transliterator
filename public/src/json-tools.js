
/**
* Tries to parse a string into a json object.
* @param {string} text
* @returns {Object | null}
*/
function TryParseJson (text)
{
    if(typeof text !== "string")
    {
        return null;
    }

    try
    {
        return JSON.parse(text);
    }
    catch(ex)
    {
        //console.error(ex);
        return null;
    }
}

export {
    TryParseJson
}

