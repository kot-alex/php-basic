<div class="menu">
    <?php foreach ($menu as $key => $value) : ?>
        <a href=<?= $value['url'] ?>><?= $value['name'] ?></a>
    <?php endforeach; ?>
</div>