<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php'; ?>

<h1>About</h1>

<h2>Get organised!</h2>
<p>Create your own To Do lists and add tasks with name, description and deadline. Edit, add and remove tasks with
    ease and keep track on your most urgent tasks with our Due Date Tracker feature. Planning has never been easier!
</p>

<h2>Join us!</h2>
<p>Want to start organising your life? <strong>Register</strong> and create your profile here:</p>
<div class="home-buttons">
    <button><a href="register.php">Register</a></button>
</div>

<p>Already a member? Login to your account here:</p>
<div class="home-buttons">
    <button><a href="login.php">Login</a></button>
</div>


<?php require __DIR__ . '/views/footer.php';
