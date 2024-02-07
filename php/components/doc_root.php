<?php

/* HTML document root */

?>
<!DOCTYPE html>
<html lang='pt'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title><?php echo $page_obj->title; ?></title>
        <link rel="stylesheet" href="./theme.css">
    </head>

    <body>
        <?php require_once $page_obj->head; ?>
        
        <main>
            <?php require_once $page_obj->mainhtml; ?>
        </main>

        <?php require_once './components/page_footer.php'; ?>
    </body>
</html>
<?php

die();

?>