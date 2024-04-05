

function HttpRequest (action, args = Object(), type = 'POST')
{
    const fdata = new FormData();

    fdata.append('action', action);
    fdata.append('args', JSON.stringify(args));
    
    const xmlreq = new XMLHttpRequest();
    const url = 'api-handler/admin.php';

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
    HttpRequest,
}

