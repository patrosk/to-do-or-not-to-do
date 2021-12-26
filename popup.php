<?php

require __DIR__ . '/app/autoload.php'; ?>

<!-- This page functions as a placeholder. It holds the contents of the popup that will show
when a user edits a task. -->

<form action="/single_list.php" method="post" id="edit_task">
    <label for="name">Task Name:</label>
    <input name="name" id="name" type="text" placeholder="current name">
    <label for="deadline">Deadline:</label>
    <input name="deadline" id="deadline" type="date" placeholder="current deadline">
    <button type="submit">Update task</button>
    <button type="button">Cancel</button>
</form>
<label for="description">Description:</label>
<textarea name="description" id="description" cols="30" rows="10" form="edit_task" placeholder="current description"></textarea>
