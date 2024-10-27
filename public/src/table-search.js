

window.addEventListener('DOMContentLoaded', function ()
{
	createSearchBar();
	TableSearch.start();
});

/**
* Creates the table's search inputs and controls.
*/
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

/**
* Global class for storing and managing necessary data for the tables.
*/
class TableSearch
{
	/**
	* Holds all created and set table tables.
	* @private
	* @static
	* @type {Array<TableSearchModel>}
	*/
	static #allsearch = [];

	/**
	* Initiliaze the controls of the tables.
	* @static
	*/
	static start ()
	{
		this.#setControls();
	}

	/**
	* Adds an item to the main table array.
	* @param {TableSearchModel} item
	*/
	static add (item)
	{
		this.#allsearch.push(item);
	}

	/**
	* Returns all table models as an array.
	* @static
	* @returns {Array<TableSearchModel>}
	*/
	static get all ()
	{
		return this.#allsearch;
	}

	/**
	* Sets the table controls actions.
	* @private
	* @returns {void}
	*/
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

	/**
	* @type {Array<HTMLElement>}
	* The row elements of the table.
	*/
	#rows = [];

	/**
	* @type {Array<string>}
	* The textContent of the rows, they will be compared to keywords
	* to improve performance and response time.
	*/
	#rowContent = [];

	#maxRowsPerPage = 15;
	#currentPage = -1;

	#currentSelectedRows = [];
	#pagesArray = [];

	#tableRow = null;

	/**
	* @constructor
	* @param {HTMLInputElement} search - The search bar input element.
	* @param {HTMLSectionElement} buttons - The group of buttons at the bottom of the table.
	* @param {HTMLTableElement} table
	*/
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

	/**
	* Returns the max number of rows allowed per page.
	* @returns {number}
	*/
	get maxRowsPerPage ()
	{
		return this.#maxRowsPerPage;
	}

	/**
	* Returns the max number of rows allowed per page.
	* @param {number} num
	*/
	set maxRowsPerPage (num)
	{
		this.#maxRowsPerPage = num;
		this.refresh();
	}

	get currentPage ()
	{
		return this.#currentPage;
	}

	/**
	* Stores and processes all the current rows the table has.
	* @returns {void}
	*/
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

	/**
	* Returns the max number of rows allowed per page.
	* @returns {HTMLElement}
	*/
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
		/*selectPage.style = `
			margin-left: 1rem;
			padding: .65rem 1rem;
			border-style: solid;
			border-color: #ccc;
			border-radius: .65rem;
		`;*/
		selectPage.classList.add('input-select-simple');
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
