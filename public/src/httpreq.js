
/**
* Makes a simple http request to get or post data to an endpoint.
* @param {string} action
* @param {Object} args
* @param {string[]} files
* @returns {string}
*/
function HttpPost (action, args = Object(), files = Array())
{
    const fdata = new FormData();

    fdata.append('action', action);
    fdata.append('args', JSON.stringify(args));

    // Append files
    if(files.length > 0)
    {
        Array.from(files).forEach(file => fdata.append('uploaded_file[]', file));
    }

    const xmlreq = new XMLHttpRequest();
    const url = '/api/v1/';

    xmlreq.open('POST', url, true);
    xmlreq.send(fdata);

    return new Promise(resolve =>
    {
        xmlreq.onload = (res) => resolve(res.target.responseText);
    });
}

/**
* Performs a simple http request that fetchs a resource.
* @param {string} url
* @returns {object | string}
*/
async function HttpGet (url = String())
{
	let response = await fetch(url);

	try
	{
		return await response.text();
	}
	catch(ex)
	{
		return await response.json();
	}
}

export {
    HttpPost,
	HttpGet
}

