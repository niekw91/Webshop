<div id="cart">
	<h1>Winkelwagen</h1>
	<?php 
	
	if(isset($_SESSION['cart'])) {
	
			// Maak sql string met product id's die in de session cart zitten
			$sql="SELECT id, name FROM product WHERE id IN (";
			foreach($_SESSION['cart'] as $id => $value) {
				$sql.=$id.",";
			}
			$sql=substr($sql, 0, -1).")";
			// Maak database controller en stuur query
			$row = DatabaseController::executeQuery($sql);
			foreach($row as $value) {
			?>
				<p><?php echo $value['name'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity'] ?></p>
			<?php
			}
	?>
		<hr />
		<a href="index.php?page=cart">Ga naar winkelwagen</a>
	<?php
	} else {
		echo "<p>Winkelwagen is leeg</p>";
	}
	?>
</div>