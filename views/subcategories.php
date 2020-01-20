<section id="main_content">
		<div class="container">
			<div class="crumbs">
				<p><a href="main.php">Главная страница</a> / Категория</p>
			</div>
			<h3><?=$category?></h3>
            <div class="row subcategories">
                <? for($i = 0; $i < count($subcategories); $i++){?>
                    <div class="col-3">
                        <a href="<?=$subcategories[$i]->getUrl()?>">
                            <img src="/children_toys/images/<?=$subcategories[$i]->getUrl()?>.jpg" alt="">
                            <h4><?=$subcategories[$i]->getTitle()?></h4>
                        </a>
                    </div>
                <?}?>
			</div>
		</div>
		<div class="background_dark">
			
		</div>
	</section>