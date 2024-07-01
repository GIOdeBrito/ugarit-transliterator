

function HttpRequest (action = String(), args = Object(), files = Array(), type = 'POST')
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

export {
    HttpRequest
}

