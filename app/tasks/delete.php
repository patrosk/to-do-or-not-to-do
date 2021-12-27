<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we delete tasks from a list
$list_id = $_GET['id'];
$task_id = $_GET['task_id'];
$user_id = $_SESSION['user']['id'];

if ($list_id && $task_id) {

    $statement = $database->prepare("DELETE FROM tasks WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id");
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'Task deleted from list!';

    redirect('/single_list.php?id=' . $list_id);
}
