<?php

/* Onomastics view */

?>
<article>
	<table>
		<thead>
			<th>Index</th>
			<th>Name</th>
			<th>Meaning</th>
		</thead>

		<tbody>
			<?php

			$items = $this->get_onomastics_items();

			$i = 1;

			foreach($items as $item)
			{
				?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $item["NAME"]; ?></td>
					<td><?php echo $item["MEANING"]; ?></td>
				</tr>

				<?php

				$i++;
			}

			?>
		</tbody>
	</table>
</article>