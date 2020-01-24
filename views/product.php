	<section id="main_content">
		<div class="container">
			<div class="crumbs">
				<p><a href="/children_toys/main/">Главная страница</a> / <a href="/children_toys/products/<?=$data[0]['category_url']?>/"><?=$data[0]['category']?></a> / <a href="/children_toys/products/<?=$data[0]['category_url']?>/<?=$data[0]['subcategory_url']?>/"><?=$data[0]['subcategory']?></a> / <?=$product->getTitle()?></p>
			</div>
			<div class="row">
				<div class="col-12">
					<h3><?=$product->getTitle()?></h3>
                    <div class="product_info">
                        <img src="/children_toys/images/<?=$product->getVendor_code()?>-1.jpg" alt="" style="width: 300px">
                        <table>
                            <tr>
                                <td>Артикул товара:</td>
                                <td><?=$product->getVendor_code()?></td>
                            </tr>
                            <tr>
                                <td>Цена:</td>
                                <td><?=$product->getPrice_markup()?> грн.</td>
                            </tr>
                            <tr>
                                <td>Товар бренда:</td>
                                <td><?=$data[0]['brand']?></td>
                            </tr>
                            <tr>
                                <td>Описание товара:</td>
                                <td><?=$product->getDescription()?></td>
                            </tr>
                            <tr>
                                <td>Страна:</td>
                                <td><?=$data[0]['country']?></td>
                            </tr>
                        </table>
                    </div>
                    <button class="basket_add" data-id="<?=$product->getId()?>" data-title="<?=$product->getTitle()?>" data-price="<?=$product->getPrice_markup()?>">Добавить в корзину +</button>
					<h3>Отзывы:</h3>
					
				</div>
			</div>
		</div>
		<div class="background_dark">
			
		</div>
	</section>