<?php

/* Dictionary search */

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
                <th>Description</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>
</section>