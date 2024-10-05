

window.addEventListener('DOMContentLoaded', function ()
{
    createSearchBar();
    TableSearch.start();
});

function createSearchBar ()
{
    let tables = Array.from(document.querySelectorAll('table[data-table-search]'));

    tables.forEach(table =>
    {
        let searchBar = document.createElement('input');
        searchBar.type = 'text';
        searchBar.classList.add('input-simple');

        let label = document.createElement('label');
        label.innerText = 'Search:';
        label.appendChild(searchBar);

        label.style = `
            display: inline-flex;
            align-items: center;
			color: #fff;
			width: 100%;
			background-color: var(--color-foreground);
        `;

        table.parentElement.insertBefore(label, table);

        let sectionButtonControls = document.createElement('section');
		sectionButtonControls.style = `
			background: var(--color-foreground);
		`;

        table.after(sectionButtonControls);

        let model = new TableSearchModel(searchBar, sectionButtonControls, table);

        TableSearch.add(model);
    });
}

class TableSearch
{
    static #allsearch = [];

    static start ()
    {
        this.#setControls();
    }

    static add (item)
    {
        this.#allsearch.push(item);
    }

    static get all ()
    {
        return this.#allsearch;
    }

    static #setControls ()
    {
        let item = this.#allsearch[0];

        item?.searchBar?.addEventListener('input', (ev) =>
        {
            let value = ev.target.value;

            item.search(value);
        });
    }
}

class TableSearchModel
{
    #tableBar = null;
    #searchbar = null;
    #buttonControls = null;
    #pageLabel = null;

    // Todas as rows
    #rows = [];
    #rowContent = [];

    #maxRowsPerPage = 15;
    #currentPage = -1;

    #currentSelectedRows = [];
    #pagesArray = [];

    #tableRow = null;

    constructor (search, buttons, table)
    {
        this.#searchbar = search;
        this.#tableBar = table;
        this.#buttonControls = buttons;
        this.#setNavControl();
        this.getRows();
    }

    get searchBar ()
    {
        return this.#searchbar;
    }

    get table ()
    {
        return this.#tableBar;
    }

    get tbody ()
    {
        return this.#tableBar.children[1];
    }

    get maxRowsPerPage ()
    {
        return this.#maxRowsPerPage;
    }

    set maxRowsPerPage (num)
    {
        this.#maxRowsPerPage = num;
        this.refresh();
    }

    get currentPage ()
    {
        return this.#currentPage;
    }

    getRows ()
    {
        let allrows = Array.from(this.tbody.children);

        this.#rows = [];
        this.#rowContent = [];

        allrows.forEach(row =>
        {
            const rowclone = row.cloneNode(true);

            let selects = Array.from(rowclone.querySelectorAll('select'));
            let selectedContent = String();

            selects.forEach(item =>
            {
                selectedContent += item[item.selectedIndex]?.innerText ?? "";
                item.remove();
            });

            this.#rows.push(row);

            let content = rowclone.textContent.toLowerCase().trim() + selectedContent.toLowerCase().trim();

            content = content.replace(/ |\n/gi, '');

            this.#rowContent.push(content);
        });

        this.refresh();
    }

    tableRowBegin ()
    {
        if(this.#tableRow)
        {
            this.#tableRow = null;
        }

        this.#tableRow = document.createElement('tr');

        return this.#tableRow;
    }

    tableRowData (val = String())
    {
        let td = document.createElement('td');
        td.innerText = val;
        this.#tableRow.appendChild(td);

        return td;
    }

    tableRowEnd ()
    {
        this.tbody.appendChild(this.#tableRow);
        this.#tableRow = null;
    }

    get rawRowData ()
    {
        return this.#rowContent;
    }

    rawRowDataItem (i)
    {
        return this.#rowContent[i];
    }

    rowHasContent (content, index)
    {
        let keywords = content.toLowerCase().split(' ');
        let rowContent = this.rawRowDataItem(index);

        return keywords.every(key => rowContent.includes(key));
    }

    search (query)
    {
        this.#currentSelectedRows = Array.from(this.#rows).filter((child, i) =>
        {
            let res = this.rowHasContent(query, i);

            if(!res)
            {
                return;
            }

            return child;
        });

        this.#pagesArray = [];
        let page = [];
        let index = 1;

        this.#currentSelectedRows.forEach(item =>
        {
            if(index > this.#maxRowsPerPage)
            {
                this.#pagesArray.push(page);
                page = [];
                index = 1;
            }

            page.push(item);

            index++;
        });

        if(index > 1)
        {
            this.#pagesArray.push(page);
        }

        this.goToPage(1);
    }

    refresh ()
    {
        this.search("");
    }

    clear ()
    {
        this.tbody.innerHTML = String();
    }

    goToPage (index)
    {
        index -= 1;

        if(index < 0)
        {
            index = 0;
        }

        if(index > this.#pagesArray.length - 1)
        {
            index = this.#pagesArray.length - 1;
        }

        this.tbody.innerHTML = String();

        this.#currentPage = index + 1;

        this.#pageLabel.innerText = `Page: ${this.#currentPage} of ${this.#pagesArray.length}`;

        if(this.#pagesArray.length < 1)
        {
            return;
        }

        this.#pagesArray[index].forEach(item => this.tbody.appendChild(item));
    }

    #setNavControl ()
    {
        let navPrevious = document.createElement('button');
        navPrevious.innerText = 'Previous';

        navPrevious.onclick = () =>
        {
            this.goToPage(--this.#currentPage);
        };

        this.#buttonControls.appendChild(navPrevious);

        let navNext = document.createElement('button');
        navNext.innerText = 'Next';

        navNext.onclick = () =>
        {
            this.goToPage(++this.#currentPage);
        };

        this.#buttonControls.appendChild(navNext);

        let bdebug = document.createElement('button');
        bdebug.innerText = 'Debug';
        bdebug.style.display = 'none';

        bdebug.onclick = () =>
        {
            console.log(this);
        };

        this.#buttonControls.appendChild(bdebug);

        this.#pageLabel = document.createElement('label');
        this.#pageLabel.style.marginLeft = '12px';
		this.#pageLabel.style.color = '#fff';
        this.#buttonControls.appendChild(this.#pageLabel);

        let selectPage = document.createElement('select');
        selectPage.title = 'Rows per page';
        selectPage.style = `
            margin-left: 1rem;
            padding: .65rem 1rem;
            border-style: solid;
            border-color: #ccc;
            border-radius: .65rem;
        `;
		selectPage.classList.add('input-simple');
        this.#buttonControls.appendChild(selectPage);

        let option0 = document.createElement('option');
        option0.value = 8;
        option0.innerText = '8';
        selectPage.appendChild(option0);

        let option1 = document.createElement('option');
        option1.value = 15;
        option1.innerText = '15';
        option1.setAttribute('selected', '');
        selectPage.appendChild(option1);

        let option2 = document.createElement('option');
        option2.value = 25;
        option2.innerText = '25';
        selectPage.appendChild(option2);

        let option3 = document.createElement('option');
        option3.value = 50;
        option3.innerText = '50';
        selectPage.appendChild(option3);

        selectPage.onchange = (ev) =>
        {
            let val = ev.target.value;
            this.maxRowsPerPage = val;
        };
    }
}

export default TableSearch;
