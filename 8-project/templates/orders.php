<h2><?= $title; ?></h2>
<?php if (empty($message)) : ?>
    <?php foreach ($orders as $order) : ?>
        <a class="order" href="/order/?id=<?= $order['id'] ?>">Order: <?= $order['id'] ?><br>
            <span>Name: <?= $order['name'] ?></span>
            <span>Phone: <?= $order['phone'] ?></span>
            <span>Total: <?= $order['total'] ?></span>
            <span>Status: <?= $order['status'] ?></span>
        </a>
        <?php if ($title == 'Admin') : ?>
            <form class="" action="" method="POST">
                <input type="text" hidden name="id" value="<?= $order['id'] ?>">
                <input type="text" hidden name="action" value="changeStatus">
                <select name="status">
                    <option <?php if ($order['status'] == 'pending') echo 'selected'; ?>>pending</option>
                    <option <?php if ($order['status'] == 'processing') echo 'selected'; ?>>processing</option>
                    <option <?php if ($order['status'] == 'completed') echo 'selected'; ?>>completed</option>
                    <option <?php if ($order['status'] == 'cancelled') echo 'selected'; ?>>cancelled</option>
                </select>
                <input type="submit" value="Change">
            </form>
        <?php endif; ?>
        <hr>
    <?php endforeach; ?>
<?php else : ?>
    <p><?= $message; ?></p>
<?php endif; ?>