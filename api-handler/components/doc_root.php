<?php

/* HTML document root */

?>
<!DOCTYPE html>
<html lang='pt'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title><?php echo $page_obj['TITLE']; ?> - Ugarit Transliterator</title>
        <link rel="stylesheet" href="./theme.css">
    </head>

    <body>
        <?php
        
        if(!empty($page_obj['HEAD']))
        {
            require $page_obj['HEAD'];
        }
        
        ?>
        
        <main>
            <?php require $page_obj['MAINHTML']; ?>
        </main>

        <?php require './components/page_footer.php'; ?>
    </body>
</html>
<?php

die();

?>