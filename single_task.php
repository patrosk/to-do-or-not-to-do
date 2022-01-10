<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];
$tasks = get_single_task($database, $list_id, $task_id);
$task = $tasks[0];
?>

<?= show_message() ?><br>


<h2><?= $task['name'] ?></h2>
<h3>task description:</h3>
<p><?= $task['description'] ?></p>
<p class="no-bottom-margin">in list:</p>
<h3 class="no-top-margin"><a href="/single_list.php?id=<?= $list_id ?>"><?= $task['title'] ?></a></h3>
<p>deadline: <?= $task['deadline_at'] ?></p>


<div class="task-button">
    <button>
        <a href="/edit_task.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Edit task</a>
    </button>
    <button class="delete">
        <a href="/app/tasks/delete.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to remove the task?');">Delete task</a>
    </button>
</div>

<p class="no-bottom-margin">status:</p>

<?php $status = task_status($task); ?>

<div class="complete-form">
    <form action="/app/tasks/status.php?origin=single_task.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
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


<?php require __DIR__ . '/views/footer.php';
