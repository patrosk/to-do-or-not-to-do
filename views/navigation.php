<header>
    <nav>
        <div class="navbar">
            <a class="title" href="/index.php"><?= $config['title'] ?></a>

            <div class="dropdown">
                <button class="dropdown-button">
                    <span class="hamburger">
                        <span class="hamburger-inner"></span>
                        <!-- <div></div>
                        <div></div>
                        <div></div> -->
                    </span>
                </button>
                <ul class="dropdown-content">
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
                        <li class="nav-item">Tasks
                            <ul>
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
            </div>
        </div>
    </nav>
</header>
<main>
