<div class="gallery">
    <h2 class="gallery-heading">Галерея</h2>
    <div class="gallery-images">
        <?php foreach ($images as $image) : ?>
            <a class="gallery-preview" href="img/gallery/big/<?= $image ?>" target="_blank"><img src="img/gallery/small/<?= $image ?>" /></a>
        <?php endforeach; ?>
    </div>
    <?= $message ?><br>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" value="Загрузить">
    </form>
</div>