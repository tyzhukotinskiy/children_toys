<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/children_toys/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/children_toys/css/main.css">
    <link href="/children_toys/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
<header id="header">
    <div class="container d-flex">
        <h2><img src="/children_toys/images/logo.jpg" alt="Интернет магазин Слоник"></h2>
        <form action="#">
            <input type="text" name="search_query" placeholder="Поиск товаров">
            <input type="submit" value="Поиск" name="search">
        </form>
        <div>
            <a href="#" class="basket"><img src="/children_toys/images/basket.png" alt="">Корзина<div><span class="count_products">0</span></div></a>
            <button class="auth" onclick="ModalLogin()"><img src="/children_toys/images/auth.png" alt=""><span>Войти</span></button>
        </div>
    </div>
    <div class="black_line">
        <div class="container d-flex">
            <div>
                <a href="#" onclick="showCatalog()" class="catalog"><img src="/children_toys/images/catalog.png" alt="Каталог товаров магазина Слоник"><span>Каталог</span> <span class="catalog_arrow">></span></a>
                <div class="dropdown_catalog">
                    <ul class="categories">
                        <li onmouseover="hover(this)" class="for_babies"><a href="/children_toys/products/dlya-malyshey/" >Для малышей</a><span>></span></li>
                        <li onmouseover="hover(this)" class="table_games"><a href="/children_toys/products/nastolnye-igry" >Настольные игры</a><span>></span></li>
                    </ul>
                    <div class="subcategories d-flex">
                        <ul class="sub_for_babies">
                            <li><a href="#">Погремушки</a></li>
                            <li><a href="#">Мобайлы, ночники</a></li>
                        </ul>
                        <ul class="sub_for_babies">
                            <li><a href="#">Игрушки для ванны</a></li>
                            <li><a href="#">Деревянные игрушки</a></li>
                        </ul>
                        <ul class="sub_table_games">
                            <li><a href="#">3D пазлы</a></li>
                            <li><a href="#">Классические пазлы</a></li>
                        </ul>
                        <ul class="sub_table_games">
                            <li><a href="#">Интеллектальные игры</a></li>
                            <li><a href="#">Развлекательные игры</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul>
                <li><a href="#">Новинки</a></li>
                <li><a href="#">Бренды</a></li>
                <li><a href="#">Акции</a></li>
                <li><a href="#">Лучшие предложения</a></li>
            </ul>
        </div>
    </div>
</header>