
window.addEventListener('load', () =>
{
	setHeadControls();
});

function setHeadControls ()
{
	let nav = document.querySelector('nav');

	nav.querySelector('p[name="bhome"]').onclick = () => window.location = '/';

	nav.querySelector('p[name="btransliterate"]').onclick = () => window.location = 'transliterate';

	nav.querySelector('p[name="bdicio"]').onclick = () => window.location = 'dictionary';

	nav.querySelector('p[name="bonomastics"]').onclick = () => window.location = 'onomastics';
}

