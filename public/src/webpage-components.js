

class PageManager 
{
    static set ParamPage (page)
    {
        let url = window.location.href.split('/').slice(0,3).join('/');
        url += '/' + page;
        window.location.href = url;
    }
}

export {
    PageManager
}


