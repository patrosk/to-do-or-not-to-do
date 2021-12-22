<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<h2>Register</h2>
<form action="/app/users/register.php" method="post">
    <label for="username">user name:</label>
    <input name="username" id="username" type="text">
    <label for="email">email address:</label>
    <input name="email" id="email" type="email">
    <label for="password">select your password:</label>
    <input name="password" id="password" type="password">
    <button type="submit">Register</button>
</form>

<?php require __DIR__ . '/views/footer.php';
