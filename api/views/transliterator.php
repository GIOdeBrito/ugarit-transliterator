<?php

/* Transliterator page */

?>
<section class="config-field">
    <fieldset>
        <legend>Configuration:</legend>

        <section>
            <label for="radio-usevowel">Literal:</label>
            <input id="radio-usevowel" type="radio" name="use-vowels" checked>

            <label for="radio-omitvowel">Format:</label>
            <input id="radio-omitvowel" type="radio" name="use-vowels">
        </section>
    </fieldset>
</section>

<section class="input-section">
    <textarea id="text-transliterate-in" rows=4 cols=50 class="input-decorative"></textarea>
    <p id="result-label"></p>
</section>

<script type='module'>

    /*import { convertTextToCuneiform, setGlobal } from "/public/src/transliterator.js";*/
	import { HttpGet } from "/public/src/httpreq.js";

    window.addEventListener('load', function ()
    {
        window['text-transliterate-in'].oninput = async function ()
        {
            //let res = convertTextToCuneiform(this.value);

			let res = await HttpGet(`/api/v1/transliterate/${this.value}/`);
			//console.log(res);

            window['result-label'].textContent = res?.['rawtext'];
        };

        //configurations();
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

</script>

<style>

    .config-field > fieldset {
        color: #fff;
        border-style: dashed;
        margin: 2rem auto;
        max-width: 400px;
        border-color: var(--color-golden);
    }
    .config-field > fieldset > legend {
        font-weight: bold;
    }

    .input-section {
        text-align: center;
    }
    .input-section > p {
        color: #fff;
        font-size: 1.6rem;
    }

    #text-transliterate-in {
        font-family: 'Noto Sans Ugaritic';
    }

    #result-label {
        font-family: 'Noto Sans Ugaritic';
    }

</style>