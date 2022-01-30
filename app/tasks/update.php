<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = get_user_info($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

//in this file we update tasks in a list

//trim and sanitize user input
if (isset($_POST['name'])) {
    $trimmed_name = trim($_POST['name']);
    $name = filter_var($trimmed_name, FILTER_SANITIZE_STRING);
}

if (isset($_POST['description'])) {
    $trimmed_description = trim($_POST['description']);
    $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
}

if (isset($_POST['deadline'])) {
    $deadline_at = $_POST['deadline'];
}

if (isset($_POST['list'])) {
    $list_id = $_POST['list'];
}

//if statements to check which attributes have been given new values and then update them in the database
if ($name) {
    $statement = $database->prepare(
        'UPDATE tasks SET name = :name
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';
}

if ($description) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET description = :description
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';
}

if ($deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';
}

if ($list_id) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET list_id = :list_id
    WHERE user_id = :user_id AND id = :task_id'
    );

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';
}

if ($_GET['origin'] === 'tasks.php') {
    redirect('/tasks.php');
} elseif ($_GET['origin'] === 'single_task.php') {
    redirect('/single_task.php?list_id=' . $list_id . '&task_id=' . $task_id);
} else {
    redirect('/single_list.php?id=' . $list_id);
}
