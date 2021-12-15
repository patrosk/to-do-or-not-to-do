<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


// In this file we login users.

if (isset($_POST['email_address'], $_POST['password'])) {
    $email_address = trim($_POST['email_address']);
    $password = $_POST['password'];

    $statement = $database->prepare('SELECT * FROM users WHERE email_address = :email_address');
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        redirect('../../login.php');
        echo 'Something went wrong';
    }
    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "user_name" => $user['user_name'],
                "email_address" => $user['email_address']
            ];
            redirect('../../index.php');
        } else {
            redirect('../../login.php');
        };
    }
}
