<?php if (empty($message)) : ?>
    <h2> <?= $title ?></h2>
    <?php foreach ($order as $product) : ?>
        <div class="catalog-product">
            <a href="/product/?id=<?= $product['good_id'] ?>">
                <img src="<?= IMG_CATALOG_SMALL . $product['title'] . '.jpg' ?>" />
                <h4><?= $product['product_name'] ?></h4>
                <span>Price: <?= $product['price'] ?></span><br>
                <span>Quantity: <?= $product['qty'] ?></span><br>
            </a>
        </div>
    <?php endforeach; ?>
    <hr>
    <span>Name: <?= $product['order_name'] ?></span><br>
    <span>Phone: <?= $product['phone'] ?></span><br>
    <span>Total: <?= $product['total'] ?></span><br>
    <span>Status: <?= $product['status'] ?></span>
<?php else : ?>
    <p><?= $message; ?></p>
<?php endif; ?>