<div id="content">
	<h1>Producten</h1>
	<?php
		// Als variabele $message is gezet, laat deze zien
		if(isset($message)) {
			echo $message;
		}
	?>
	<ul class="products">
		<?php
		foreach($products as $value) {
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
			foreach($categories as $value) {
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
		?>
		</ul>
	</div>
	
	<div id="side_search">
		<h1>Zoeken</h1>
		<form method="POST" action="index.php?page=products" id="searchform">
			<span><input type="text" name="name"><input type="submit" name="search" value="Zoeken"></span>
		</form>
	</div>
</div>


