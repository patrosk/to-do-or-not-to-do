<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = get_user_info($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

print_r($_POST);

//in this file we update tasks in a list

//trim and sanitize user input
if (isset($_POST['name'])) {
    $trimmed_title = trim($_POST['name']);
    $title = filter_var($trimmed_title, FILTER_SANITIZE_STRING);
}

if (isset($_POST['description'])) {
    $trimmed_description = trim($_POST['description']);
    $description = filter_var($trimmed_description, FILTER_SANITIZE_STRING);
}

if (isset($_POST['deadline'])) {
    $deadline_at = $_POST['deadline'];
}

//if statements to check which attributes have been given new values and then update them in the database
if ($title && $description && $deadline_at) {
    $statement = $database->prepare(
        'UPDATE tasks
    SET title = :title, description = :description, deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();

    redirect('/single_list.php?id=' . $list_id);
}


// If statement to enable users to modify one or several attributes of a task.
// if (isset($_POST['title'], $_POST['deadline'], $_POST['description'])
//     || ($_POST['title'] && $_POST['deadline'])
//     || ($_POST['description'] && $_POST['deadline'])
//     || ($_POST['title'] && $_POST['description'])
//     || ($_POST['title'])
//     || ($_POST['deadline'])
//     || ($_POST['description'])
// );

// -> starts the logic
// Then you still have to write different if statements depending
// on which attributes should be changed in the database.
// Perhaps create different if statements from the start?

// Put execute() AFTER the ‘update’ button has been clicked. (If statement).
// Update = change attribute(s) in DB
// Cancel = do not change anything in DB
