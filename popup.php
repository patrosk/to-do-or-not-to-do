<?php

require __DIR__ . '/app/autoload.php'; ?>

<?php
$list_id = $_GET['id'];
$task_id = $_GET['task_id'];
?>

<!-- This page functions as a placeholder. It holds the contents of the popup that will show up
when a user edits a task. -->

<form action="/app/tasks/update.php?list_id=<?= $list_id ?>&task_id=<?= $task_id ?>" method="post" id="edit_task">
    <label for="name">Task Name:</label>
    <input name="name" id="name" type="text" placeholder="New title">
    <label for="deadline">Deadline:</label>
    <input name="deadline" id="deadline" type="date">
    <button type="submit">Update task</button>
    <button type="button"><a href="/single_list.php?id=<?= $list_id ?>">Cancel</a></button>
</form>

<label for="description">Description:</label>
<textarea name="description" id="description" form="edit_task" placeholder="New description"></textarea>
