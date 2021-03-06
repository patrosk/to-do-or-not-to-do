<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete lists (including the tasks in the list) in the database.

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM lists WHERE user_id = :user_id AND id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM tasks WHERE user_id = :user_id AND list_id = :id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'List and tasks deleted from your profile!';
}
redirect('/lists.php');
