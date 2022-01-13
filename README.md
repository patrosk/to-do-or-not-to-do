<img src="https://media2.giphy.com/media/pTQUOfSmjo2hG/giphy.gif?cid=ecf05e47iu5wa5eou7cych7jbnzz6t7mvct0rvnjs5zdjev4&rid=giphy.gif&ct=g" width="100%" >

# To Do Or Not To Do

To Do Or Not To Do is an application where the user can create different lists with tasks. Each task can be marked as completed or uncompleted, and it is possible to add and remove tasks from the diffferent lists. The user can upload a profile picture and the app shows the user which tasks are due soon.

Feel free to add your own account!

Link to live page: https://www.patrosk.one/index.php

I have used different naming conventions in my code, but they are consistent within each language.

CSS: kebab-case \
HTML: kebab-case(for classes)\
PHP: snake_case\
File names: snake_case\
JavaScript: camelCase

# Installation

Install this project by following these steps:

- Clone the repository from this address:

  > https://github.com/patrosk/to-do-or-not-to-do

- In the project's root folder, start a php server by typing this in your terminal:

  > php -S localhost:8000

- Open up your browser and paste this URL in the address bar:

  > https://localhost:8000

- If that doesn't work, paste this in the address bar instead:
  > https://localhost:8000/index.php

# Code Review

Code review written by [Johanna Jönsson](https://github.com/JonssonJohanna).

1. `change_email.php:19` - Remember to be consistent with naming conventions, you use snake_case almost everywhere but in change_email.php you mix to camelCase on line 19.
2. `functions.php:` - Suitable function names and on variables which is good for readability and makes the code easier to understand and readible.
3. `example.js:10-15` - Do not think you have a gitignore file which is good if you don’t want to commit all images to gitHub.
4. `single_task.php:14-22` - Looks like there is a bit of code that is not in use on line 12-22, is there a purpose of that and if so why?
5. `functions.php:115` - Great work using longer SQLite queries with JOIN instead of using shorter ones.
6. `profile.php:52-60` - For accessibility it would be nice, when changing the password, to get a message saying if it was successfully or not.
7. `functions.php:` - Great work using your functions instead of repeating your self, makes reability better.
8. `example.js:10-15` - Even though you have a suitible variable names it would be good for readability with comments describning your code.
9. `profile.php:52-60` - When creating an acount users needs to use atleast 10 characters but not when editing in profile.php, perhaps it would be good to have it at both places.
10. `example.js:10-15` - Remember to use htmlspecialchars() to make sure that field or input is valid.
    Overall: I really liked the look of your todo-list and everything works great without any errors. I specially liked the feature the motivator! :)
# Testers

Tested by the following people:

1. Sofia Rönnkvist
2. Amanda Hultén
