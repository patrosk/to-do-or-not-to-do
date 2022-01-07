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
    <label for="username">user name:</label><br>
    <input name="username" id="username" type="text"><br>
    <label for="email">email address:</label><br>
    <input name="email" id="email" type="email"><br>
    <label for="password">select your password:</label><br>
    <input name="password" id="password" type="password">
    <div class="submit-button">
        <button type="submit">Register</button>
    </div>
</form>

<?php require __DIR__ . '/views/footer.php';
