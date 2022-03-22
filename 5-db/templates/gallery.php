<h2>Gallery</h2>
<?php foreach ($images as $image) : ?>
    <div class="gallery-small">
        <a href="/bigimage/?id=<?= $image['id'] ?>"><img src="/img/gallery/small/<?= $image['title'] ?>" /></a>
        <p>Views: <?= $image['views'] ?></p>
    </div>
<?php endforeach; ?>
<br><?= $message ?><br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="Загрузить">
</form>