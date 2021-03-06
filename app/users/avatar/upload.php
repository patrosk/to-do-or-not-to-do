<?php

declare(strict_types=1);

require __DIR__ . '../../../autoload.php';

//in this file we upload an avatar of a user

if (isset($_FILES['avatar'])) {
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $filetype = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $filename = $_SESSION['user']['id'] . '_avatar.' . $filetype;
    $user_id = $_SESSION['user']['id'];
    move_uploaded_file($tmp_name, __DIR__ . '../../../../uploads/' . $filename);

    $statement = $database->prepare("UPDATE users SET image_url = :image_url WHERE id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':image_url', $filename, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['user']['image_url'] = $filename;
}
redirect('/profile.php');
