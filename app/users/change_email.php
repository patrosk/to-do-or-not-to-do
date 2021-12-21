<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we change the email address of a user

if (isset($_POST['email_address'])) {

    $email_address = trim($_POST['email_address']);
    $user_id = $_SESSION['user']['id'];

    //check if email address already exists in database:
    $statement = $database->prepare('SELECT email_address FROM users WHERE email_address = :email_address');
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);

    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/profile.php');
    }

    //change email address
    $statement = $database->prepare("UPDATE users SET email_address = :email_address WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['messages'][] = "You have changed your email address!";
    redirect('/profile.php');
}
