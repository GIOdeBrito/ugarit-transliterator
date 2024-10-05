<?php

/* Ugaritic words dictionary search */

?>
<section class='dictionary-header'>
    <section>
        <p>You can use the '%' character for advanced searching.</p>
        <p>Example: Use <mark class='highlight'>a%</mark> to display all entries that begin with the letter 'a'.</p>
    </section>
</section>

<section class='inputbox'>
    <input name='search' type="text" class="input-decorative input-hstretch padding-5">
    <img src="/public/images/magnifier.webp" width=30 alt="magnifier">
</section>

<section>
    <table hidden data-table-search>
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

<script type="module" src='/public/src/views/dictionary.js'></script>

<style>

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