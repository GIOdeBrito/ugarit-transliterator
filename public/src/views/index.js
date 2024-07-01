

window.addEventListener('DOMContentLoaded', function ()
{
    sortTags();
});

function sortTags ()
{
    Array.from(document.getElementsByTagName('script')).forEach(tag => document.head.appendChild(tag));

    Array.from(document.getElementsByTagName('style')).forEach(tag => document.head.appendChild(tag));
}
