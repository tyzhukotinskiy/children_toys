<?php
namespace main\controllers;

class ProductsController{


    public function actionShowProducts($category = null, $subcategory = null){
        echo "<hr />Товары в этой Подкатегории $subcategory в этой $category <hr />";
        $title = "Товары в категории $category";
        $product = new \main\components\Product();
        $products = $product->getAllProducts($subcategory);
        $content_file = VIEWS.'/products.php';
        $page  = new \main\components\Page();
        $page->Products($content_file, $category, $subcategory, $products);
    }

    public function actionShowCategories($category){
        $title = "Категории продуктов на сайте";
        $subcategory = new \main\models\Subcategory();
        $subcategories = $subcategory->getAllSubcategories($category);
        $content_file = VIEWS.'/subcategories.php';
        $page  = new \main\components\Page();
        $page->Subcategories($content_file, $category, $subcategories);
    }

    public function actionShowProduct($category, $subcategory, $product_id){
        echo "<hr />Товар $product_id в этой Подкатегории $subcategory в этой $category <hr />";
        $title = "Товар $product_id";
        $content_file = VIEWS.'product.php';
        $page  = new \main\components\Page($content_file, $title, $product_id);
    }
}
?>