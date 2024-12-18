<?php

function js_data_map (string $name, array $datavalues): void
{
	$id = md5(rand(1000,9999));

	?>
	<script id="<?php echo $id; ?>" type="text/javascript">

		const <?php echo $name; ?> = Object.freeze(<?php echo json_encode($datavalues); ?>);

		(function() { window['<?php echo $id; ?>']?.remove(); })();

	</script>
	<?php
}

?>