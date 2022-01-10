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

<h4>Name:</h4>
<?= $task['name'] ?><br>
<h4>Description:</h4>
<?= $task['description'] ?><br>
<h4>In list:</h4>
<a href="/single_list.php?id=<?= $list_id ?>"><?= $task['title'] ?><br></a>
<h4>Deadline:</h4>
<?= $task['deadline_at'] ?><br>

<button>
    <a href="/edit_task.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Edit task</a>
</button>
<button>
    <a href="/app/tasks/delete.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Delete task</a>
</button>

<h4>status:</h4>

<?php $status = task_status($task); ?>

<div class="complete-form">
    <form action="/app/tasks/status.php?origin=single_task.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
        <label for="completed">completed</label>
        <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>>
        <label for="uncompleted">uncompleted</label>
        <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
        <!-- <button type="submit">Update status</button> -->
    </form>
</div>

<?php require __DIR__ . '/views/footer.php';
