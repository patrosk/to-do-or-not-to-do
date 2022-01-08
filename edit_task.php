<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$list_id = $_GET['id'];
$task_id = $_GET['task_id'];
?>

<div class="edit-task">
    <form action="/app/tasks/update.php?list_id=<?= $list_id ?>&task_id=<?= $task_id ?>" method="post" id="edit_task">
        <label for="name">Task Name:</label>
        <input name="name" id="name" type="text" placeholder="New task name">
        <label for="deadline">Deadline:</label>
        <input name="deadline" id="deadline" type="date">
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" form="edit_task" placeholder="New description"></textarea>
        <button type="submit">Update task</button>
        <button type="button"><a href="/single_list.php?id=<?= $list_id ?>">Cancel</a></button>
    </form>

</div>

<?php require __DIR__ . '/views/footer.php';
