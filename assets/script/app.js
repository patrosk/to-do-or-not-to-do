const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

//need to make my eventlistener a function (named) in order to remove it. worth a try.

if (!hamburgerSpans.classList.contains('is-active')) {
  menuButton.addEventListener('click', () => {
    dropdown.classList.add('show');
    hamburgerSpans.classList.add('is-active');
    console.log(hamburgerSpans);
    menuButton.removeEventListener('click', () => {});
  });
}

if (hamburgerSpans.classList.contains('is-active')) {
  console.log('hello');

  menuButton.addEventListener('click', () => {
    dropdown.classList.remove('show');
    dropdown.classList.add('hide');
    hamburgerSpans.classList.remove('is-active');
  });
}
