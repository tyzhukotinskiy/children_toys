<?php
	namespace main\controllers;

	class MainController{
		public function actionShowMain(){
			$title = "Lego Shop";
			$content_file = VIEWS.'main.php';
			$page = new \main\components\Page($content_file, $title);
		}
	}
?>