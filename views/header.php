<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$this->title?></title>
    <link rel="stylesheet" href="/children_toys/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/children_toys/css/main.css">
    <link href="/children_toys/fontawesome/css/all.css" rel="stylesheet">
    <meta name="description" content="<?=$this->description?>">
    <meta name="Keywords" content="<?=$this->keyWords?>">
    <meta>
</head>
<body>
<header id="header">
    <div class="container d-flex">
        <h2><a href="/children_toys/main/"><img src="/children_toys/images/logo.jpg" alt="Интернет магазин Слоник"></a></h2>
        <form action="/children_toys/products/search/" method="POST">
            <input type="text" name="search_query" placeholder="Поиск товаров">
            <input type="submit" value="Поиск" name="search">
        </form>
        <div>
            <button class="basket" onclick="ModalBasket()"><img src="/children_toys/images/basket.png" alt="">Корзина<div><span class="count_products">0</span></div></button>
            <?
                if(isset($_SESSION['user_id'])) echo "<a href='/children_toys/user/cabinet/' class=\"auth cabinet\"><img src=\"/children_toys/images/auth.png\" alt=\"\"><span>Личный кабинет</span></a>";
                else echo  "<button class=\"auth\" onclick=\"ModalLogin()\"><img src=\"/children_toys/images/auth.png\" alt=\"\"><span>Войти</span></button>";
            ?>
        </div>
    </div>
    <div class="black_line">
        <div class="container d-flex">
            <div>
                <a href="#" onclick="showCatalog()" class="catalog"><img src="/children_toys/images/catalog.png" alt="Каталог товаров магазина Слоник"><span>Каталог</span> <span class="catalog_arrow">></span></a>
                <div class="dropdown_catalog">
                    <ul class="categories">
                        <li onmouseover="hover(this)" class="for_babies"><a href="/children_toys/products/dlya-malyshey/" >Для малышей</a><span>></span></li>
                        <li onmouseover="hover(this)" class="table_games"><a href="/children_toys/products/nastolnye-igry/" >Настольные игры</a><span>></span></li>
                    </ul>
                    <div class="subcategories d-flex">
                        <ul class="sub_for_babies">
                            <li><a href="/children_toys/products/dlya-malyshey/pogremushki/">Погремушки</a></li>
                            <li><a href="/children_toys/products/dlya-malyshey/mobayly-nochniki/">Мобайлы, ночники</a></li>
                        </ul>
                        <ul class="sub_for_babies">
                            <li><a href="/children_toys/products/dlya-malyshey/igrushki-dlya-vanny/">Игрушки для ванны</a></li>
                            <li><a href="/children_toys/products/dlya-malyshey/derevyannye-igrushki/">Деревянные игрушки</a></li>
                        </ul>
                        <ul class="sub_table_games">
                            <li><a href="/children_toys/products/nastolnye-igry/3d-pazly/">3D пазлы</a></li>
                            <li><a href="/children_toys/products/nastolnye-igry/klassicheskie-pazly/">Классические игры</a></li>
                        </ul>
                        <ul class="sub_table_games">
                            <li><a href="/children_toys/products/nastolnye-igry/intellektualnye-igry/">Интеллектальные игры</a></li>
                            <li><a href="/children_toys/products/nastolnye-igry/">Развлекательные игры</a></li>
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