
/**
* Tries to parse a string into a json object.
* @param {string} text
* @returns {object | null}
*/
function tryParseJson (text)
{
    try
    {
        return JSON.parse(text);
    }
    catch(ex)
    {
        return null;
    }
}


export {
	tryParseJson
}
