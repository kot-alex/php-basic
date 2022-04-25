<div class="catalog">
    <h2>Catalog</h2>
    <?php foreach ($products as $product) : ?>
        <form class="catalog-product" action="" method="POST">
            <a href="/product/?id=<?= $product['id'] ?>">
                <img src="<?= IMG_CATALOG_SMALL . $product['title'] . '.jpg' ?>" />
                <h4><?= $product['name'] ?></h4>
                Price: <?= $product['price'] ?><br>
            </a>
            <input type="text" hidden name="id" value="<?= $product['id'] ?>">
            <input type="text" hidden name="price" value="<?= $product['price'] ?>">
            <input type="text" hidden name="action" value="addToCart">
            <input type="submit" value="Buy">
        </form>
    <?php endforeach; ?>
</div>