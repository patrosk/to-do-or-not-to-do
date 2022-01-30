<?php

declare(strict_types=1);

//this file contains functions

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function is_logged_in()
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        return $user;
    }
}

function get_image_url(PDO $database, $user_id)
{
    $statement = $database->prepare("SELECT image_url FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

    $statement->execute();
    $image = $statement->fetch(PDO::FETCH_ASSOC);

    return $image['image_url'];
}

function get_avatar()
{
    $avatar = $_SESSION['user']['image_url'];

    if ($avatar === null) {
        return 'images/rubber_duck.png';
    }

    return 'uploads/' . $avatar;
}

function get_user_info(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $user_info = [
        'username' => $user['username'],
        'email' => $user['email'],
        'id' => $user['id'],
    ];
    return $user_info;
}

function get_lists(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * FROM lists WHERE user_id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}

function get_tasks_from_list(PDO $database, $list_id)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * FROM tasks WHERE user_id = :user_id AND list_id = :list_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function get_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare(
        "SELECT tasks.id, tasks.list_id, tasks.user_id, tasks.name,
        tasks.description, tasks.deadline_at, tasks.completed_at, lists.title
    FROM tasks
    LEFT OUTER JOIN lists
    ON tasks.list_id = lists.id
    WHERE tasks.user_id = :user_id ORDER BY tasks.deadline_at"
    );
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function get_single_task_from_list(PDO $database, $list_id, $task_id)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare(
        "SELECT tasks.id, tasks.list_id, tasks.user_id, tasks.name,
        tasks.description, tasks.deadline_at, tasks.completed_at, lists.title
    FROM tasks
    LEFT OUTER JOIN lists
    ON tasks.list_id = lists.id
    WHERE tasks.user_id = :user_id AND tasks.id = :task_id AND tasks.list_id = :list_id"
    );
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $task = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $task;
}

function get_tasks_due_today(PDO $database)
{
    $user_id = $_SESSION['user']['id'];
    $deadline_at = date('Y-m-d');

    $statement = $database->prepare("SELECT * from tasks WHERE user_id = :user_id AND deadline_at = :deadline_at");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();

    $tasks_due_today = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks_due_today;
}

function task_status($task)
{
    if (isset($task['completed_at'])) {
        $status['completed'] = 'checked';
        $status['uncompleted'] = '';
    } else {
        $status['completed'] = '';
        $status['uncompleted'] = 'checked';
    }

    return $status;
}

function count_tasks($tasks)
{
    $task_count = array(
        'completed' => [],
        'uncompleted' => [],
    );

    foreach ($tasks as $task) {
        if (isset($task['completed_at'])) {
            $task_count['completed'][] = $task['name'];
        } else {
            $task_count['uncompleted'][] = $task['name'];
        }
    }
    return $task_count;
}
