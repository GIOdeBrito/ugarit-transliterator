<?php

/* Ugarit transliterator main body */

?>
<article>
    <section class='header-section'>
        <header>
            <h1>Welcome to <mark>Ugarit Transliterator</mark></h1>
        </header>
    </section>

    <p>Version <?php echo defined('UGARIT_VERSION'); ?></p>
    
    <button>This is a button</button>
</article>

<style>

    .header-section {
        text-align: center;
    }

    h1 > mark {
        font-weight: bold;
        background-color: #0000;
        color: #fff;
        font-size: 2rem;
    }

</style>