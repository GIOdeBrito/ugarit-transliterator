
import { HttpPost } from "../httpreq.js";

window.addEventListener('load', function ()
{
	window['text-transliterate-in'].oninput = async function (ev)
	{
		let response = await HttpPost('transliterate', { text: ev.target.value });

		window['result-label'].textContent = response;
	};
});

function configurations ()
{
	window['radio-usevowel'].onchange = () =>
	{
		setGlobal('omitVowels', false);
	};

	window['radio-omitvowel'].onchange = () =>
	{
		setGlobal('omitVowels', true);
	};
}
