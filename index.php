<?php

/* HTML document root */

require 'helpers/routing.php';
require 'helpers/data_map.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
	<meta name="author" content="GIOdeBrito">
    <meta name="description" content="A transliterator and dictionary for the Ugaritic language">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $controller->title(); ?> — Ugarit Transliterator</title>
    <link rel="stylesheet" href="public/styles/master.css">
	<link rel="stylesheet" href="public/styles/header.css">
	<link rel="stylesheet" href="public/styles/footer.css">
	<link rel="stylesheet" href="public/styles/classes.css">
	<?php

	foreach($controller->get_stylesheets() ?? [] as $src)
	{
		?>
		<link rel="stylesheet" href="<?php echo $src; ?>">
		<?php
	}

	?>
	<script src="public/src/nav.js" type="module"></script>
	<?php

	js_data_map('SESSION_UG', $controller->get_vars());

	foreach($controller->get_scripts() ?? [] as $item)
	{
		?>
		<script src="<?php echo $item['src']; ?>" type="<?php echo $item['type']; ?>"></script>
		<?php
	}

	?>
</head>

<body>
    <?php require 'views/page_head.php'; ?>

    <main>
	    <?php $controller->render_body(); ?>
    </main>

    <?php require 'views/page_footer.php'; ?>
</body>
</html>