<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php if (isset($_SESSION['user'])) {
    redirect('/');
} ?>

<h2>Login</h2>
<div class="login">
    <form action="/app/users/login.php" method="post">
        <label for="email">email address:</label>
        <input type="email" name="email" id="email"><br>
        <label for="password">password:</label>
        <input type="password" name="password" id="password"><br>
        <div class="submit-button">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php';
