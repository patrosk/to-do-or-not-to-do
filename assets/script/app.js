const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

menuButton.addEventListener('click', () => {
  dropdown.classList.toggle('show');
  hamburgerSpans.classList.toggle('is-active');
});

const form = document.querySelector('.checkbox form');
const task = document.querySelector('.checkbox input[type=checkbox]');

task.addEventListener('click', () => {
  form.submit();
});
