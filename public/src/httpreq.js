
import { TryParseJson } from './json-tools.js';

/**
* Makes a simple http request to get or post data to an endpoint.
* @param {string} action
* @param {Object} args
* @param {string[]} files
* @param {string} type
* @returns {Object}
*/
function HttpRequest (action, args = Object(), files = Array(), type = 'POST')
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
    const url = '/api/v1/index.php';

    xmlreq.open(type, url, true);
    xmlreq.send(fdata);

    return new Promise(resolve =>
    {
        xmlreq.onload = (res) => resolve({
            status: xmlreq.status,
            response: res.target.responseText,
            raw: res
        });
    });
}

/**
* Performs a simple http request and fetches a resource.
* @param {string} actionUrl
* @returns {Object}
*/
async function HttpGet (actionUrl = String())
{
	let request = await fetch(actionUrl);

	let text = await request.text();
	let json = TryParseJson(text);

	return { json: json, rawtext: text };
}

export {
    HttpRequest,
	HttpGet
}

