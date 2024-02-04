
import { HttpRequest } from './httpreq.js';
import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', async () =>
{
    let manager = new PageManager('main');
    manager.override('beforeload', () => console.log('recebais'));
    manager.loadPage();
});

function setControls ()
{

}


