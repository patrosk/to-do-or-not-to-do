<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

if (isset($_POST['user_name'], $_POST['email_address'], $_POST['password'])) {

    $user_name = trim($_POST['user_name']);
    $email_address = trim($_POST['email_address']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //check if email address already exists: if-statement checking if username or email already exists in database
    // if (condition) {

    // }

    //insert new user in database
    $statement = $database->prepare('INSERT INTO users
    (user_name, email_address, password)
    VALUES
    (:user_name, :email_address, :password)');

    $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    redirect('/');
}
