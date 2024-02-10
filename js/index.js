
import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', async () =>
{
    console.log(PageManager.ParamPage);
    let manager = new PageManager(PageManager.ParamPage ?? 'home');
    manager.override('afterload', () => console.log(manager.Page + ' loaded'));
    manager.loadPage();
});


