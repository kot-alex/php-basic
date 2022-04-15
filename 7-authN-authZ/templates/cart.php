<h2>Cart</h2>
<?php if (empty($message)) : ?>
    <?php foreach ($cart as $product) : ?>
        <form class="catalog-product" action="" method="POST">
            <a href="/product/?id=<?= $product['good_id'] ?>">
                <img src="<?= IMG_CATALOG_SMALL . $product['title'] . '.jpg' ?>" />
                <h4><?= $product['name'] ?></h4>
                Price: <?= $product['price'] * $product['qty'] ?><br>
                Quantity: <?= $product['qty'] ?><br>
            </a>
            <input type="text" hidden name="id" value="<?= $product['cart_id'] ?>">
            <input type="text" hidden name="action" value="delete">
            <input type="submit" value="Remove">
        </form>
    <?php endforeach; ?>
<?php else : ?>
    <p><?= $message; ?></p>
<?php endif; ?>