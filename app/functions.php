<?php

declare(strict_types=1);

//this file contains functions

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function welcome_message()
{
    if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        return 'Welcome, ' . $name . '!';
    }
}

function show_error()
{
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            unset($_SESSION['errors']);
            return $error;
        }
        unset($_SESSION['errors']);
    }
}

function show_message()
{
    if (isset($_SESSION['messages'])) {
        foreach ($_SESSION['messages'] as $message) {
            //this was needed for the errors but not for the messages??
            // unset($_SESSION['messages']);
            return $message;
        }
        unset($_SESSION['messages']);
    }
}

function get_image_url()
{
    $database = new PDO(sprintf('sqlite:%s/database/database.db', __DIR__));

    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT image_url from users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

    $statement->execute();
    $image = $statement->fetch(PDO::FETCH_ASSOC);
    $image_url = $image['image_url'];

    if ($image_url === null) {
        return '/images/rubber_duck.png';
    }

    return '/uploads/' . $image_url;
}

function get_user_info(object $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * from users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $user_info = [
        'user_name' => $user['user_name'],
        'email_address' => $user['email_address'],
    ];
    return $user_info;
}
