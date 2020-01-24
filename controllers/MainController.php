<?php

namespace main\controllers;

use \main\components\Controller;

class MainController extends Controller{

    public function ActionShowMain(){
        $product = new \main\models\Product();
        $products = $product->getAllProducts();
        $paths = $product->getAdditionalData($products);
        $content_file = VIEWS.'/main.php';
        $page  = new \main\components\Page();
        $page->MainPage($content_file, $products, $paths);
    }
}