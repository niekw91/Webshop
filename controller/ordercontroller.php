<?php

/**
 * Description of OrderController
 *
 */
class OrderController {
	
	private $productsModel;
	
    public function __construct()
    {
		include_once 'model' . DIRECTORY_SEPARATOR . 'products.php';
		$this->productsModel = new Products();
    }
    
    public function invoke()
    {
		$order = $this->productsModel->getProductsInCart();
		$total = 0;
		
		$page = 'order.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
	}
}
