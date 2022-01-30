<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
require __DIR__ . '/views/messages.php';
?>

<?php

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_lists($database);
$tasks = get_tasks_from_list($database, $id); ?>

<?php foreach ($lists as $list) : ?>
    <?php if ($list['id'] == $id) : ?>
        <h2><?= $list['title'] ?></h2>
    <?php endif ?>
<?php endforeach ?>

<ul>
    <p><?= show_message() ?></p>
    <?php
    foreach ($tasks as $task) : ?>
        <?php $status = task_status($task); ?>
        <li>
            <div class="task-box">
                <a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $task['name'] ?></a>

                <?php $status = task_status($task); ?>

                <div class="complete-form">
                    <form action="/app/tasks/status.php?origin=single_list.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
                        <div class="complete-button">
                            <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>>
                            <label for="completed">completed</label>
                        </div>
                        <div class="complete-button">
                            <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
                            <label for="uncompleted">uncompleted</label>
                        </div>
                    </form>
                </div>

                <button class="see-more-button">see more</button>
                <button class="see-less-button hide">see less</button>

                <div class="task-info">
                    <h3>description</h3>
                    <p><?= $task['description'] ?></p>
                    <p> deadline: <?= $task['deadline_at'] ?></p>

                    <button>
                        <a href="/edit_task.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Edit task</a>
                    </button>
                    <button class="delete">
                        <a href="/app/tasks/delete.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to remove the task?');">Delete task</a>
                    </button>

                    <p>status:
                        <?php if (isset($task['completed_at'])) : ?>
                            completed!<img class="icon" src="/images/check.png" alt="green check mark">
                        <?php else : ?>
                            uncompleted!<img class="icon" src="/images/cross.png" alt="red cross mark">
                        <?php endif ?>
                    </p>

                </div>
            </div>
        </li>
    <?php endforeach ?>
</ul>

<button class="change-title-button">Change list title</button>
<div class="change-title">
    <form action="/app/lists/update.php?id=<?= $id ?>" method="post">
        <label for="title">New title: </label>
        <input name="title" id="title" type="text" required>
        <button type="submit">Update title</button>
    </form>
</div>

<button class="add-task-button">Add task to list</button>
<div class="add-task">
    <form action="/app/tasks/create.php?id=<?= $id ?>" method="post" id="new_task">
        <label for="name">Task name: </label>
        <input name="name" id="name" type="text">
        <label for="deadline">Deadline: </label>
        <input name="deadline" id="deadline" type="date">
        <label for="description">Description: </label>
        <textarea name="description" id="description" form="new_task"></textarea>
        <button type="submit">Add task</button>
    </form>
</div>

<div class="add-all-task-complete">
    <form action="/app/tasks/status_all.php" method="post">
        <label for="status-all-tasks-complete"></label>
        <input type="hidden" name="list_id" id="completed" value="<?= $_GET['id'] ?>">
        <button class="add-task-button" type="submit">Complete all tasks</button>
    </form>

</div>

<?php require __DIR__ . '/views/footer.php';
