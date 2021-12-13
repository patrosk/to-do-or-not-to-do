<?= 'To Do Or Not To Do'; ?>

<?php require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<h1>This is the Landing Page</h1>
<h2>Log in</h2>
<form action="">
    <label for="username">user name:</label>
    <input type="text">
    <label for="email">email address:</label>
    <input type="email">
    <label for="password">password:</label>
    <input type="password">
</form>
<h2>Register</h2>
<label for="username">user name:</label>
<input type="text">
<label for="email">email address:</label>
<input type="email">
<label for="password">select your password:</label>
<input type="password">

<?php require __DIR__ . '/views/footer.php'; ?>
