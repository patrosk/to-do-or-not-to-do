<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$tasks = get_tasks($database); ?>

<h3><a href="/lists.php">Your lists</a></h3>
<h4>Number of lists:</h4>

<h3><a href="/tasks.php">Your tasks</a></h3>
<h4>Number of tasks:</h4>

<h3>Due Date Tracker</h3>

<div>
    <ul>
        <?php
        foreach ($tasks as $task) :
            $name = $task['name'];
            $deadline_at = $task['deadline_at'];
            $list = $task['title'];
            $list_id = $task['list_id'];
            $task_id = $task['id']; ?>
            <li>
                <?= $deadline_at ?><br>
                <a href="/single_task.php?list_id=<?= $list_id ?>&task_id=<?= $task_id ?>"><?= $name ?></a><br>
            </li>


        <?php endforeach; ?>
    </ul>
</div>

<?php require __DIR__ . '/views/footer.php';
