<?php ?>
<?php require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>


<h2>Register</h2>
<form action="/app/users/register.php" method="post">
    <label for="user_name">user name:</label>
    <input name="user_name" id="user_name" type="text">
    <label for="email_address">email address:</label>
    <input name="email_address" id="email_address" type="email">
    <label for="password">select your password:</label>
    <input name="password" id="password" type="password">
    <button type="submit">Register</button>
</form>

<?php require __DIR__ . '/views/footer.php'; ?>
