<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}
function welcomeMessage(string $name)
{
    return 'Welcome, ' . $name . '!';
}
