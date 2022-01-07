<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<h1 class="heading">To Do Or Not To Do</h1>
<h2 class="slogan">...that is the question</h2>

<span class="messages">
    <p><?= show_error() ?></p>

    <?php if (is_logged_in()) : ?>
        <p><?= welcome_message() ?></p>
</span>

<span class="due-today">
    <?php $tasks_due_today = get_tasks_due_today($database) ?>
    <?php if ($tasks_due_today) : ?>
        <h2>Due Today!</h2>
        <ul>
            <?php foreach ($tasks_due_today as $task) : ?>
                <li>
                    <a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $task['name'] ?></a><br>
                </li>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <h2>No tasks due today!</h2>
    <?php endif ?>
</span>

<?php else : ?>
    <div class="home-buttons">
        <button><a href="/login.php">Login</a></button>
        <button><a href="/register.php">Register</a></button>
    </div>
<?php endif ?>

<?php require __DIR__ . '/views/footer.php';
