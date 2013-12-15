<?php

	if(isset($_GET['action']) && $_GET['action']=="add") {
	
		$id=intval($_GET['id']);
	
		if(isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity']++;
		
		} else {
		
			$row_s = DatabaseController::executeQuery("SELECT id, name, category_id, price FROM product WHERE id=($id)");
			if(!empty($row_s[0]['id'])) {			
				$_SESSION['cart'][$row_s[0]['id']]=array(
					"quantity" => 1,
					"price" => $row_s[0]['price']);
				
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
		
			$row = DatabaseController::executeQuery("SELECT id, name, category_id, price FROM product");
			
			foreach ($row as $value) {
			
		?>
			<tr>
				<td><?php echo $value['name'] ?></td>
				<td><?php echo $value['category_id'] ?></td>
				<td><?php echo $value['price'] ?></td>
				<td><a href="index.php?page=products&action=add&id=<?php echo $value['id'] ?>">Add to cart</a></td>
			</tr>
		
		<?php
			} 
		?>
	</table>
</div>
	
<div id="side">
	<ul>
	<?php
		
	
	
	
		$row = DatabaseController::executeQuery("SELECT * FROM category WHERE parentcategory_id IS NULL");
		foreach($row as $value) {
			echo $value['name'];
			$subRow = DatabaseController::executeQuery("SELECT * FROM category WHERE parentcategory_id = ".$value['id']."");
			if(!empty($subRow[0]['name'])) {
				foreach($subRow as $value) {
					echo $value['name'];
				}
			}
		}
		

		
		//while ($row = $database->getRecord()) {
			//echo "<li><a href='index.php?page=products&cat=".$row['name']."'>".$row['name']."</li>";
		//}	
	?>
	</ul>
</div>

