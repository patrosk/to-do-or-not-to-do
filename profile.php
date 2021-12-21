<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<div>
    <?= showError() ?>
</div>
<div>
    <?= showMessage() ?>
</div>



<div>
    <img src="<?= getImageUrl() ?>" alt="">
</div>
<?php

?>

<div>Change your profile picture</div>
<form action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
    <label for="upload-avatar">Upload your avatar image in PNG/JPG format</label>
    <input type="file" name="upload-avatar" id="upload-avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<div>Change your email address</div>
<form action="/app/users/change_email.php" method="post">
    <label for="email_address">new email address:</label>
    <input type="email" name="email_address" id="email_address">
    <button type="submit">Change email address</button>
</form>

<div>Change your password</div>
<form action="/app/users/change_password.php" method="post">
    <label for="password">current password:</label>
    <input name="password" id="password" type="password">
    <label for="new_password">select your password:</label>
    <input name="new_password" id="new_password" type="password">
    <button type="submit">Change password</button>
</form>

<?php require __DIR__ . '/views/footer.php';
