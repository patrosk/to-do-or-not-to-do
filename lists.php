<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';
require __DIR__ . '/views/messages.php'; ?>

<?= show_message() ?>

<div class="content">

    <div class="lists-list">
        <h2>Your Lists</h2>
        <ul>
            <?php
            $lists = get_lists($database);
            foreach ($lists as $list) : ?>
                <li class="list-titles">
                    <h2><?= $list['title'] ?></h2>
                    <button>
                        <a href="single_list.php?id=<?= $list['id']; ?>">Edit list</a>
                    </button>
                    <button class="delete">
                        <a href="app/lists/delete.php?id=<?= $list['id']; ?>" onclick="return confirm('Are you sure you want to delete this list and all tasks in it?');">Delete list</a>
                    </button>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <div class="create-new-list">
        <h3>Create New List</h3>
        <form action="app/lists/create.php" method="post">
            <label for="title">Name your list:</label>
            <input name="title" id="title" type="text">
            <button type="submit">Create List</button>
        </form>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php';
