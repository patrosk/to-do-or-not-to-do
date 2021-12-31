<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we mark tasks as completed/uncompleted and add completed_at date in the database

print_r($_GET);

$user_id = get_user_info($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

//check task status on live page

if ($_POST['status'] === "completed") {
    $completed = $_POST['status'];

    // $statement = $database->prepare('UPDATE tasks SET completed_at = :date
    // WHERE id = :task_id AND list_id = :list_id AND user_id = :user_id');

    $_SESSION['messages'][] = 'task completed!';
} else {
    $uncompleted = $_POST['status'];
    $_SESSION['messages'][] = 'task uncompleted!';
}

// if ($_GET['origin'] === "tasks.php") {
//     redirect('/tasks.php');
// } else {
//     redirect('/single_list.php?id=' . $_GET['id']);
// }

//check box = add completed_at value:
// $created_at = date("Ymd");
// $statement->bindParam(':created_at', $created_at, PDO::PARAM_INT);

//check task status in database

// $tasks = task_status($database);
// foreach ($tasks as $task) {
//     if (isset($task['completed_at'])) {
//         echo 'hello';
//         $status = 'checked';
//     } else {
//         echo 'not completed yet!';
//         $status = 'false';
//     }
// }

//uncheck box = remove completed_at value
