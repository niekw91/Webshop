<?php

/**
 * Description of Products
 *
 */
class Products {

	public function __construct() {
		include_once('model/product.php');
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
	

}

?>