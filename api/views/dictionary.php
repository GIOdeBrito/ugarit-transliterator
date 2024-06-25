<?php

/* Ugaritic words dictionary search */

?>
<section class='dictionary-header'>
    <header>
        <h1>Ugaritic Dictionary</h1>
    </header>

    <section>
        <p>You can use the '%' character for advanced searching.</p>
        <p>Example: Use <mark class='highlight'>a%</mark> to display all entries that begin with the letter 'a'.</p>
    </section>
</section>

<section class='inputbox'>
    <input name='search' type="text" value="">
    <img src="./assets/icons/magnifier.webp" width=30 alt="magnifier">
</section>

<section>
    <table hidden>
        <thead>
            <tr>
                <th>Word</th>
                <th>Translation</th>
                <th>Cuneiform</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody id="item-table-body">
        </tbody>
    </table>
</section>

<script type="module" src='/assets/js/views/dictionary.js'></script>

<style>

    .dictionary-header > header > h2, h1 {
        text-align: center;
        color: #fff;
        letter-spacing: 0;
        font-weight: 300;
    }

    .dictionary-header > section {
        margin: 1rem 0;
    }

    .dictionary-header > section > p {
        text-align: center;
        color: #ffffff4f;
        margin: 0;
    }

    .highlight {
        background-color: #0000;
        color: var(--color-golden-strong);
    }

    input[type=text] {
        padding: .5rem;
        width: 50vw;
    }

    .inputbox {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .inputbox > img {
        width: 1.25rem;
        height: 1.25rem;
        margin: auto 10px;
    }

</style>