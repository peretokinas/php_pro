<h2>Каталог</h2>
<div class="catalog">
    <?php foreach ($catalog as $item): ?>
        <div class="catalog-item">
            <h3><a href="/product/card/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
            <p><?= $item['description'] ?></p>
            <p><?= $item['price'] ?></p>
            <button data-id="<?= $item['id'] ?>" class="buy">Купить</button>
        </div>
    <?php endforeach; ?>
</div>

<a class="more" href="/product/catalog/?page=<?= $page ?>">Далее</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/add/', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        })
    });
</script>