<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//delete user profile, lists and tasks
if (isset($_GET['id'])) {
    $user_id = $_SESSION['user']['id'];

    //check if user uploaded a profile picture
    $statement = $database->prepare("SELECT image_url FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $image = $statement->fetch(PDO::FETCH_ASSOC);
    $image_url = $image['image_url'];

    //delete profile picture
    if (file_exists((__DIR__ . '/../../uploads/' . $image_url))) {
        unlink((__DIR__ . '/../../uploads/' . $image_url));
    }

    //delete user from users table
    $statement = $database->prepare("DELETE FROM users WHERE id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    //delete user lists from lists table
    $statement = $database->prepare("DELETE FROM lists WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    //delete user tasks from tasks table
    $statement = $database->prepare("DELETE FROM tasks WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    unset($_SESSION['user']);

    $_SESSION['messages'][] = 'Profile deleted!';

    redirect('/');
}
