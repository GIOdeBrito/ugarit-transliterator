

window.addEventListener('DOMContentLoaded', function ()
{
    sortTags();
});

/**
* Send the script and style tags in the document to the head of the page.
* @returns {void}
*/
function sortTags ()
{
    Array.from(document.getElementsByTagName('script')).forEach(tag => document.head.appendChild(tag));
    Array.from(document.getElementsByTagName('style')).forEach(tag => document.head.appendChild(tag));
}
