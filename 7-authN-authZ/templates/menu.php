<div class="menu">
    <?php if ($allow) : ?>
        Welcome <?= $login ?> <a href="?logout">[Sign out]</a>
    <?php else : ?>
        <form action="" method="POST">
            <input type="text" hidden name="action" value="login">
            <input type="text" name="login">
            <input type="password" name="password">
            <input type="submit" value="Sign in">
        </form>
    <?php endif; ?>
    <?php foreach ($menu as $key => $value) : ?>
        <a href=<?= $value['url'] ?>><?= $value['name'] ?></a>
    <?php endforeach; ?>
</div>