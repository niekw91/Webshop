<?php

/**
 * Description of ProductController
 *
 */
class ProductController {
    
	private $productsModel;
	
    public function __construct()
    {
		include_once 'model' . DIRECTORY_SEPARATOR . 'products.php';
		$this->productsModel = new Products;
    }
    
    public function invoke()
    {
		if(isset($_GET['id'])) {
			$id=intval($_GET['id']);
			
			$result = $this->productsModel->getProduct($id);
			
			$id = $result->getId();
			$name = $result->getName();
			$shortDescription = $result->getShortDescription();
			$longDescription = $result->getLongDescription();
			$smallImage = $result->getSmallImage();
			$largeImage = $result->getLargeImage();
			$price = $result->getPrice();		
		}
		
		$page = 'product.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
	}
}