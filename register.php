<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php if (isset($_SESSION['user'])) {
    redirect('/');
} ?>

<h2>Register</h2>
<div class="register">
    <form action="/app/users/register.php" method="post">
        <label for="username">user name:</label><br>
        <input name="username" id="username" type="text" required><br>
        <label for="email">email address:</label><br>
        <input name="email" id="email" type="email" required><br>
        <label for="password">select your password (at least 10 characters):</label><br>
        <input name="password" id="password" type="password" minlength="10" required>
        <div class="submit-button">
            <button type="submit">Register</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php';
