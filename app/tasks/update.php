<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//in this file we update tasks in a list

// If statement to enable users to modify one or several attributes of a task.
// if (isset($_POST['title'], $_POST['deadline'], $_POST['description'])
//     || ($_POST['title'] && $_POST['deadline'])
//     || ($_POST['description'] && $_POST['deadline'])
//     || ($_POST['title'] && $_POST['description'])
//     || ($_POST['title'])
//     || ($_POST['deadline'])
//     || ($_POST['description'])
// );

// -> starts the logic
// Then you still have to write different if statements depending
// on which attributes should be changed in the database.
// Perhaps create different if statements from the start?

// Put execute() AFTER the ‘update’ button has been clicked. (If statement).
// Update = change attribute(s) in DB
// Cancel = do not change anything in DB
