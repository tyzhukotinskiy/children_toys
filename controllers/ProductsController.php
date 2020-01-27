<?php
namespace main\controllers;

use main\components\Controller;

class ProductsController extends Controller{

    /* контроллер для вывода товаров */
    public function actionShowProducts($category = null, $subcategory = null){
        $product = new \main\models\Product();
        $products = $product->getAllProducts($subcategory);
        $path = $product->getPath($subcategory);
        $content_file = VIEWS.'/products.php';
        $page  = new \main\components\Page();
        $page->Products($content_file, $category, $subcategory, $products, array($path));
    }

    /* контроллер для вывода подкатегорий */
    public function actionShowCategories($category){
        $subcategory = new \main\models\Subcategory();
        $subcategories = $subcategory->getAllSubcategories($category);
        $category_title = $subcategory->getCategory($category);
        $content_file = VIEWS.'/subcategories.php';
        $page  = new \main\components\Page();
        $page->Subcategories($content_file, $category, $subcategories, $category_title);
    }

    /* контроллер для вывода товара */
    public function actionShowProduct($category, $subcategory, $product_id){
        $content_file = VIEWS.'/product.php';
        $get_product = new \main\models\Product();
        $product = $get_product->getProductById($product_id);
        $additional_data = $get_product->getAdditionalData($product_id);
        $page  = new \main\components\Page();
        $page->Product($content_file, $product, $additional_data);
    }

    public function actionSearch(){
        $product_model = new \main\models\Product();
        $products = $product_model->searchProducts($_REQUEST['search_query']);
        $paths = $product_model->getAdditionalData($products);
        $content_file = VIEWS.'/search_products.php';
        $page  = new \main\components\Page();
        $page->SearchProducts($content_file, $products, $paths);
    }

    public function actionFilter(){
        $product_model = new \main\models\Product();
        $products = $product_model->filterProducts($_REQUEST);
        $paths = $product_model->getAdditionalData($products);
        $content_file = VIEWS.'/filter_products.php';
        $page  = new \main\components\Page();
        $page->FilterProducts($content_file, $products, $paths);
    }
}
?>