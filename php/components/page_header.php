<?php

/* Ugarit transliterator page header */

?>
<header class="page-head">
    <h1>Ugarit Transliterator</h1>
</header>

<nav>
    <p>Home</p>
    <p>Transliterator</p>
    <p>Dictionary</p>
    <p>Articles</p>
</nav>

<style>

    .page-head {
        color: #fff;
        background-color: var(--color-foreground);
        border-color: var(--color-bordercolor);
        border-style: double;
        border-width: 6px;
        text-align: center;
    }

    nav {
        background-color: var(--color-foreground);
        border-color: var(--color-bordercolor);
        border-style: double;
        border-width: 6px;
        display: flex;
        flex-flow: wrap;
        justify-content: center;
        gap: 10vw;
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