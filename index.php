<?php

/* HTML document root */

require 'api/routing/v2/pages_location.php';

?>
<!DOCTYPE html>
<html lang='pt'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_obj->TITLE; ?> - Ugarit Transliterator</title>
        <link rel="stylesheet" href="/public/styles/theme.css">
        <script type='module' src='/public/src/views/index.js'></script>
    </head>

    <body>
        <?php
        
        if(file_exists($page_obj->HEAD))
        {
            require $page_obj->HEAD;
        }
        
        ?>
        
        <main>
            <?php
            
            if(file_exists($page_obj->MAINHTML))
            {
                require $page_obj->MAINHTML;
            }
            
            ?>
        </main>

        <?php require 'api/components/page_footer.php'; ?>
    </body>
</html>