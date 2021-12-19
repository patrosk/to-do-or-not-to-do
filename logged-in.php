<?php

function welcomeMessage(string $name)
{
    return 'Welcome, ' . $name . '!';
}

if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['user_name'];
    return welcomeMessage($name);
}
