<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<?php
$user_id = $_SESSION['user']['id'];
$tasks = get_tasks($database);
$completed = isset($_POST['completed']);
?>

<p><?= show_message() ?></p>

<h2>Your Tasks</h2>

<div>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <!-- <div class="checkbox">
                    <form action="/app/tasks/checkbox.php" method="POST">
                        <input type="hidden" name="checkbox-id" value="<?= $task['id'] ?>">
                        <input type="checkbox" name="completed" id="completed" <?= $completed ? 'checked' : '' ?>>
                        <label for="completed">
                            <?= $task['name'] ?>
                        </label>
                    </form>
                </div> -->

                <div class="task-box">
                    <a href="/single_task.php?list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>"><?= $task['name'] ?></a><br>

                    <?php $status = task_status($task); ?>

                    <!-- <div class="status-icon">
                        <?php
                        if ($status['completed'] === 'checked') : ?>
                            <div class="green"></div>
                        <?php else : ?>
                            <div class="red"></div>
                        <?php endif ?>
                    </div> -->

                    <div class="complete-form">
                        <form action="/app/tasks/status.php?origin=tasks.php&list_id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>" method="post">
                            <div class="completed-button">
                                <input name="status" id="completed" value="completed" type="radio" <?= $status['completed'] ?>>
                                <label for="completed">completed</label>
                            </div>
                            <div class="uncompleted-button">
                                <input name="status" id="uncompleted" value="uncompleted" type="radio" <?= $status['uncompleted'] ?>>
                                <label for="uncompleted">uncompleted</label>
                            </div>
                        </form>
                    </div>

                    <button class="see-more-button">see more</button>
                    <button class="see-less-button hide">see less</button>

                    <div class="task-info">
                        (<a href="/single_list.php?id=<?= $task['list_id'] ?>"><?= $task['title'] ?></a>)<br>
                        <?= $task['deadline_at'] ?><br>

                        <button>
                            <a href="/edit_task.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Edit task</a>
                        </button>
                        <button>
                            <a href="/app/tasks/delete.php?id=<?= $task['list_id'] ?>&task_id=<?= $task['id'] ?>">Delete task</a>
                        </button>

                        <br>Status:
                        <?php if (isset($task['completed_at'])) : ?>
                            Completed!
                        <?php else : ?>
                            Uncompleted!
                        <?php endif ?>



                    </div>
                </div>
            </li><br>
        <?php endforeach ?>
    </ul>
</div>

<!-- Add task without list?? -->
<!-- <h3>Add task</h3>
<form action="/app/tasks/create.php" method="post" id="new_task">
    <label for="name">Task name: </label>
    <input name="name" id="name" type="text">
    <label for="deadline">Deadline: </label>
    <input name="deadline" id="deadline" type="date">
    <button type="submit">Add task</button>
</form>
<label for="description">Description: </label>
<textarea name="description" id="description" form="new_task"></textarea> -->

<?php require __DIR__ . '/views/footer.php';
