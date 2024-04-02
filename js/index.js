

import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', () =>
{
    let manager = new PageManager(PageManager.ParamPage ?? 'home');
    manager.override('afterload', () =>
    {
        console.log(manager.Page + ' loaded')
        sortTags();
    });
    manager.loadPage();
});

function sortTags ()
{
    /* Move the "style" and "script" tags
    from the body to the head of the document */
    
    let styletags = document.getElementsByTagName('style');

    for(let tag of styletags)
    {
        document.head.appendChild(tag);
    }

    let scripttags = document.getElementsByTagName('script');

    for(let tag of scripttags)
    {
        document.head.appendChild(tag);
    }
}



