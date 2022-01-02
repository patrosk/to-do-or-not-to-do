<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<h1 class="heading">To Do Or Not To Do</h1>
<h2 class="slogan">...that is the question</h2>

<p><?= show_error() ?></p>

<?php if (is_logged_in()) : ?>
    <p><?= welcome_message() ?></p>

<?php else : ?>
    <div class="home-buttons">
        <button>Login</button>
        <button>Register</button>
    </div>
<?php endif ?>

<?php require __DIR__ . '/views/footer.php';
