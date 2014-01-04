<?php

/**
 * Description of Categories
 *
 */
class Categories {

	public function __construct() {
		include_once 'model' . DIRECTORY_SEPARATOR . 'category.php';
	}
	
	/**
	 * Haal een specifieke categorie op d.m.v. het id
	 *
	 */
	public function getCategory($id) {
		return new Category($id);
	}
	
	/**
	 * Haal alle categorieen op
	 *
	 */
	public function getAllCategories($showSubcategories = true) {
		$query = "SELECT *
				  FROM category ";
		// If showSubcatgories is false, laat alleen de hoofdcatgorieen zien
		if(!$showSubcategories) {
			$query .= "WHERE parentcategory_id IS NULL";
		}
				  
        $result = DatabaseController::executeQuery($query);
		
		return $result;
	}
	
	/**
	 * Haal alle subcategorieen op van het meegegeven categorie id
	 *
	 */
	public function getSubCategories($id) {
		$query = "SELECT *
				  FROM category
				  WHERE parentcategory_id = ?";
				  
        $result = DatabaseController::executeQuery($query, array($id));
		
		return $result;
	}
	

}

?>