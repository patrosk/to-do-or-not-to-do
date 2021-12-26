<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
?>

<?php

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];
$lists = get_lists($database);

foreach ($lists as $list) : ?>
    <?php if ($list['id'] == $id) : ?>
        <h2><?= $list['title'] ?></h2>
    <?php endif ?>
<?php endforeach ?>

<?php $tasks = get_tasks($database, $id);

foreach ($tasks as $task) : ?>
    <h4>Name: <?= $task['title'] ?></h4>
    <p>Description: <?= $task['description'] ?></p>
    <p>Deadline: <?= $task['deadline_at'] ?></p>
<?php endforeach ?>

<form action="/app/lists/update.php?id=<?= $id ?>" method="post">
    <label for="title">New title: </label>
    <input name="title" id="title" type="text">
    <button type="submit">Update title</button>
</form>

<h3>Add task to list</h3>
<form action="/app/tasks/create.php?id=<?= $id ?>" method="post" id="new_task">
    <label for="name">Task name: </label>
    <input name="name" id="name" type="text">
    <label for="deadline">Deadline: </label>
    <input name="deadline" id="deadline" type="date">
    <button type="submit">Add task</button>
</form>
<label for="description">Description: </label>
<textarea name="description" id="description" form="new_task"></textarea>

<?php require __DIR__ . '/views/footer.php';
