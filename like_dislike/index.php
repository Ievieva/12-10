<?php

require_once 'DataStorage.php';

$storage = new DataStorage();
$links = $storage->getLinks();

if (isset($_POST['like'])) {
    $id = $_POST['id'] ?? 0;
    $storage->changeLike($id, 1);
} elseif (isset($_POST['dislike'])) {
    $id = $_POST['id'] ?? 0;
    $storage->changeLike($id, -1);
}

?>

<html>
    <head>
        <link rel="stylesheet" href="./stylesheet.css">
    </head>
    <body>
        <?php foreach ($links as $id => $link) : ?>

            <?php if (count($link) > 1) : ?>
                <h5 class="centered"><?= $link[0] . ' Likes'; ?></h5>
                <img class="centered" src="<?= $link[1]; ?>" alt="picture <?= $id; ?>"/>
                <form class="centered" method="post" action="/">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button type="submit" name="like">Like</button>
                    <button type="submit" name="dislike">Dislike</button>
                </form>
            <?php endif; ?>

        <?php endforeach; ?>
    </body>
</html>
