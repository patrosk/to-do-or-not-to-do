<?php

declare(strict_types=1);

require __DIR__ . '../../autoload.php';

//delete user profile, lists and tasks
if (isset($_GET['id'])) {
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM users WHERE id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM lists WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM tasks WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    unset($_SESSION['user']);

    redirect('/');
}
