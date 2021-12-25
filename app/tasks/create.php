<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we create new tasks in a list
$list_id = $_GET['id'];
$user_id = get_user_info($database)['id'];

if (isset($_POST['name'], $_POST['deadline'], $_POST['description'])) {
    $trimmed_title = trim($_POST['name']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
    $deadline_at = $_POST['deadline'];
    $trimmed_description = trim($_POST['description']);
    $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
    $created_at = date("Ymd");

    $statement = $database->prepare('INSERT INTO tasks
    (user_id, list_id, title, description, created_at, deadline_at)
    VALUES (:user_id, :list_id, :title, :description, :created_at, :deadline_at)');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $created_at, PDO::PARAM_INT);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/single_list.php?id=' . $list_id);
