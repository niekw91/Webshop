<?php

	if(isset($_POST['submit'])) {
		
		foreach($_POST['quantity'] as $key => $val) {
			if($val==0) {
				unset($_SESSION['cart'][$key]);
			} else {
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
	}
	

?>

<form method="post" action="index.php?page=cart">
	<table class="items">
		<tr>
			<th>Naam</th>
			<th>Aantal</th>
			<th>Prijs</th>
			<th>Prijs totaal<th>
		</tr>
		
		<?php
			// Maak sql string met product id's die in de session cart zitten
			$sql="SELECT * FROM product WHERE id IN (";
			foreach($_SESSION['cart'] as $id => $value) {
				$sql.=$id.",";
			}
			$sql=substr($sql, 0, -1).")";
			// Maak database controller en stuur query
			$row = DatabaseController::executeQuery($sql);
			$totaal=0;
			foreach($row as $value) {
				$subtotaal=$_SESSION['cart'][$value['id']]['quantity']*$value['price'];
				$totaal+=$subtotaal;
			?>
				<tr>
					<td><?php echo $value['name'] ?></td>
					<td><input type="text" name="quantity[<?php echo $value['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$value['id']]['quantity'] ?>"/></td>
					<td><?php echo $value['price'] ?></td>
					<td><?php echo $_SESSION['cart'][$value['id']]['quantity']*$value['price'] ?></td>
				</tr>
			<?php
			}
		?>
		
			<tr>
				<td>Totaal prijs:</td>
				<td><?php echo $totaal ?></td>
			</tr>
	</table>
	<br />
	<button type="submit" name="submit">Update</button>
</form>