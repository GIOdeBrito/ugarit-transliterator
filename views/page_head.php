<?php

/* Page header */

?>
<article class="page-head">
    <header>
        <h1>
			<mark>U</mark>garit Transliterator
		</h1>

        <hr>

        <nav>
            <p id='bhome'>Home</p>
            <p id='btransliterate'>Transliterator</p>
            <p id='bdicio'>Dictionary</p>
            <p id='barticle'>Articles</p>
        </nav>
    </header>
</article>

<script type='module'>

    window.addEventListener('load', () =>
    {
        setHeadControls();
    });

    function setHeadControls ()
    {
        window.bhome.onclick = () =>
        {
            window.location = '/';
        };

        window.btransliterate.onclick = () =>
        {
            window.location = 'transliterate';
        };

        window.bdicio.onclick = () =>
        {
            window.location = 'dictionary';
        };
    }

</script>