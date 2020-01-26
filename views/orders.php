<section id="main_content">
    <div class="container">
        <div class="crumbs">
            <p><a href="/children_toys/main">Главная страница</a> / <a href="/children_toys/user/cabinet/">Личный кабинет</a> / Заказы
        </div>
        <h2>Ваши заказы</h2>
        <?php for($i = 0, $k = 0; $i < count($orders); $i++){?>
            <h3>Заказ № <?=$orders[$i]->id?></h3>
            <p>Дата оформления: <?=$orders[$i]->date?></p>
            <p>Сумма к оплате: <?=$orders[$i]->price?></p>
            <?php
                if($orders[$i]->paid == 0) echo "<button onclick='payOrder(this)' name=\"order\" value='".$orders[$i]->id."'>Оплатить</button>";
                if($orders[$i]->paid == 1) echo "<p>Ожидайте подтверждения от администратора</p>";
                if($orders[$i]->paid == 2) echo "<p>Оплата подтверждена, посылка будет выслана в ближайшее время!</p>";
            ?>

            <h4>Товары:</h4>
            <?php
                for($j = 0; $j < count($orders[$i]->products['product_id']); $j++, $k++) {
                    $product_id = $orders[$i]->products['product_id'][$k];
                    for ($c = 0; $c < count($products); $c++) {
                        if ($product_id == $products[$c]->id) { ?>
                            <div class="product_in_order">
                                <img style="height: 100px; width: auto;"
                                     src="/children_toys/images/<?= $products[$c]->vendor_code ?>-1.jpg" alt="">
                                <p><?= $products[$c]->title ?></p>
                                <p>Количество: <?= $orders[$i]->products['quantity'][$k] ?></p>

                            </div>
                        <? }
                    }
                }

            ?>
            <hr>
        <?php }?>
    </div>
    </div>
    <div class="background_dark">

    </div>
</section>