const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

menuButton.addEventListener('click', () => {
  dropdown.classList.toggle('show');
  hamburgerSpans.classList.toggle('is-active');
});

// const form = document.querySelector('.checkbox form');
// const task = document.querySelector('.checkbox input[type=checkbox]');

// task.addEventListener('click', () => {
//   form.submit();
// });

const taskBoxes = document.querySelectorAll('.task-box');
// const seeMoreButtons = document.querySelectorAll('.see-more-button');
// const seeLessButtons = document.querySelectorAll('.see-less-button');
// const taskInfos = document.querySelectorAll('.task-info');

taskBoxes.forEach((taskBox) => {
  const seeMoreButton = taskBox.querySelector('.see-more-button');
  const seeLessButton = taskBox.querySelector('.see-less-button');
  const taskInfo = taskBox.querySelector('.task-info');
  seeMoreButton.addEventListener('click', () => {
    taskInfo.classList.toggle('display');
    seeMoreButton.classList.toggle('hide');
    seeLessButton.classList.toggle('hide');
  });
  seeLessButton.addEventListener('click', () => {
    taskInfo.classList.toggle('display');
    seeMoreButton.classList.toggle('hide');
    seeLessButton.classList.toggle('hide');
  });
});
