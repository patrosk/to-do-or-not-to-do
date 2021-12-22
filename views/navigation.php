<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/index.php"><?= $config['title'] ?></a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/about.php">About</a>
            </li>

            <?php if (is_logged_in()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="../profile.php">Profile</a>
                </li>
                <li>
                    <ul><a href="">Tasks</a>
                        <li class="nav-item">
                            <a class="nav-link" href="/overview.php">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/lists.php">Your lists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tasks.php">Your tasks</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/users/logout.php">Logout</a>
                </li>

            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register.php">Register</a>
                </li>
            <?php endif ?>

        </ul>
    </nav>
</header>
