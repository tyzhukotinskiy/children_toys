<?php
	return array(
		"products/categories/([a-z]+)/([0-9]+)/" => "products/showProduct/$1/$2",
		"products/categories/([a-z]+)/" => "products/showProducts/$1",
		"products/categories/" => "products/showCategories",
		"products" => "products/showCategories",
		"main" => "main/showMain"
	);
?>