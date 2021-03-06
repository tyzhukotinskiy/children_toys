	<section id="main_content">
		<div class="container">
			<div class="row">
				<div class="col-9">
					<h3 class="inline-block"><i class="far fa-star"></i>Новинки</h3>
					<a href="#" class="all_products">Все новинки</a>
					<div class="new_products products">
						<div class="row">
                            <?for($i = 0; $i < count($products); $i++){?>
                                <div class="col-4">
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
				<div class="col-3 products_filter">
					<h3>Подбор подарка</h3>
					<form action="/children_toys/products/filter/" method="post">
						<p>Укажите цену (грн):</p>
						<input type="text" name="price_min_filter" placeholder="Минимальная цена:">
						<input type="text" name="price_max_filter" placeholder="Максимальная цена:">
						<p>Выберите категорию:</p>
						<select name="categories_filter">
						    <option value="4">Для малыша</option>
						    <option value="5">Настольные игры</option>
						</select>
                        <input type="submit" name="add_filter" value="Отифльтровать товары">
					</form>
				</div>
			</div>
		</div>
		<div class="background_dark">
			
		</div>
	</section>