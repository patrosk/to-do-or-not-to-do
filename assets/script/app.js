const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

menuButton.addEventListener('click', () => {
  dropdown.classList.toggle('show');
  hamburgerSpans.classList.toggle('is-active');
});
