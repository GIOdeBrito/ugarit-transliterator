

window.addEventListener('DOMContentLoaded', function ()
{
    sort_tags();
});

function sort_tags ()
{
    Array.from(document.getElementsByTagName('script')).forEach(tag => document.head.appendChild(tag));

    Array.from(document.getElementsByTagName('style')).forEach(tag => document.head.appendChild(tag));
}


