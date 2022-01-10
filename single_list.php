<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<?php

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_lists($database);
$tasks = get_tasks_from_list($database, $id);

echo show_message();

foreach ($lists as $list) : ?>
    <?php if ($list['id'] == $id) : ?>
        <h2><?= $list['title'] ?></h2>
    <?php endif ?>
<?php endforeach ?>

<ul>
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
                            completed!
                        <?php else : ?>
                            uncompleted!
                        <?php endif ?>
                    </p>

                </div>
            </div>
        </li>
    <?php endforeach ?>
</ul>

<h3>Change list title</h3>
<form action="/app/lists/update.php?id=<?= $id ?>" method="post">
    <label for="title">New title: </label>
    <input name="title" id="title" type="text">
    <button type="submit">Update title</button>
</form>

<h3>Add task to list</h3>
<form action="/app/tasks/create.php?id=<?= $id ?>" method="post" id="new_task">
    <label for="name">Task name: </label>
    <input name="name" id="name" type="text">
    <label for="deadline">Deadline: </label>
    <input name="deadline" id="deadline" type="date">
    <button type="submit">Add task</button>
</form>
<label for="description">Description: </label>
<textarea name="description" id="description" form="new_task"></textarea>

<?php require __DIR__ . '/views/footer.php';
