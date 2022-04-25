<div class="product">
    <?php if (empty($message)) : ?>
        <h2><?= $product['name'] ?></h2>
        <form class="product-form" action="" method="POST">
            <img src="<?= IMG_CATALOG_BIG . $product['title'] . '.jpg' ?>" /><br>
            <p><?= $product['info'] ?></p>
            <hr>
            <p>Price: <?= $product['price'] ?></p>
            <input type="text" hidden name="id" value="<?= $product['id'] ?>">
            <input type="text" hidden name="price" value="<?= $product['price'] ?>">
            <input type="text" hidden name="action" value="addToCart">
            <input type="submit" value="Buy">
        </form>
    <?php else : ?>
        <p><?= $message; ?></p>
    <?php endif; ?>
</div>