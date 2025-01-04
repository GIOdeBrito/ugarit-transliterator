
import { HttpPost } from "../httpreq.js";
import { tryParseJson } from "../utility.js";
import TableSearch from "../table-search.js";

window.addEventListener('load', () =>
{
    searchBarControls();
});

/**
* Set controls for the dictionary page.
* @returns {void}
*/
function searchBarControls ()
{
    let currentQueue = null;
    let searcher = document.querySelector('input[name="search"]');

    searcher.oninput = async () =>
    {
        if(currentQueue)
        {
            clearInterval(currentQueue);
            currentQueue = null;
        }

        let value = searcher?.['value'];

        const json = {
            param: value.split(' ')[0]
        };

        currentQueue = setTimeout(async () =>
        {
            let response = await HttpPost('/api/v1/wordsearch/', json);

            let content = tryParseJson(response);

            if(!content)
            {
                return;
            }

            createTableItems(content?.result);
        }, 600);
    };
}

/**
* Create the table and items based on the network response.
* @param {object} itemArray
*/
function createTableItems (itemArray)
{
	if(itemArray?.length === 0)
    {
        dictionaryTableBody().parentElement.hidden = true;
        return;
    }

    if(Array.from(dictionaryTableBody().children).length > 0)
    {
        dictionaryTable().clear();
    }

    itemArray.map(item => createTableItem(item));

    dictionaryTableBody().parentElement.hidden = false;

	dictionaryTable().getRows();
}

/**
* Returns the main dictionary table.
* @returns {TableSearchModel}
*/
function dictionaryTable ()
{
	return TableSearch.all[0];
}

/**
* Returns the main dictionary table body.
* @returns {HTMLElement}
*/
function dictionaryTableBody ()
{
	return TableSearch.all[0].tbody;
}

/**
* Creates an item row for the table on the page.
* @param {object} item - The JSON object containing the properties.
* @param {string} item.word - The base word transliterated in latin characters.
* @param {string} item.translation - The translation of the word.
* @param {string} item.logogram - The word in cuneiform.
* @param {string} item.information - Extra information for the word.
*/
function createTableItem ({ word, translation, logograms, information })
{
	let row = document.createElement('tr');

	let wordcell = document.createElement('td');
	row.appendChild(wordcell);

	wordcell.title = toUgPlural(word);

	let rubynotation = document.createElement('ruby');
	rubynotation.innerText = word;
	wordcell.appendChild(rubynotation);

	let rtWord = document.createElement('rt');
	rtWord.innerText = logograms;
	rtWord.style.fontSize = '1.2rem';
	rubynotation.appendChild(rtWord);

	let translate = document.createElement('td');
	translate.textContent = translation;
	row.appendChild(translate);

	let infor = document.createElement('td');
	infor.textContent = information;
	row.appendChild(infor);

	dictionaryTableBody().appendChild(row);
}

/**
* Converts a singular word to its plural forms.
* @param {string} baseword
* @returns {string}
*/
function toUgPlural (baseword)
{
    let vowels = [ 'a', 'e', 'i', 'o', 'u' ];

    if(vowels.includes(baseword.charAt(baseword.length - 1)))
    {
        baseword = baseword.substring(0, baseword.length - 1);
    }

    let infor = '';

    infor += 'Plural: ' + baseword + 'uma \n';
    infor += 'Construct: ' + baseword + 'ê \n';
    infor += 'F. Plural: ' + baseword + 'atu \n';
    infor += 'F. Construct: ' + baseword + 'atê \n';

    return infor;
}

