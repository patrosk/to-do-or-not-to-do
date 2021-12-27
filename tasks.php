<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$tasks = get_tasks($database); ?>

<p><?= show_message() ?></p>

<h2><a href="/tasks.php">Your Tasks</a></h2>

<div>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <?= $task['name'] ?><br>
                (<?= $task['title'] ?>)<br>
                <?= $task['deadline_at'] ?><br>
                Status:

                <!-- the id=0 distinguishes this form from the form in single_list, in order to put the right redirect -->
                <form action="/app/tasks/status.php?origin=tasks.php" method="post">
                    <label for="completed">completed</label>
                    <input name="status" id="completed" value="completed" type="radio">
                    <label for="uncompleted">uncompleted</label>
                    <input name="status" id="uncompleted" value="uncompleted" type="radio">
                    <button type="submit">Update</button>
                    <!-- add function to check if task is completed
                    or not - prefill that radio button checked="checked"-->
                </form>

            </li><br>
        <?php endforeach ?>
    </ul>
</div>
<?php require __DIR__ . '/views/footer.php';
