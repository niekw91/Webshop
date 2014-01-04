<?php

/**
 * Description of ProductsController
 *
 */
class ProductsController {
    
	private $productsModel;
	private $categoriesModel;
	
    public function __construct()
    {
		include_once 'model' . DIRECTORY_SEPARATOR . 'categories.php';
		include_once 'model' . DIRECTORY_SEPARATOR . 'products.php';
		$this->productsModel = new Products;
		$this->categoriesModel = new Categories;
    }
    
    public function invoke()
    {
		// Als actie 'add' is, voeg product toe aan winkelwagen
		if(isset($_GET['action']) && $_GET['action']=="add") {
			
			$id=intval($_GET['id']);
	
			if(isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['quantity']++;
			} else {
				//$result = DatabaseController::executeQuery("SELECT id, name, category_id, price FROM product WHERE id=($id)");
				$product = $this->productsModel->getProduct($id);
				if(isset($product)) {			
					$_SESSION['cart'][$product->getId()]=array(
						"quantity" => 1,
						"price" => $product->getPrice());
				} else {
					$message="Productcode ongeldig!";
				}
			}
		}
		// Als url 'cat' bevat, zet categorie variabele
		if(isset($_GET['cat'])) {
			$cat=($_GET['cat']);
		}
		// Als url 'search' bevat, zet naam variabele
		if(isset($_POST['search'])) {
			$name=($_POST['name']);

		}
		
		if(isset($name)) {
			// Haal producten op d.m.v. de naam
			$products = $this->productsModel->getProductsByName($name);
		} else {
			if(isset($cat)) {
				// Haal producten op d.m.v. de categorie
				$products = $this->productsModel->getAllProducts($cat);
			} else {
				// Geen categorie gevonden, haal alle producten op
				$products = $this->productsModel->getAllProducts();
			}
		}

		$categories = $this->categoriesModel->getAllCategories(false);	
	
        $page = 'products.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
    }
}
