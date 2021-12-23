<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update (modify) lists in the database.

if (isset($_GET['id'])) {
    $list = [
        'id' => $_GET['id'],
        'user_id' => $_SESSION['user']['id'],
    ];

    redirect('/single_list.php?id=' . $list['id']);
    // print_r($list);


    // $id = $_GET['id'];
    // $user_id = $_SESSION['user']['id'];

    // $statement = $database->prepare("UPDATE lists SET title = :title WHERE user_id = :user_id AND id = :id");
    // $statement->bindParam(':title', $title, PDO::PARAM_STR);
    // $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // $statement->bindParam(':id', $id, PDO::PARAM_INT);
    // $statement->execute();

    // $_SESSION['messages'][] = 'List updated!';

    // redirect('/lists.php');
}
