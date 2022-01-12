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

<div class="counter">
    <div class="lists">
        <h2><a href="/lists.php">Your lists</a></h2>
        <h4>Number of lists:</h4>

        <?= $list_count  ?>
    </div>

    <div class="tasks">
        <h2><a href="/tasks.php">Your tasks</a></h2>
        <h4>Number of tasks:</h4>

        Total: <?= $task_count ?><br>
        <img class="icon" src="/images/check.png" alt="green check mark">Completed: <?= $completed_count ?><br>
        <img class="icon" src="/images/cross.png" alt="red cross mark">Uncompleted: <?= $uncompleted_count ?><br>
    </div>
</div>

<div class="motivator">
    <?php if ($completed_count > 0) : ?>
        <h3>Way to go!</h3>
    <?php elseif ($completed_count > 2) : ?>
        <h3>Well done on completing your tasks!</h3>
    <?php else : ?>
        <h3>Don't worry, you'll complete a task soon!</h3>
    <?php endif ?>
</div>

<h2>Due Date Tracker</h2>

<div>
    <ul class="due-date-tracker">
        <?php foreach ($tasks as $task) :
            $name = $task['name'];
            $deadline_at = $task['deadline_at'];
            if ($deadline_at >= date('Y-m-d')) : ?>
                <li>
                    <h4><?= $deadline_at ?></h4>
                    <h3><a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $name ?></a></h3>
                    <?php
                    if ($deadline_at === date('Y-m-d')) : ?>
                        Due today!<br>
                    <?php endif ?>
                    <!-- <?php if ($deadline_at < date('Y-m-d')) : ?>
                    Deadline passed!<img class="icon" src="/images/cross.png" alt="red cross mark"><br>
                <?php endif ?> -->
                    <?php if (isset($task['completed_at'])) : ?>
                        Completed!<img class="icon" src="/images/check.png" alt="green check mark">
                    <?php else : ?>
                        Uncompleted!<img class="icon" src="/images/cross.png" alt="red cross mark">
                    <?php endif ?>
                </li>
            <?php endif ?>
        <?php endforeach; ?>
    </ul>
</div>

<h2>Deadline passed</h2>
<div>
    <ul class="deadline-passed">
        <?php foreach ($tasks as $task) :
            $name = $task['name'];
            $deadline_at = $task['deadline_at'];
            if ($deadline_at < date('Y-m-d')) : ?>
                <li>
                    <h4><?= $deadline_at ?></h4>
                    <h3><a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $name ?></a></h3>
                    <?php if (isset($task['completed_at'])) : ?>
                        Completed!<img class="icon" src="/images/check.png" alt="green check mark">
                    <?php else : ?>
                        Uncompleted!<img class="icon" src="/images/cross.png" alt="red cross mark">
                    <?php endif ?>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>

<?php require __DIR__ . '/views/footer.php';
