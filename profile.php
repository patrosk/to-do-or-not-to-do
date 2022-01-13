<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
require __DIR__ . '/views/messages.php'; ?>

<div>
    <?= show_error() ?>
    <?= show_message() ?>
    <h2 class="welcome"><?= welcome_message() ?></h2>
</div>

<?php
$lists = get_lists($database);
$list_count = count($lists);
$tasks = get_tasks($database);
$task_status = count_tasks($tasks);
$completed_count = count($task_status['completed']);
?>

<div class="img-box">
    <img src="<?= get_avatar() ?>" alt="image uploaded by the user OR a placeholder image of a rubber duck">
</div>

<ul class="user-info">
    <li>Username: <?= get_user_info($database)['username'] ?></li>
    <li>Email address: <?= get_user_info($database)['email'] ?></li>
    <li>Number of lists: <?= $list_count ?></li>
    <li>Completed tasks: <?= $completed_count ?></li>
</ul>



<div class="change-avatar">
    <h2>Change your profile picture</h2>
    <form class="avatar-upload" action="/app/users/avatar/upload.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Upload your avatar image in PNG/JPG format</label>
        <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
        <button type="submit">Upload image</button>
    </form>
</div>

<div class="change-email">
    <h2>Change your email address</h2>
    <form action="app/users/change_email.php" method="post">
        <label for="email">new email address:</label>
        <input type="email" name="email" id="email">
        <button type="submit">Change email address</button>
    </form>
</div>

<div class="change-password">
    <h2>Change your password</h2>
    <form action="app/users/change_password.php" method="post">
        <label for="password">current password:</label>
        <input name="password" id="password" type="password">
        <label for="new_password">select your new password:</label>
        <input name="new_password" id="new_password" type="password" minlength="10" required>
        <button type="submit">Change password</button>
    </form>
</div>

<div class="delete-profile">
    <h2>Delete profile</h2>
    <p>Delete your profile and all lists and tasks along with your
        profile picture and user information.
        This cannot be undone!
    </p>
    <button type="button">
        <a href="app/users/delete.php?id=<?= $_SESSION['user']['id'] ?>" onclick="return confirm('Are you sure you want to delete your profile permanently?');"> Delete profile</a>
    </button>
</div>

<?php require __DIR__ . '/views/footer.php';
