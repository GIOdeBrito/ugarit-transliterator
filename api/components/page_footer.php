<?php

/* Ugarit transliterator page footer */

?>
<footer class="page-footer">
    <p>Giordano de Brito - <?php echo date('Y'); ?></p>
</footer>

<style>

    .page-footer {
        display: none;
        color: #fff;
        background-color: var(--color-foreground);
        border-color: var(--color-bordercolor);
        border-style: double;
        border-width: 3px 3px;
        box-sizing: border-box;
        text-align: center;
        margin-top: auto;
    }
    .page-footer > p {
        font-size: 12px;
    }

    /* If screen does not have enough vertical space */
    @media screen and (max-height: 500px) {
        footer[class='page-footer'] {
            display: none;
        }
    }

</style>