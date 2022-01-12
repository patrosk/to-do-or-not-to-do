<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
require __DIR__ . '/views/messages.php';
?>

<h1 class="heading">To Do Or Not To Do</h1>
<h2 class="slogan">...that is the question</h2>

<h4 class="show-error"><?= show_error() ?></h4>
<div class="messages">
    <?php if (is_logged_in()) : ?>
        <h4><?= welcome_message() ?></h4>
        <div class="img-box">
            <img src="<?= get_avatar() ?>" alt="image uploaded by the user OR a placeholder image of a rubber duck">
        </div>

        <div class="due-today">
            <?php $tasks_due_today = get_tasks_due_today($database) ?>
            <?php if ($tasks_due_today) : ?>
                <h2>Due Today!</h2>
                <ul class="due-today">
                    <?php foreach ($tasks_due_today as $task) : ?>
                        <li>
                            <a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $task['name'] ?></a><br>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php else : ?>
                <h2>No tasks due today!</h2>
            <?php endif ?>
        </div>

    <?php else : ?>
        <div class="home-buttons">
            <button><a href="/login.php">Login</a></button>
            <button><a href="/register.php">Register</a></button>
        </div>
    <?php endif ?>
</div>

<?php require __DIR__ . '/views/footer.php';
