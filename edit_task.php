<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$list_id = $_GET['id'];
$task_id = $_GET['task_id'];
$lists = get_lists($database);
?>

<div class="edit-task">
    <form action="/app/tasks/update.php?list_id=<?= $list_id ?>&task_id=<?= $task_id ?>" method="post">
        <label for="name">Task Name:</label>
        <input name="name" id="name" type="text" placeholder="New task name">
        <label for="deadline">Deadline:</label>
        <input name="deadline" id="deadline" type="date">
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" form="edit_task" placeholder="New description"></textarea>
        <label for="list">Add the task to: </label>
        <select name="list" id="list">
            <?php
            foreach ($lists as $list) : ?>
                <option class="list" value="<?= $list['id']; ?>"><?= htmlspecialchars($list['title']); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Update task</button>
        <button type="button">
            <?php if (isset($_GET['origin'])) : ?>
                <?php if ($_GET['origin'] === 'single_task') : ?>
                    <a href="single_task.php?list_id=<?= $list_id ?>&task_id=<?= $task_id ?>">Cancel</a>
                <?php elseif ($_GET['origin'] === 'tasks.php') : ?>
                    <a href="tasks.php">Cancel</a>
                <?php endif ?>
            <?php else : ?>
                <a href="single_list.php?id=<?= $list_id ?>">Cancel</a>
            <?php endif ?>
        </button>
    </form>

</div>

<?php require __DIR__ . '/views/footer.php';
