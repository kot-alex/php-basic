<div class="menu">
    <?php if ($auth) : ?>
        <form class="menu-form" action="/logout" method="POST">
            Welcome <?= $name ?>
            <input type="submit" value="Sign out">
        </form>
        <?php if ($name == 'admin') : ?>
            <?php unset($menu[7]) ?>
        <?php else : ?>
            <?php unset($menu[8]) ?>
        <?php endif; ?>
    <?php else : ?>
        <form class="menu-form" action="/login" method="POST">
            <input type="text" name="login" value="" placeholder="admin">
            <input type="password" name="pass" value="" placeholder="123">
            Save? <input type='checkbox' name='save'>
            <input type="submit" value="Sign in">
        </form>
        <?php unset($menu[7], $menu[8]) ?>
    <?php endif; ?>
    <?php foreach ($menu as $key => $value) : ?>
        <a href=<?= $value['url'] ?>><?= $value['name'] ?></a>
    <?php endforeach; ?>
</div>