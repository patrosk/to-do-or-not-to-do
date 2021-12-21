<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<h1>To Do Or Not To Do</h1>
<h2>...that is the question</h2>

<p><?= welcomeMessage() ?></p>

<?php require __DIR__ . '/views/footer.php';
