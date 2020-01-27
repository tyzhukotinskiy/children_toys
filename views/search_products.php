<section id="main_content">
    <div class="container">
        <div class="crumbs">
            <p><a href="/children_toys/main">Главная страница</a> / Поисковый запрос</p>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>По запросу: "<?=$_REQUEST['search_query']?>" было найдено <?php echo count($products); if(count($products) == 1) echo " совпадение"; else if (count($products) <= 4) echo " совпадения"; else echo " совпадений"?></h3>
                <div class="products">
                    <div class="row">
                        <?for($i = 0; $i < count($products); $i++){?>
                            <div class="col-3">
                                <div class="item">
                                    <img src="/children_toys/images/<?=$products[$i]->getVendor_code()?>-1.jpg" alt="">
                                    <h4><a href="/children_toys/products/<?=$paths[$i]['category_url']?>/<?=$paths[$i]['subcategory_url']?>/<?=$products[$i]->getId()?>"><?=$products[$i]->getTitle()?></a></h4>
                                    <p>Цена: <?=$products[$i]->getPrice_markup()?> грн.</p>
                                    <p><a href="#">0 отзывов</a></p>
                                    <button class="basket_add" data-id="<?=$products[$i]->getId()?>" data-title="<?=$products[$i]->getTitle()?>" data-price="<?=$products[$i]->getPrice_markup()?>">Добавить в корзину +</button>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="background_dark">

    </div>
</section>