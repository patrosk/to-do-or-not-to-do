<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<nav>
    <ul>
        <li class="nav-item">
            <a class="nav-link" href="/lists.php">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/about.php">Your lists</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/about.php">Your tasks</a>
        </li>
    </ul>
</nav>

<?php require __DIR__ . '/views/footer.php';
