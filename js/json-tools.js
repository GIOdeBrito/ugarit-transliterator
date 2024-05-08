
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
        console.error(ex);
        return null;
    }
}

export {
    TryParseJson
}

