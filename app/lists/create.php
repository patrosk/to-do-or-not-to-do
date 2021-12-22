<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we create/insert new lists in the database.
if (isset($_POST['title'])) {
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
    $user_id = get_user_info($database)['id'];

    $statement = $database->prepare('INSERT INTO lists
    (title, user_id)
    VALUES (:title, :user_id)');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
}

redirect('/');
