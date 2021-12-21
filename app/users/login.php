<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


// In this file we login users.

if (isset($_POST['email_address'], $_POST['password'])) {
    $email_address = trim($_POST['email_address']);
    $statement = $database->prepare("SELECT * from users WHERE email_address = :email_address");
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        redirect('/');
    }
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['user_name'],
            "email" => $user['email_address'],
        ];

        redirect('/index.php');
    }
    redirect('/');
}
