
import { HttpRequest } from './httpreq.js';
import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', async () =>
{
    let manager = new PageManager('main');
    manager.override('beforeload', () => console.log('recebais'));
    manager.override('afterload', () => setControls());
    manager.loadPage();
});

async function setControls ()
{
    let res = await HttpRequest('testdb');
    console.log(res);
}


