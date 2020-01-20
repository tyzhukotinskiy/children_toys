<?php

namespace main\controllers;

class MainController{

    public function ActionShowMain(){
        echo "<hr />Главная страница<hr />";
        $product = new \main\components\Product();
        $products = $product->getAllProducts();
        $content_file = VIEWS.'/main.php';
        $page  = new \main\components\Page();
        $page->MainPage($content_file, $products);
    }
}