<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10b73a37fd09f521b2e264c0361f7072
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'main\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'main\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'main\\components\\DataBase' => __DIR__ . '/../..' . '/components/DataBase.php',
        'main\\components\\Page' => __DIR__ . '/../..' . '/components/Page.php',
        'main\\components\\Product' => __DIR__ . '/../..' . '/models/Product.php',
        'main\\components\\Router' => __DIR__ . '/../..' . '/components/Router.php',
        'main\\components\\Storage' => __DIR__ . '/../..' . '/components/Storage.php',
        'main\\controllers\\MainController' => __DIR__ . '/../..' . '/controllers/MainController.php',
        'main\\controllers\\ProductsController' => __DIR__ . '/../..' . '/controllers/ProductsController.php',
        'main\\models\\Subcategory' => __DIR__ . '/../..' . '/models/Subcategory.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10b73a37fd09f521b2e264c0361f7072::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10b73a37fd09f521b2e264c0361f7072::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit10b73a37fd09f521b2e264c0361f7072::$classMap;

        }, null, ClassLoader::class);
    }
}
