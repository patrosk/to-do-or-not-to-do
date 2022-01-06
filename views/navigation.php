<header>
    <nav>
        <div class="navbar">
            <a class="title" href="/index.php"><?= $config['title'] ?></a>

            <div class="dropdown">
                <button class="dropdown-button">
                    <span class="hamburger">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <ul class="dropdown-content">
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/about.php">About</a></li>

                    <?php if (is_logged_in()) : ?>
                        <li><a href="../profile.php">Profile</a></li>
                        <li><a href="/overview.php">Overview</a></li>
                        <li><a href="/lists.php">Your lists</a></li>
                        <li><a href="/tasks.php">Your tasks</a></li>
                        <li><a href="/app/users/logout.php">Logout</a></li>

                    <?php else : ?>
                        <li><a href="/login.php">Login</a></li>
                        <li><a href="/register.php">Register</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
