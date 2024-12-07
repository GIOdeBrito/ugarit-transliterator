<?php

/* HTML document root */

//require 'api/routing/v2/pages_location.php';
require 'helpers/routing.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $controller->title(); ?> — Ugarit Transliterator</title>
    <link rel="stylesheet" href="public/styles/master.css">
	<link rel="stylesheet" href="public/styles/header.css">
	<link rel="stylesheet" href="public/styles/footer.css">
	<?php

	if(!empty($controller->get_stylesheets()))
	{
		foreach ($controller->get_stylesheets() as $src)
		{
			?>
			<link rel="stylesheet" href="<?php echo $src; ?>">
			<?php
		}
	}

	if(!empty($controller->get_scripts()))
	{
		foreach($controller->get_scripts() as $item)
		{
			?>
			<script src="<?php echo $item['src']; ?>" type="<?php echo $item['type']; ?>"></script>
			<?php
		}
	}

	?>
</head>

<body>
    <?php require 'views/page_head.php'; ?>

    <main>
	    <?php

	    $controller->render_body();

	    ?>
    </main>

    <?php require 'views/page_footer.php'; ?>
</body>
</html>