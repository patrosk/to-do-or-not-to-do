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
                Status:

                <?php
                if (isset($task['completed_at'])) {
                    $status_completed = 'checked';
                    $status_uncompleted = '';
                } else {
                    $status_completed = '';
                    $status_uncompleted = 'checked';
                } ?>

                <form action="/app/tasks/status.php?origin=tasks.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
                    <label for="completed">completed</label>
                    <input name="status" id="completed" value="completed" type="radio" <?= $status_completed ?>>
                    <label for="uncompleted">uncompleted</label>
                    <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status_uncompleted ?>>
                    <button type="submit">Update</button>
                </form>

            </li><br>
        <?php endforeach ?>
    </ul>
</div>
<?php require __DIR__ . '/views/footer.php';
