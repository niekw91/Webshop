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
	if(isset($_POST['search'])) {
		$name=($_POST['name']);
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
		include_once("model/products.php");
		$productsModel = new Products;
		if(isset($name)) {
			$result = $productsModel->getProductsByName($name);
		} else {
			if(isset($cat)) {
				$result = $productsModel->getAllProducts($cat);
			} else {
				$result = $productsModel->getAllProducts();
			}
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
	<div id="side_cat">
		<h1>Categorieen</h1>
		<ul>
		<?php
			
			include_once("model/categories.php");
			$categoriesModel = new Categories;
			$result = $categoriesModel->getAllCategories(false);		
			/*
			foreach($result as $value) {
				// Selecteer 'parentcategory_id' voor hoofdcategorie
				echo "<li><a href='index.php?page=products&cat=".$value['id']."'>".$value['name']."</a>";
				
				// Selecteer 'id' voor subcategorie
				
				// echo li
			}
			*/
			
			
			foreach($result as $value) {
				echo "<li class='has-sub'><a href='index.php?page=products&cat=".$value['id']."'>".$value['name']."</a>";
				$subCat = $categoriesModel->getSubCategories($value['id']);
				if(!empty($subCat[0]['name'])) {
					echo "<ul>";
					foreach($subCat as $subValue) {
						echo "<li><a href='index.php?page=products&cat=".$subValue['id']."'>".$subValue['name']."</a></li>";
					}
					echo "</ul>";
				} else {
					echo "</li>";
				}
			}
			
			
			
			

			
			//while ($row = $database->getRecord()) {
				//echo "<li><a href='index.php?page=products&cat=".$row['name']."'>".$row['name']."</li>";
			//}	
		?>
		</ul>
	</div>
	
	<div id="side_search">
		<h1>Zoeken</h1>
		<form method="POST" action="index.php?page=products" id="searchform">
			<span><input type="text" name="name"><input type="submit" name="search" value="Zoek"></span>
		</form>
	</div>
</div>



