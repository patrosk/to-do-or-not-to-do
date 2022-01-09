<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$completed = isset($_POST['completed']);

print_r($_POST);

// if (isset($_POST['checkbox-id'])) {
//     $id = $_POST['checkbox-id'];

//     if ($completed) {
//         echo "The task $id is completed.";
//     } else {
//         echo "The task $id is not completed.";
//     }
// }

if (isset($_POST['checkbox-id']) && isset($_POST['completed'])) {
    $completed_at = date('Y-m-d');

    $statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at
    WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['messages'][] = 'the checkbox works';
} else {
    $statement = $database->prepare('UPDATE tasks SET completed_at = null
    WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['messages'][] = 'the checkbox does not work';
}



// redirect('/tasks.php');
