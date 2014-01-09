<?php


session_start();
require("controller/databasecontroller.php");

// Array met alle pagina's
$pages=array("products", "product", "cart", "order");
	
if(isset($_GET['page'])) {	
	if(in_array($_GET['page'], $pages)) {
		// Pagina gevonden in array, zet $page pagina
		$page=$_GET['page'];
	} else {
		// Pagina niet in array, zet $page naar default
		$page="products";
	}
} else {
	// Geen pagina variabele gevonden, zet $page naar default
	$page="products";
}

foreach ($pages as $arrayPage) {
    if ($page == $arrayPage) {
        if ($page == $arrayPage) {
            $page .= "controller";
            include_once("controller" . DIRECTORY_SEPARATOR . "$page.php");
            $displayPage = new $page();
            $displayPage->invoke();
            return;
        }
    }
}


?>
