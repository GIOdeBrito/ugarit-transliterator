
window.addEventListener('load', function ()
{
	fetchParallaxElements();
});

var ELEMENTS = [];

function fetchParallaxElements ()
{
	let elements = Array.from(document.querySelectorAll('*[data-parallax]'));

	if(elements.length === 0)
	{
		return;
	}

	ELEMENTS = elements;

	elements.forEach(item =>
	{
		let src = item.getAttribute('data-parallax');

		item.style = `
			background-image: url(${src});
			background-size: cover;
			background-repeat: repeat-y;
			background-position-y: 50%;
			background-color: rgba(0, 0, 0, 0.43);
			background-blend-mode: hard-light;
		`;

		item.classList.add('parallax-container');
	});

	/* 1 - Down, -1 - Up */
    let direction = 0;
    let offsetAmount = 0;

	let main = document.querySelector('main');

	main.addEventListener('scroll', () =>
	{
		let oldAmount = offsetAmount;

        offsetAmount = main.pageYOffset || main.scrollTop;

        // Going down
        if(offsetAmount > oldAmount)
        {
            direction = 1;
        }
        else
        {
            direction = -1;
        }

        updateParallax(direction);
	});
}

function updateParallax (direction)
{
    let elements = ELEMENTS;

    elements.forEach(item =>
    {
        let buffered = parseFloat(item.style.backgroundPositionY);

        if(isNaN(buffered))
        {
            buffered = 0.0;
        }

        let calc = buffered + (.18 * direction) * -1;

        item.style.backgroundPositionY = calc + '%';
    });
}
