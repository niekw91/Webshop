<?php

/**
 * Description of HomeController
 *
 */
class HomeController {
    
	private $productsModel;
	
    public function __construct()
    {
		include_once 'model' . DIRECTORY_SEPARATOR . 'products.php';
		$this->productsModel = new Products();
    }
    
    public function invoke()
    {
		$products = $this->productsModel->getProductsInCart();
	
        $page = 'home.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
    }
}
