<div class="gallery-big">
    <?php if (empty($message)) : ?>
        <img src="<?= IMG_GALLERY_BIG . $image['title'] ?>" />
        <p>Views: <?= $image['views'] ?></p>
    <?php else : ?>
        <p><?= $message; ?></p>
    <?php endif; ?>
</div>