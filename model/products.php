<?php

/**
 * Description of Products
 *
 */
class Products {

	public function __construct() {
		include_once 'model' . DIRECTORY_SEPARATOR . 'product.php';
	}
	
	/**
	 * Haal een specifiek product op d.m.v. het id
	 *
	 */
	public function getProduct($id) {
		return new Product($id);
	}
	
	/**
	 * Haal alle producten op met eventueel de categorie
	 *
	 */
	public function getAllProducts($categoryId = null) {
		$query = "SELECT p.*, c.parentcategory_id
				  FROM product AS p
				  JOIN category AS c
				  ON p.category_id = c.id ";
		
		if(!is_null($categoryId)) {
			$query .= "WHERE category_id = ?
					   OR parentcategory_id = ?";
		}
				  
		if (!is_null($categoryId)) {
            $result = DatabaseController::executeQuery($query, array($categoryId, $categoryId));
        } else {
            $result = DatabaseController::executeQuery($query);
        }
		return $result;
	}
	
	/**
	 * Haal alle producten op met de meegegeven string als naam
	 *
	 */
	public function getProductsByName($name) {
		$like = "%".$name."%";
	
		$query = "SELECT *
				  FROM product
				  WHERE name LIKE ?";
	
		$result = DatabaseController::executeQuery($query, array($like));
		return $result;
	}
	
	/**
	 * Haal alle producten op uit de sessie 'cart'
	 *
	 */
	public function getProductsInCart() {
		if(isset($_SESSION['cart'])) {
			// Maak sql string met product id's die in de session cart zitten
			$query = "SELECT * FROM product WHERE id IN (";
			foreach($_SESSION['cart'] as $id => $value) {
				$query .= $id.",";
			}
			$query = substr($query, 0, -1).")";

			$result = DatabaseController::executeQuery($query);
			return $result;
		}	
	}

}

?>