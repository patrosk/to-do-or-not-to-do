<?php

// print_r($_SESSION);
// echo $_SESSION['user']['name'];

function welcomeMessage(string $name)
{
    return 'Welcome, ' . $name . '!';
}
if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['name'];
    return $name;
}
