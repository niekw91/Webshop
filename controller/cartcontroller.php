<?php

/**
 * Description of CartController
 *
 */
class CartController {

	private $productsModel;
    
    public function __construct()
    {
		include_once 'model' . DIRECTORY_SEPARATOR . 'products.php';
		$this->productsModel = new Products();
    }
    
    public function invoke()
    {
		if(isset($_SESSION['cart'])) {
			if(isset($_POST['submit'])) {
				foreach($_POST['quantity'] as $key => $val) {
					if($val==0) {
						unset($_SESSION['cart'][$key]);
					} else {
						$_SESSION['cart'][$key]['quantity'] = $val;
					}
				}
			}
			if(isset($_POST['delete'])) {
				foreach($_POST['delete'] as $key => $val) {
					unset($_SESSION['cart'][$key]);
				}
			}
			if(isset($_POST['order'])) {
				header("Location: index.php?page=order");
				exit();
			}
			
			$products = $this->productsModel->getProductsInCart();
			if(empty($products)) {
				unset($_SESSION['cart']);
			}
			$total = 0;
		}
		
		$page = 'cart.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
	}
}
