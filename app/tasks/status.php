<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we mark tasks as completed/uncompleted

print_r($_GET);

$user_id = get_user_info($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

//check task status from live page and update completed_at column in database. If completed,
// the completed_at is set to today, if uncompleted, the completed_at is set to null.
if ($_POST['status'] === "completed") {
    $completed_at = date('Y-m-d');

    $statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at
    WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['messages'][] = 'Task completed!';
} else {
    $statement = $database->prepare('UPDATE tasks SET completed_at = null
    WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task uncompleted!';
}

if ($_GET['origin'] === "tasks.php") {
    redirect('/tasks.php');
} elseif ($_GET['origin'] === "single_task.php") {
    redirect('/single_task.php?list_id=' . $list_id . '&task_id=' . $task_id);
} else {
    redirect('/single_list.php?id=' . $list_id);
}
