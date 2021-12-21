<?php

if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['name'];
    return $name;
}
