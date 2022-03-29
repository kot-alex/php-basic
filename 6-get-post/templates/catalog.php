<h2>Catalog</h2>
<?php foreach ($products as $product) : ?>
    <div class="catalog-product">
        <a href="/product/?id=<?= $product['id'] ?>">
            <img src="<?= IMG_CATALOG_SMALL . $product['title'] . '.jpg' ?>" />
            <h4><?= $product['name'] ?></h4>
            Price: <?= $product['price'] ?><br>
        </a>
        <button>Buy</button>
    </div>
<?php endforeach; ?>