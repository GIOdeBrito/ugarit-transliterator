
import { HttpRequest } from "../httpreq.js";
import { TryParseJson } from "../json-tools.js";

window.addEventListener('load', () =>
{
    searchBarControls();
});

function searchBarControls ()
{
    let current_queue = null;
    let searcher = document.querySelector('input[name="search"]');

    searcher.oninput = async () =>
    {
        if(current_queue)
        {
            clearInterval(current_queue);
            console.log('Queue stopped');
            current_queue = null;
        }

        let value = searcher?.['value'];
        
        const json = {
            param: value.split(' ')[0]
        };

        current_queue = setTimeout(async () =>
        {
            let res = await HttpRequest('getdictionaryword', json);
            
            let content = TryParseJson(res['response']);

            if(!content)
            {
                console.error('Empty result');
                return;
            }

            let result = TryParseJson(content.response);

            createTableItems(result.result);
        }, 600);
    };
}

function createTableItems (itemArray = Array())
{
    let tbody = window['item-table-body'];

    if(itemArray.length === 0)
    {
        tbody.parentElement.hidden = true;
        return;
    }

    if(Array.from(tbody.children).length > 0)
    {
        tbody.innerHTML = String();
    }

    // Creates the items for the table
    const func_CreateTableItem = ({ word, translation, logograms, information }) =>
    {
        let row = document.createElement('tr');

        let wordcell = document.createElement('th');
        wordcell.textContent = word;
        row.appendChild(wordcell);

        let translate = document.createElement('th');
        translate.textContent = translation;
        row.appendChild(translate);

        let cuneo = document.createElement('th');
        cuneo.textContent = logograms;
        row.appendChild(cuneo);

        let infor = document.createElement('th');
        infor.textContent = information;
        row.appendChild(infor);

        tbody.appendChild(row);
    };

    itemArray.forEach(item => func_CreateTableItem(item));

    tbody.parentElement.hidden = false;
}

