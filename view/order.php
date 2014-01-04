<div id="orderpage">

	<table class="items">
		<tr>
			<th>Naam</th>
			<th>Aantal</th>
			<th>Prijs</th>
			<th>Prijs totaal<th>
			<th></th>
		</tr>
		
		<?php
			foreach($order as $value) {
				$subtotaal = $_SESSION['cart'][$value['id']]['quantity']*$value['price'];
				$total += $subtotaal;
			?>
				<tr>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $_SESSION['cart'][$value['id']]['quantity'] ?></td>
					<td>€<?php echo $value['price'] ?>,00</td>
					<td>€<?php echo $_SESSION['cart'][$value['id']]['quantity']*$value['price'] ?>,00</td>
				</tr>
			<?php
			}
		?>
		
		<tr>
			<td>Totaal prijs:</td>
			<td>€<?php echo $total ?>,00</td>
		</tr>
	</table>
	
	<p>
		<br />Bedankt voor uw bestelling met de totaalwaarde van: €<?php echo $total ?>,00
		<br /><br />
		Terug naar <a href="index.php?page=home">home</a>
	</p>
	
	<?php
		// De bestelling is voltooid, verwijder de huidige sessie en leeg de winkelwagen
		unset($_SESSION['cart']);
	?>

</div>