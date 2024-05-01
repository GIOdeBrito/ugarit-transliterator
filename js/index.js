

import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', () =>
{
    let manager = new PageManager(PageManager.ParamPage ?? 'home');
    manager.override('afterload', () =>
    {
        console.log(`${manager.Page} loaded`);
        sortTags();
    });
    manager.loadPage();
});

function sortTags ()
{
    /* Move the "style" and "script" tags
    from the body to the head of the document */
    
    let styletags = Array.from(document.getElementsByTagName('style'));

    // Insert style elements on the head of the document
    styletags.forEach(tag => document.head.appendChild(tag));

    let scripttags = Array.from(document.getElementsByTagName('script'));

    // Insert script elements on the head of the document
    scripttags.forEach(tag => document.head.appendChild(tag));
}



