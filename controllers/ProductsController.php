<?php
	namespace main\controllers;

	class ProductsController{
		public function actionShowProducts($category = null, $product_id = null){
			$title = "Товары в категории $category";
			$content_file = VIEWS.'products_category.php';
			$page  = new \main\components\Page($content_file, $title);
		}

		public function actionShowCategories(){
			$title = "Категории продуктов на сайте";
			$cat = new \main\models\CategoriesModel();
			var_dump($cat);
			$content_file = VIEWS.'products_categories.php';
			$page  = new \main\components\Page($content_file, $title);
		}

		public function actionShowProduct($category, $product_id){
			$title = "Товар $product_id";
			$content_file = VIEWS.'product.php';
			$page  = new \main\components\Page($content_file, $title, $product_id);
		}
	}
?>