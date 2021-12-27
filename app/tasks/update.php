<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = get_user_info($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

print_r($_POST);

//in this file we update tasks in a list

//trim and sanitize user input
if (isset($_POST['name'])) {
    $trimmed_title = trim($_POST['name']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
}

if (isset($_POST['description'])) {
    $trimmed_description = trim($_POST['description']);
    $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
}

if (isset($_POST['deadline'])) {
    $deadline_at = $_POST['deadline'];
}

//if statements to check which attributes have been given new values and then update them in the database

//all attributes
if ($title && $description && $deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET title = :title, description = :description, deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
}

//two attributes
if ($title && $description) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET title = :title, description = :description
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
}

if ($title && $deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET title = :title, deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
}

if ($description && $deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET description = :description, deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
}

//one attribute
if ($title) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET title = :title
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
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

    redirect('/single_list.php?id=' . $list_id);
}

if ($deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task updated!';

    redirect('/single_list.php?id=' . $list_id);
}
