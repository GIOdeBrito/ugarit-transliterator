<?php

/* Checks if the current file's access is being
intermediated by admin */

if(!defined('FROM_ADMIN'))
{
    header('HTTP/3 403 Forbidden');
    ?>

    <section>
        <header>
            <h1>Permission not granted by admin</h1>
        </header>
    </section>
    
    <?php
    die();
}

?>