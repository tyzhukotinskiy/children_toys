<?php
    define('ROOT', __DIR__);
    include_once 'config/defines.php';
    include_once 'vendor/autoload.php';

    $Router = new main\components\Router();
    $Router->run();