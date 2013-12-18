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
<div id="content">
	<h1>Producten</h1>
	<?php
		if(isset($message)) {
			echo $message;
		}
	?>
	<ul class="products">

		<?php
		$result = DatabaseController::executeQuery("SELECT * FROM product");
		foreach($result as $value) {
		?>
		<li>
			<a href="#">
				<img src="<?php echo $value['image_small'] ?>">
				<h4><?php echo $value['name'] ?></h4>
				<p>€<?php echo $value['price'] ?></p>
			</a>
			<br />
			<p><a href="index.php?page=products&action=add&id=<?php echo $value['id'] ?>">In winkelwagen</a></p>
		</li>	
	<?php
	}
	?>
	</ul>
</div>
	
<div id="side">
	<h1>Categorieen</h1>
	<ul>
	<?php
		
		$row = DatabaseController::executeQuery("SELECT * FROM category WHERE parentcategory_id IS NULL");
		foreach($row as $value) {
			echo "<li><a href='index.php?page=".$value['name']."'>".$value['name']."</a>";
		}
		
		
		/*
		$row = DatabaseController::executeQuery("SELECT * FROM category WHERE parentcategory_id IS NULL");
		foreach($row as $value) {
			echo "<li><a href='index.php?page=".$value['name']."'>".$value['name']."</a>";
			$subRow = DatabaseController::executeQuery("SELECT * FROM category WHERE parentcategory_id = ".$value['id']."");
			if(!empty($subRow[0]['name'])) {
				echo "<ul>";
				foreach($subRow as $subValue) {
					echo "<li><a href='index.php?page=".$subValue['name']."'>".$subValue['name']."</a></li>";
				}
				echo "</ul>";
			} else {
				echo "</li>";
			}
		}
		*/
		
		

		
		//while ($row = $database->getRecord()) {
			//echo "<li><a href='index.php?page=products&cat=".$row['name']."'>".$row['name']."</li>";
		//}	
	?>
	</ul>
</div>

