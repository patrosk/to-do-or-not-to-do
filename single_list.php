<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<?php
$list = [
    'id' => $_GET['id'],
    'user_id' => $_SESSION['user']['id'],
];
?>

<button type="submit"></button>
<p><?= $list ?></p>
<p><?= print_r($list) ?></p>


<?php require __DIR__ . '/views/footer.php';
