<?php

/* Ugarit transliterator page header */

?>
<header class="page-head">
    <h1>Ugarit Transliterator</h1>

    <hr>
    
    <nav>
        <p id='bhome'>Home</p>
        <p id='btransliterate'>Transliterator</p>
        <p id='bdicio'>Dictionary</p>
        <p id='barticle'>Articles</p>
    </nav>
</header>

<script type='module'>

    import { PageManager } from "./js/webpage-components.js";

    window.addEventListener('load', () =>
    {
        console.log(PageManager);
        setHeadControls();
    });

    function setHeadControls ()
    {
        window.bhome.onclick = () =>
        {
            PageManager.ParamPage = 'home';
        };
        window.bdicio.onclick = () =>
        {
            PageManager.ParamPage = 'dictionary';
        };
    }

</script>

<style>

    .page-head {
        color: #fff;
        background-color: var(--color-foreground);
        border-color: var(--color-bordercolor);
        border-style: double;
        border-width: 6px;
        text-align: center;
    }
    .page-head > h1 {
        margin: 15px;
        font-weight: 500;
    }

    .page-head > hr {
        overflow: visible;
        border: none;
        border-top: solid 1px;
        width: 40vw;
        color: var(--color-bordercolor);
    }
    .page-head > hr:after {
        background-color: var(--color-foreground);
        top: -1.1em;
        position: relative;
        display: inline-block;
        content: '𐎁𐎍';
        font-size: 11px;
    }

    nav {
        display: flex;
        flex-flow: wrap;
        justify-content: center;
        gap: 5px;
    }
    nav > p {
        transition: transform 0.25s ease-in-out;
        padding: .5em;
        margin: 0;
    }
    nav > p:hover {
        transform: translateY(-3px);
        text-shadow: 2px 2px #bd0e0e;
        cursor: pointer;
    }

</style>