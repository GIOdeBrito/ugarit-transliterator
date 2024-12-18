<?php

/* Onomastics view */

?>
<article>
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Meaning</th>
			<th>Origin</th>
		</thead>

		<tbody>
			<?php

			$items = $this->get_onomastics_items();

			$i = 1;

			foreach($items as $item)
			{
				?>

				<tr>
					<td><?php echo $item["ID"]; ?></td>
					<td><?php echo $item["NAME"]; ?></td>
					<td><?php echo $item["MEANING"]; ?></td>
					<td><?php echo $item["ORIGIN"]; ?></td>
				</tr>

				<?php

				$i++;
			}

			?>
		</tbody>
	</table>
</article>