<?php

/* Ugaritic words dictionary search */

?>
<section>
    <header>
        <h1>Dictionary</h1>
        <h2>Word Searcher</h2>
    </header>

    <p>Search words here:</p>
</section>

<section class='inputbox'>
    <input id="searcher-in" type="text" value="">
    <img src="./assets/icons/magnifier.webp" width=30 alt="magnifier">
</section>

<section>
<table hidden>
        <thead>
            <tr>
                <th>Word</th>
                <th>Translation</th>
                <th>Cuneiform</th>
            </tr>
        </thead>

        <tbody id="item-table-body">
        </tbody>
    </table>
</section>

<script type="module">

    import { HttpRequest } from "./js/httpreq.js";
    import { GJson } from "./js/gtype-tools.js";

    window.addEventListener('load', () =>
    {
        searchBarControls();
    });

    function searchBarControls ()
    {
        let current_queue = null;
        
        window['searcher-in'].oninput = () =>
        {
            if(current_queue)
            {
                clearInterval(current_queue);
                current_queue = null;
            }
            
            let value = window['searcher-in'].value;
            let json = {
                param: value.split(' ')[0]
            };

            current_queue = setTimeout(async () =>
            {
                let res = await HttpRequest('getdictionaryword', json);
                let content = GJson.TryParse(res.response);

                if(!content)
                {
                    console.error('Empty result');
                    return;
                }
                
                createTableItems(content.result);
            },
            900);
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

        itemArray.forEach(item => 
        {
            let row = document.createElement('tr');
            
            let word = document.createElement('th');
            word.textContent = item.word;
            row.appendChild(word);

            let translate = document.createElement('th');
            translate.textContent = item.translation;
            row.appendChild(translate);

            let cuneo = document.createElement('th');
            cuneo.textContent = item.logograms;
            row.appendChild(cuneo);
            
            tbody.appendChild(row);
        });

        tbody.parentElement.hidden = false;
    }

</script>

<style>

    section > header > h2, h1 {
        text-align: center;
        color: #fff;
        letter-spacing: 0;
        font-weight: 300;
    }

    section > p {
        text-align: center;
        color: #fff;
        letter-spacing: 4px;
    }

    input[type=text] {
        padding: .5rem;
        width: 50vw;
    }

    .inputbox {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }
    .inputbox > img {
        width: 1.25rem;
        height: 1.25rem;
        margin: auto 10px;
    }

</style>