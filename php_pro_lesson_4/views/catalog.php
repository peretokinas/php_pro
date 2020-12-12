<section>
    <h2>Каталог</h2>
    <div class="catalog">
        <?php foreach ($catalog as $item):?>
            <div class="catalog-item">
                <h3><a href="/?c=product&a=card&id=<?=$item['id']?>"><?=$item['name']?></a></h3>
                <p><?=$item['description']?></p>
                <p>Цена: <?=$item['price']?></p>
                <button>Купить</button>
            </div>
        <?php endforeach;?>
    </div>
    <a class="more" href="/?c=product&a=catalog&page=<?=$page?>">Показать еще!</a>
</section>