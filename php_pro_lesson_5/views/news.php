<section>
    <h2>Каталог</h2>
    <div class="news">
        <?php foreach ($news as $item):?>
            <div class="news-item">
                <h3><a href="/?c=news&a=newsItem&id=<?=$item['id']?>"><?=$item['header']?></a></h3>
                <p>Опубликовано: <?=$item['create_at']?></p>
            </div>
            <hr>
        <?php endforeach;?>
    </div>
    <a class="more" href="/?c=news&a=news&page=<?=$page?>">Показать еще!</a>
</section>