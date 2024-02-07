
import { PageManager } from './webpage-components.js';

window.addEventListener('DOMContentLoaded', async () =>
{
    let manager = new PageManager('home');
    manager.override('afterload', () => console.log(manager.Page + ' loaded'));
    manager.loadPage();
});


