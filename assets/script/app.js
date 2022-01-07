const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

menuButton.addEventListener('click', () => {
    dropdown.classList.add('show');
    hamburgerSpans.classList.add('is-active');
});

if ('.hamburger.is-active') {
    const activeHamburger = document.querySelector('.hamburger.is-active');
    console.log(activeHamburger);
}

// activeHamburger.addEventListener('click', () => {
//   console.log('hello');
//   dropdown.classList.remove('show');
//   dropdown.classList.add('hide');
//   hamburgerSpans.classList.remove('is-active');
// });
