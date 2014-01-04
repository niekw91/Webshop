<h1>Winkelwagen</h1>
<?php
	// Als sessie 'cart' is gezet, laat winkelwagen pagina zien
	if(isset($_SESSION['cart'])) {
?>
	<div id="cartpage">
		<form method="post" action="index.php?page=cart">
			<table class="items">
				<tr>
					<th>Naam</th>
					<th>Aantal</th>
					<th>Prijs</th>
					<th>Prijs totaal<th>
					<th></th>
				</tr>
				
				<?php
					foreach($products as $value) {
						$subtotaal = $_SESSION['cart'][$value['id']]['quantity']*$value['price'];
						$total += $subtotaal;
					?>
						<tr>
							<td><?php echo $value['name'] ?></td>
							<td><input type="text" name="quantity[<?php echo $value['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$value['id']]['quantity'] ?>"/></td>
							<td>€<?php echo $value['price'] ?>,00</td>
							<td>€<?php echo $_SESSION['cart'][$value['id']]['quantity']*$value['price'] ?>,00</td>
							<td><button type="submit" name="delete[<?php echo $value['id'] ?>]">Verwijder</button></td>
						</tr>
					<?php
					}
				?>
				
					<tr>
						<td>Totaal prijs:</td>
						<td>€<?php echo $total ?>,00</td>
					</tr>
			</table>
			<br />
			<button type="submit" name="submit">Update</button>
		</form>
	</div>

	<div id="order">
		<br />
		<a href="index.php?page=order">Bestelling plaatsen</a>
	</div>
<?php
	} else {
		echo "Winkelwagen is leeg";
	}
?>