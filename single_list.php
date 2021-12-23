<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<?php

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_lists($database);

foreach ($lists as $list) : ?>
    <?php if ($list['id'] == $id) : ?>
        <h2><?= $list['title'] ?></h2>
    <?php endif ?>
<?php endforeach ?>

<form action="/app/lists/update.php?id=<?= $id ?>" method="post">
    <label for="title">New title: </label>
    <input name="title" id="title" type="text">
    <button type="submit">Update title</button>
</form>

<?php require __DIR__ . '/views/footer.php';
