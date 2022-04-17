<h2>Feedbacks</h2>
<div class="feedbacks">
    <?= $message ?>
    <form action="" method="POST">
        <input type="text" hidden name="action" value="<?= $action ?? 'add' ?>">
        <input type="text" hidden name="id" value="<?= $row['id'] ?? '' ?>">
        <input type="text" name="author" placeholder="Your name" value="<?= $row['author'] ?? '' ?>"><br>
        <textarea name="feedback" placeholder="Your review"><?= $row['feedback'] ?? '' ?></textarea><br>
        <input type="submit" value="<?= $buttonText ?? 'Send' ?>">
    </form>
    <?php foreach ($feedbacks as $feedback) : ?>
        <div class="feedback">
            <b><?= $feedback['author'] ?>:</b>
            <?= $feedback['feedback'] ?>
            <form action="" method="POST">
                <input type="text" hidden name="action" value="edit">
                <input type="text" hidden name="id" value="<?= $feedback['id'] ?>">
                <input type="submit" value="Edit">
            </form>
            <form action="" method="POST">
                <input type="text" hidden name="action" value="delete">
                <input type="text" hidden name="id" value="<?= $feedback['id'] ?>">
                <input type="submit" value="X">
            </form>
        </div>
    <?php endforeach; ?>
</div>