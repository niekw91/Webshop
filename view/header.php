<head>
	<link href="styles/header.css" rel="stylesheet" type="text/css" />
</head>

<body>

<ul id="navmenu">
	<li><h1>WEBSHOP</h1></li>
	<!-- <li><a href="index.php?page=home">Home</a></li> -->
	<li><a href="index.php?page=products">Producten</a><span class="darrow">&#9660;</span>
	
	<ul class='sub1'>
	<?php
		include_once("model/categories.php");
		$categoriesModel = new Categories;
		$result = $categoriesModel->getAllCategories(false);	

		foreach($result as $value) {
			echo "<li><a href='index.php?page=products&cat=".$value['id']."'>".$value['name']."</a><span class='rarrow'>&#9654;</span>";
			$subCat = $categoriesModel->getSubCategories($value['id']);
			if(!empty($subCat[0]['name'])) {
				echo "<ul class='sub2'>";
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
	<li><a href="index.php?page=cart">Winkelwagen</a></li>
</ul>
