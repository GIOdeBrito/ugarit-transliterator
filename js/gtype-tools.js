
class GString
{
    constructor () { }

    static isNullOrEmpty (str)
    {
        if(typeof str !== "string" || !str || str === "")
        {
            return true;
        }

        return false;
    }
}

class GJson 
{
    constructor () { }

    static TryParse (text = String())
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
            return null;
        }
    }
}

export {
    GString,
    GJson
}