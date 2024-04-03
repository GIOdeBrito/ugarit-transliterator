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
        setHeadControls();
    });

    function setHeadControls ()
    {
        window.bhome.onclick = () =>
        {
            PageManager.ParamPage = 'home';
        };

        window.btransliterate.onclick = () =>
        {
            PageManager.ParamPage = 'transliterate';
        };

        window.bdicio.onclick = () =>
        {
            PageManager.ParamPage = 'dictionary';
        };
    }

</script>

<style>

    .page-head {
        width: 20vw;
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
        word-break: break-word;
    }

    .page-head > hr {
        overflow: visible;
        border: none;
        border-top: solid 1px;
        color: var(--color-bordercolor);
        margin: 0 auto;
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
        flex-flow: column;
        justify-content: center;
        gap: 5px;
    }
    nav > p {
        transition: transform 0.25s ease-in-out;
        padding: .5em 0;
        margin: 0;
    }
    nav > p:hover {
        transform: translateY(-3px);
        text-shadow: 2px 2px #bd0e0e;
        cursor: pointer;
    }

    /* For mobile screens */
    @media screen and (max-width: 786px) {
        .page-head {
            width: auto;
        }
        .page-head > hr {
            width: 40vw;
        }

        nav {
            display: flex;
            flex-flow: wrap;
            justify-content: center;
            gap: 20px;
        }
    }

</style>