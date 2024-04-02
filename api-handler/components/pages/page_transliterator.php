<?php

/* Transliterator page */

?>
<section class='title'>
    <header>
        <h2>Transliterator</h2>
    </header>
</section>

<section class="input-section">
    <input id="text-transliterate-in" type="text" value="">
    <p id="result-label"><i>Insert...</i></p>
</section>

<script type='module'>

    import { convertTextToCuneiform } from "./js/transliterator.js";

    window.addEventListener('load', () => 
    {
        window['text-transliterate-in'].oninput = function ()
        {
            let res = convertTextToCuneiform(this.value);
            window['result-label'].textContent = res;
        };
    });

</script>

<style>

    .title > header {
        color: #fff;
        text-align: center;
    }

    .input-section > p {
        color: #fff;
    }

</style>