<?php

/* Admin dictionary words controller */

require_once 'include/ugarit_database.php';

?>
<section class="insert-word">
    <header>
        <h2>Insert Dictionary Word</h2>
    </header>

    <section>
        <section>
            <label for="word-in">Word:</label>
            <input id="word-in" type="text" value="">
        </section>

        <section>
            <label for="translate-in">Translation:</label>
            <input id="translate-in" type="text" value="">
        </section>

        <section>
            <label for="cuneo-in">Cuneiform:</label>
            <input id="cuneo-in" type="text" value="">
        </section>
    </section>

    <section>
        <section>
            <label for="desc-in">Description:</label>
            <textarea id="desc-in" rows=3 cols=55></textarea>
        </section>
    </section>

    <section>
        <button id="bregister">Register</button>
    </section>
</section>

<section>
    <header>
        <h2>All Dictionary Words</h2>
    </header>

    <input id="word-search-bar" type="text">

    <table id="entry-table">
        <thead>
            <tr>
                <th>Index</th>
                <th>Word</th>
                <th>Translation</th>
                <th>Cuneiform</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php

        $word_query = 'SELECT * FROM SEARCH_WORD';
        $db = new UDatabase();
        $res = $db->query($word_query);

        foreach($res as $item)
        {
            echo '<tr>';
            echo '<th>'.$item['ID'].'</th>';
            echo '<th>'.$item['WORD'].'</th>';
            echo '<th>'.$item['TRANSLATION'].'</th>';
            echo '<th>'.$item['CUNEIFORM'].'</th>';
            echo '<th>'.$item['INFORMATION'].'</th>';
            echo '<th>';
                echo  '<button>Edit</button>';
                echo  '<button onclick="removeItem(this)">Delete</button>';
            echo '</th>';
            echo '</tr>';
        }

        ?>
        </tbody>
    </table>
</section>

<script type="module">

    import { searchTable } from "./js/table-search.js";
    import { HttpRequest } from "./js/httpreq.js";

    window.addEventListener('load', () =>
    {
        window['word-search-bar'].oninput = function ()
        {
            searchTable(this.value, window['entry-table']);
        };

        setControls();
    });

    function setControls ()
    {
        window['bregister'].onclick = async () =>
        {
            const json = {
                word: window['word-in'].value ?? '',
                translation: window['translate-in'].value ?? '',
                cuneiform: window['cuneo-in'].value ?? '',
                desc: window['desc-in'].value ?? ''
            };

            let res = await HttpRequest('insertword_admin', json);
            console.log(res);
        };
    }

    function removeItem (element)
    {
        console.log(element);
    }

</script>

<style>

    section {
        color: #fff;
    }

    .insert-word > section {
        display: flex;
        gap: 1rem;
        margin: 1rem 0;
        justify-content: center;
    }
    .insert-word > section > section > * {
        display: block;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
    table > thead > tr > th {
        padding: 10px;
        background-color: var(--color-foreground);
    }
    table > tbody > tr:nth-child(odd) {
        background-color: #311808;
    }
    table > tbody > tr > th {
        padding: 10px;
    }

</style>