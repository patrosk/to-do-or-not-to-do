<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<div>
    <?= show_error() ?>
    <?= show_message() ?>
    <?= welcome_message() ?>
</div>

<?php
$lists = get_lists($database);
$list_count = count($lists);
$tasks = get_tasks($database);
$task_status = count_tasks($tasks);
$completed_count = count($task_status['completed']);
?>

<ul>
    <li>Username: <?= get_user_info($database)['username'] ?></li>
    <li>Email address: <?= get_user_info($database)['email'] ?></li>
    <li>Number of lists: <?= $list_count ?></li>
    <li>Completed tasks: <?= $completed_count ?></li>
</ul>

<div>
    <img src="<?= get_avatar() ?>" alt="">
</div>
<?php

?>

<div>Change your profile picture</div>
<form class="avatar-upload" action=" /app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Upload your avatar image in PNG/JPG format</label>
    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload image</button>
</form>

<div>Change your email address</div>
<form action="/app/users/change_email.php" method="post">
    <label for="email">new email address:</label>
    <input type="email" name="email" id="email">
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

<div>Delete profile
    <p>Delete your profile and all lists and tasks along with your
        profile picture and user information.
        This cannot be undone!
    </p>
    <button type="button"><a href="/app/users/delete.php?id=<?= $_SESSION['user']['id'] ?>"> Delete profile</a></button>
</div>

<?php require __DIR__ . '/views/footer.php';
