<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update lists in the database.
$list_id = $_GET['id'];
$user_id = get_user_info($database)['id'];

//change list title
if (isset($_POST['title'])) {
    $trimmed_title = trim($_POST['title']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);

    $statement = $database->prepare("UPDATE lists SET title = :title WHERE id = :id AND user_id = :user_id");
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
}
redirect('/single_list.php?id=' . $list_id);
