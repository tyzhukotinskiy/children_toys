<?php
namespace main\controllers;

use main\components\Controller;

class ProductsController extends Controller{

    /* контроллер для вывода товаров */
    public function actionShowProducts($category = null, $subcategory = null){
        $title = "Товары в категории $category";
        $product = new \main\models\Product();
        $products = $product->getAllProducts($subcategory);
        $path = $product->getPath($subcategory);
        $content_file = VIEWS.'/products.php';
        $page  = new \main\components\Page();
        $page->Products($content_file, $category, $subcategory, $products, array($path));
    }

    /* контроллер для вывода подкатегорий */
    public function actionShowCategories($category){
        $title = "Категории продуктов на сайте";
        $subcategory = new \main\models\Subcategory();
        $subcategories = $subcategory->getAllSubcategories($category);
        $category_title = $subcategory->getCategory($category);
        $content_file = VIEWS.'/subcategories.php';
        $page  = new \main\components\Page();
        $page->Subcategories($content_file, $category, $subcategories, array($category_title));
    }

    /* контроллер для вывода товара */
    public function actionShowProduct($category, $subcategory, $product_id){
        $title = "Товар $product_id";
        $content_file = VIEWS.'/product.php';
        $get_product = new \main\models\Product();
        $product = $get_product->getProductById($product_id);
        $additional_data = $get_product->getAdditionalData($product_id);
        $page  = new \main\components\Page();
        $page->Product($content_file, $product, $additional_data);
    }
}
?>