<?php require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<h1>To Do Or Not To Do</h1>
<h2>...that is the question</h2>


<?php


if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['user_name'] . '!'; ?> </p>
<?php endif ?>




<?php require __DIR__ . '/views/footer.php'; ?>
