<?php

if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['name'];
    return $name;
}

print_r($_SESSION);
echo $name;

function welcomeMessage($name)
{
    return 'Welcome, ' . $name . '!';
}
