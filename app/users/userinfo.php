<?php

declare(strict_types=1);

$logged_in_user = $_SESSION['user'];

$user = [
    "id" => $logged_in_user['id'],
    "name" => $logged_in_user['name'],
    "email" => $logged_in_user['email_address'],
    "image_url" => $logged_in_user['name']
];
