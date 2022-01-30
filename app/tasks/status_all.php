<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = get_user_info($database)['id'];
$list_id = $_POST['list_id'];


$completed_at = date('Y-m-d');

$statement = $database->prepare('UPDATE tasks SET completed_at = :completed_at
WHERE list_id = :list_id AND user_id = :user_id');
$statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->bindParam(':completed_at', $completed_at, PDO::PARAM_STR);
$statement->execute();

$_SESSION['messages'][] = 'All tasks are completed!';

redirect('/single_list.php?id=' . $list_id);
