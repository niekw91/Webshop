<?php
	session_start();
	require("controller/DatabaseController.php");
	
	if(isset($_GET['page'])) {
		// Array met alle pagina's
		$pages=array("products", "cart");
		
		if(in_array($_GET['page'], $pages)) {
			// Pagina gevonden in array, ga naar pagina
			$page=$_GET['page'];
		
		} else {
			// Pagina niet in array, ga naar default
			$page="products";
		
		}
	
	} else {
		// Geen pagina variabele gevonden, ga naar default
		$page="products";
		
	}
?>

<head>
	<title>Webshop</title>
	
	<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="header">
	
	<?php require("header.php"); ?>
	
</div>

<div class="main">

	<?php require("view/".$page.".php"); ?>

</div>

<div class="footer">


</div>

</body>
