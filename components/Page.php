<?php
	namespace main\components;

	class Page{
		public function __construct($content, $title, $product_id = null){
			include_once(VIEWS.'header.php');
			include_once($content);
			include_once(VIEWS.'footer.php');
		}
	}
?>