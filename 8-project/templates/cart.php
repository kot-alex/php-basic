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
            <input type="text" hidden name="cart_id" value="<?= $product['cart_id'] ?>">
            <input type="text" hidden name="action" value="delete">
            <input type="submit" value="Remove">
        </form>
    <?php endforeach; ?>
    <hr>
    <h3>Total: <?= $total ?></h3>
    <form action="" method="POST">
        <input type="text" hidden name="action" value="order">
        <span>Enter your name and phone number:</span><br>
        <input type="text" required name="name" placeholder="First name" value=""><br>
        <input type="tel" required name="phone" placeholder="Phone number" value="123456"><br>
        <input type="submit" value="Checkout">
    </form>
<?php else : ?>
    <p><?= $message; ?></p>
<?php endif; ?>