<h2>Gallery</h2>
<form method="post" enctype="multipart/form-data">
    <?= $message ?><br>
    <input type="file" name="myfile">
    <input type="submit" value="Загрузить">
</form>
<?php if ($images->num_rows != 0) : ?>
    <?php foreach ($images as $image) : ?>
        <div class="gallery-small">
            <a href="/bigimage/?id=<?= $image['id'] ?>"><img src="<?= IMG_GALLERY_SMALL . $image['title'] ?>" /></a>
            <p>Views: <?= $image['views'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Gallery is empty</p>
<?php endif; ?>