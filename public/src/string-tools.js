

function isNullOrEmpty (str)
{
    if(typeof str !== "string" || !str || str === "")
    {
        return true;
    }

    return false;
}

export {
    isNullOrEmpty
}


