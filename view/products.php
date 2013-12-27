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
	if(isset($_GET['cat'])) {
	
		$cat=($_GET['cat']);
	
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
		include_once("Model/products.php");
		$productsModel = new Products;
		if(isset($cat)) {
			$result = $productsModel->getAllProducts($cat);
		} else {
			$result = $productsModel->getAllProducts();
		}
		foreach($result as $value) {
		?>
		<li>
			<a href="index.php?page=product&id=<?php echo $value['id'] ?>">
				<img src="<?php echo $value['image_small'] ?>">
				<h4><?php echo $value['name'] ?></h4>
				<p>€<?php echo $value['price'] ?>,00</p>
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
			// Selecteer 'parentcategory_id' voor hoofdcategorie
			echo "<li><a href='index.php?page=products&cat=".$value['id']."'>".$value['name']."</a>";
			
			// Selecteer 'id' voor subcategorie
			
			// echo li
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

