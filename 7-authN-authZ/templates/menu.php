<div class="menu">
    <?php if ($auth) : ?>
        <form action="logout" method="POST">
            Welcome <?= $name ?>
            <input type="submit" value="Sign out">
        </form>
    <?php else : ?>
        <form action="login" method="POST">
            <input type="text" name="login" value="admin">
            <input type="password" name="pass" value="123">
            Save? <input type='checkbox' name='save'>
            <input type="submit" value="Sign in">
        </form>
    <?php endif; ?>
    <?php foreach ($menu as $key => $value) : ?>
        <a href=<?= $value['url'] ?>><?= $value['name'] ?></a>
    <?php endforeach; ?>
</div>