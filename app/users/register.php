<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

if (isset($_POST)) {
    print_r($_POST);

    $user_name = trim($_POST['user_name']);
    $email_address = trim($_POST['email_address']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $statement = $database->prepare('INSERT INTO users
    (user_name, email_address, password)
    VALUES
    (:user_name, :email_address, :password)');

    $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $statement->bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    redirect('../../index.php');
}
?>
<!-- //     <p><?php echo $user_name; ?></p> -->
<?php
// }
//
?>
