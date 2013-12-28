<?php
/**
 * Description of Product
 *
 */
class Product {
    
    private $id;
    private $name;
    private $shortDescription;
    private $longDescription;
    private $smallImage;
	private $largeImage;
	private $price;
    
	/**
	 * Constructor voor Product
	 * Haalt de bijbehorende gegevens op als er een id wordt meegegeven
	 */
	public function __construct($id = null) {
		if(!is_null($id)) {
			$this->id = $id;
			$this->loadProductData();
		}
	}
	
	/**
	 * Methodes voor het setten van de klasse variabelen
	 * 
	 */
	public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setShortDescription($shortDescription) { $this->shortDescription = $shortDescription; }
	public function setLongDescription($longDescription) { $this->longDescription = $longDescription; }
    public function setSmallImage($smallImage) { $this->smallImage = $smallImage; }
	public function setLargeImage($largeImage) { $this->largeImage = $largeImage; }
	public function setPrice($price) { $this->price = $price; }

	/**
	 * Methodes voor het opvragen van de klasse variabelen
	 * 
	 */
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getShortDescription() { return $this->shortDescription; }
	public function getLongDescription() { return $this->longDescription; }
	public function getSmallImage() { return $this->smallImage; }
	public function getLargeImage() { return $this->largeImage; }
	public function getPrice() { return $this->price; }
	
	/**
	 * Haalt alle gegevens op d.m.v. het id van het product
	 * 
	 */
	private function loadProductData() {
		$query = "SELECT *
				  FROM product
				  WHERE id = ?
				  GROUP BY id";
		
		$result = DatabaseController::executeQuery($query, array($this->id));
		
		$this->name = $result[0]['name'];
		$this->shortDescription = $result[0]['description_short'];
		$this->longDescription = $result[0]['description_long'];
		$this->smallImage = $result[0]['image_small'];
		$this->largeImage = $result[0]['image_large'];
		$this->price = $result[0]['price'];
	}    
}

?>