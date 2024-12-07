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