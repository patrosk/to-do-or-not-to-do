<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we create new tasks in or outside a list
$user_id = get_user_info($database)['id'];

if (isset($_POST['name'], $_POST['deadline'], $_POST['description'])) {
    // add task to list
    if (isset($_GET['id'])) {
        $list_id = $_GET['id'];

        $trimmed_name = trim($_POST['name']);
        $name = filter_var($trimmed_name, FILTER_SANITIZE_STRING);
        $deadline_at = $_POST['deadline'];
        $trimmed_description = trim($_POST['description']);
        $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
        $created_at = date("Y-m-d");

        $statement = $database->prepare('INSERT INTO tasks
            (user_id, list_id, name, description, created_at, deadline_at)
            VALUES (:user_id, :list_id, :name, :description, :created_at, :deadline_at)');

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created_at, PDO::PARAM_INT);
        $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

        $statement->execute();

        redirect('/single_list.php?id=' . $list_id);
    }

    //create task without list
    else {
        $trimmed_name = trim($_POST['name']);
        $name = filter_var($trimmed_name, FILTER_SANITIZE_STRING);
        $deadline_at = $_POST['deadline'];
        $trimmed_description = trim($_POST['description']);
        $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
        $created_at = date("Y-m-d");

        $statement = $database->prepare('INSERT INTO tasks
        (user_id, name, description, created_at, deadline_at)
        VALUES (:user_id, :name, :description, :created_at, :deadline_at)');

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created_at, PDO::PARAM_INT);
        $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

        $statement->execute();

        redirect('/tasks.php');
    }
}
