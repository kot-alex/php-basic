<h2>Catalog</h2>
<?php foreach ($catalog as $item) : ?>
    <?= $item['name'] ?><br>
    <img src="/img/catalog/<?= $item['image'] ?>" width="150"><br>
    Price: <?= $item['price'] ?><br>
    <button>Buy</button>
    <hr>
<?php endforeach; ?>