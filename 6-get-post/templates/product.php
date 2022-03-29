<?php if (empty($message)) : ?>
    <h2><?= $product['name'] ?></h2>
    <div class="product">
        <img src="<?= IMG_CATALOG_BIG . $product['title'] . '.jpg' ?>" />
        <p><?= $product['info'] ?></p>
        <hr>
        <p>Price: <?= $product['price'] ?></p>
        <button>Buy</button>
    </div>
    <br>
    <div class="product">
        <h2>Reviews</h2>
        <?= $status ?>
        <form action="" method="POST">
            <input type="text" hidden name="action" value="<?= $action ?>">
            <input type="text" hidden name="feedId" value="<?= $row['id'] ?? '' ?>">
            <input type="text" name="author" placeholder="Your name" value="<?= $row['author'] ?? '' ?>"><br>
            <textarea name="feedback" placeholder="Your review"><?= $row['feedback'] ?? '' ?></textarea><br>
            <input type="submit" value="<?= $buttonText ?>">
        </form>
        <?php foreach ($feedbacks as $feedback) : ?>
            <div class="review">
                <p><?= $feedback['author'] ?></p>
                <p><?= $feedback['feedback'] ?></p><br>
                <form action="" method="POST">
                    <input type="text" hidden name="action" value="edit">
                    <input type="text" hidden name="feedId" value="<?= $feedback['id'] ?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="" method="POST">
                    <input type="text" hidden name="action" value="delete">
                    <input type="text" hidden name="feedId" value="<?= $feedback['id'] ?>">
                    <input type="submit" value="X">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <p><?= $message; ?></p>
<?php endif; ?>