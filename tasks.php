<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$tasks = get_tasks($database); ?>

<p><?= show_message() ?></p>

<h2><a href="/tasks.php">Your Tasks</a></h2>

<div>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <?= $task['name'] ?><br>
                (<?= $task['title'] ?>)<br>
                <?= $task['deadline_at'] ?><br>

                <button>
                    <a href="/edit_task.php?id=<?= $id ?>&task_id=<?= $task['id'] ?>">Edit task</a>
                </button>
                <button>
                    <a href="/app/tasks/delete.php?id=<?= $id ?>&task_id=<?= $task['id'] ?>">Delete task</a>
                </button>

                <br>Status:

                <?php $status = task_status($task); ?>

                <form action="/app/tasks/status.php?origin=tasks.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
                    <label for="completed">completed</label>
                    <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>>
                    <label for="uncompleted">uncompleted</label>
                    <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
                    <button type="submit">Update status</button>
                </form>


            </li><br>
        <?php endforeach ?>
    </ul>
</div>
<?php require __DIR__ . '/views/footer.php';
