<?php

/**
 * Description of HomeController
 *
 */
class HomeController {
    
    public function __construct()
    {
        
    }
    
    public function invoke()
    {
        $page = 'home.php';
		include 'view' . DIRECTORY_SEPARATOR . 'template.php';
    }
}
