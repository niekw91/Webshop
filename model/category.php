<?php

/**
 * Description of Category
 *
 */
class Category {

    private $id;
    private $name;
    private $parentCategoryId;

	/**
	 * Constructor voor Category
	 * Haalt de bijbehorende gegevens op als er een id wordt meegegeven
	 */
	public function __construct($id = null) {
		if(!is_null($id)) {
			$this->id = $id;
			$this->loadCategoryData($id);
		}
	}
	
	/**
	 * Methodes voor het setten van de klasse variabelen
	 * 
	 */
	public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setParentCategoryId($parentCategoryId) { $this->parentCategoryId = $parentCategoryId; }

	/**
	 * Methodes voor het opvragen van de klasse variabelen
	 * 
	 */
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getParentCategoryId() { return $this->parentCategoryId; }
	
	/**
	 * Haalt alle gegevens op d.m.v. het id van de categorie
	 * 
	 */
	private function loadCategoryData() {
		$query = "SELECT *
				  FROM category
				  WHERE id = ?";
		
		$result = DatabaseController::executeQuery($query, array($this->id));
		
		$this->name = $result[0]['name'];
		$this->parentCategoryId = $result[0]['parentcategory_id'];
	} 
}

?>