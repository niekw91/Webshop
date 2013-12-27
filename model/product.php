<?php
/**
 * Description of Product
 *
 */
class Product {
    
    private $id;
    private $name;
    private $description_short;
    private $description_long;
    private $image_small;
	private $image_large;
	private $price;
    
	/**
	 * Constructor voor Product
	 * Haalt de bijbehorende gegevens op als er een id wordt meegegeven
	 */
	public function __construct($id = null) {
		if(!is_null($id)) {
			$this->id = $id;
			$this->loadProductData($id);
		}
	}
	
	/**
	 * Methodes voor het setten van de klasse variabelen
	 * 
	 */
	public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setShortDescription($description_short) { $this->description_short = $description_short; }
	public function setLongDescription($description_long) { $this->description_long = $description_long; }
    public function setSmallImage($image_small) { $this->image_small = $image_small; }
	public function setLargeImage($image_large) { $this->image_large = $image_large; }
	public function setPrice($price) { $this->price = $price; }

	/**
	 * Methodes voor het opvragen van de klasse variabelen
	 * 
	 */
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getShortDescription() { return $this->description_short; }
	public function getLongDescription() { return $this->description_long; }
	public function getSmallImage() { return $this->image_small; }
	public function getLargeImage() { return $this->image_large; }
	public function getPrice() { return $this->price; }
	
	/**
	 * Haalt alle gegevens op d.m.v. het id van het blok
	 * 
	 */
	private function loadProductData() {
		$query = "SELECT *
				  FROM product
				  WHERE id = ?
				  GROUP BY id";
		
		$result = DatabaseController::executeQuery($query, array($this->id));
		
		$this->name = $result[0]['name'];
		$this->description_short = $result[0]['description_short'];
		$this->description_long = $result[0]['description_short'];
		$this->image_small = $result[0]['image_small'];
		$this->image_large = $result[0]['image_large'];
		$this->price = $result[0]['price'];
	}    
}

?>