<?php

	if(isset($_GET['action']) && $_GET['action']=="add") {
	
		$id=intval($_GET['id']);
	
		if(isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity']++;
		
		} else {
		
			$database = new DatabaseController();
			$database->doSQL("SELECT id, name, category_id, price FROM product
							 WHERE id=($id)");
			if($row_s = $database->getRecord()) {			
				$_SESSION['cart'][$row_s['id']]=array(
					"quantity" => 1,
					"price" => $row_s['price']);
				
			} else {

				$message="Productcode ongeldig!";
			
			}
		}
	
	}
?>
<div id="products">
	<h1>Producten</h1>
	<?php
	
		if(isset($message)) {
			echo $message;
		}
	?>
	<table class="items">
		<tr>
			<th>Naam</th>
			<th>Categorie</th>
			<th>Prijs</th>
		</tr>
		
		<?php
		
			$database = new DatabaseController();
			$database->doSQL("SELECT id, name, category_id, price FROM product");
			
			while ($row = $database->getRecord()) {
			
		?>
			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['category_id'] ?></td>
				<td><?php echo $row['price'] ?></td>
				<td><a href="index.php?page=products&action=add&id=<?php echo $row['id'] ?>">Add to cart</a></td>
			</tr>
		
		<?php
			}
		?>
	</table>
</div>
	
<div id="side">
	<ul>
	<?php
		$database = new DatabaseController();
		$database->doSQL("SELECT * FROM category");
		
		while ($row = $database->getRecord()) {
	?>
		<li><a href="index.php?page=products&cat=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></li>
	<?php
		}	
	?>
	</ul>
</div>

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
			$database = new DatabaseController();
			$database->doSQL($sql);
			while($row = $database->getRecord()) {
			?>
				<p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity'] ?></p>
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