<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


// In this file we login users.

if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $statement = $database->prepare("SELECT * from users WHERE email = :email");
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $image_url = $_SESSION['image_url'];

    if ($user === false) {
        $_SESSION['errors'][] = "Ooops! Something went wrong. You've entered an incorrect email address or password.";
        redirect('/');
    }
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['username'],
            "email" => $user['email'],
            "image_url" => $image_url
        ];

        redirect('/index.php');
    }

    $_SESSION['errors'][] = "Ooops! Something went wrong. You've entered an incorrect email address or password.";
    redirect('/');
}
