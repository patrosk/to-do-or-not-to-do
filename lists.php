<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<h2><a href="/lists.php">Your Lists</a></h2>

<ul>
    <?php
    $lists = get_lists($database);
    foreach ($lists as $list) : ?>
        <li>
            <?= $list['title'] ?>
        </li>
    <?php endforeach ?>
</ul>

<h3>Create New List</h3>
<form action="/app/lists/create.php" method="post">
    <label for="title">Name your list:</label>
    <input name="title" id="title" type="text">
    <button type="submit">Create List</button>
</form>

<h2>Task Deadlines</h2>

<h3>Due Today!</h3>

<?php require __DIR__ . '/views/footer.php';
