<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$tasks = get_tasks($database);
$lists = get_lists($database);
$list_count = count($lists);
$tasks = get_tasks($database);
$task_count = count($tasks);
$task_status = count_tasks($tasks);

if (isset($task_status)) {
    $completed_count = count($task_status['completed']);
    $uncompleted_count = count($task_status['uncompleted']);
}
?>

<h2><a href="/lists.php">Your lists</a></h2>
<h4>Number of lists:</h4>

<?= $list_count  ?>

<h2><a href="/tasks.php">Your tasks</a></h2>
<h4>Number of tasks:</h4>

Total: <?= $task_count ?><br>
Completed: <?= $completed_count ?><br>
Uncompleted: <?= $uncompleted_count ?><br>

<h2>Due Date Tracker</h2>

<div>
    <ul>
        <?php foreach ($tasks as $task) :
            $name = $task['name'];
            $deadline_at = $task['deadline_at']; ?>
            <li>
                <?= $deadline_at ?><br>
                <a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $name ?></a><br>
                <?php
                if ($deadline_at === date('Y-m-d')) : ?>
                    Due today!<br>
                <?php endif ?>
                <?php if ($deadline_at < date('Y-m-d')) : ?>
                    Deadline passed!<br>
                <?php endif ?>
                <?php if (isset($task['completed_at'])) : ?>
                    Completed!
                <?php else : ?>
                    Uncompleted!
                <?php endif ?>
            </li>


        <?php endforeach; ?>
    </ul>
</div>

<?php require __DIR__ . '/views/footer.php';
