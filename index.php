<?php
	if($_SERVER['REQUEST_URI'] == '/lego_shop/') header("Location: /lego_shop/main/");
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	define('ROOT', __DIR__.'/');
	define('VIEWS', __DIR__.'/views/');

	require_once ROOT.'/vendor/autoload.php';

	$Router = new main\components\Router();
	$Router->run();

?>