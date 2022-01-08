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

<p>Checkbox:</p>
<?php $isCompleted = isset($_POST['is_completed']); ?>
<?php if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if ($isCompleted) {
        echo "The task $id is completed.";
    } else {
        echo "The task $id is not completed.";
    }

    // This is where you update the database.
} ?>
<div class="checkbox">
    <form action="/test.php?list_id=18&task_id=17" method="POST">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">

        <input class="checkbox-box" type="checkbox" name="is_completed" id="is_completed" <?= $isCompleted ? 'checked' : '' ?>>

        <label for="is_completed">
            <?= $task['name'] ?>
        </label>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php';
