

import { HttpRequest } from './httpreq.js';

class PageManager 
{
    #_pageload = '';

    #_functions = {
        beforeload: () => { },
        afterload: () => { },
    };

    constructor (value)
    {
        this.#_pageload = value;
    }

    async loadPage (elem)
    {
        if(!elem)
        {
            elem = document.getElementsByTagName('main')[0];
        }

        this.#_functions.beforeload();

        let res = await HttpRequest('fetchpage', { value: this.#_pageload });
        console.log(res);
        elem.innerHTML = res.response;

        this.#_functions.afterload();
    }

    override (funcname, logic)
    {
        if(!funcname)
        {
            return;
        }

        try 
        {
            this.#_functions[funcname] = logic;
        }
        catch(err)
        {
            console.error(err);
        }
    }

    set Page (value)
    {
        this.#_pageload = value;
    }

    get Page ()
    {
        return this.#_pageload;
    }
}

export {
    PageManager
}


