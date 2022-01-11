const menuButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown-content');
const hamburgerSpans = document.querySelector('.hamburger span');

menuButton.addEventListener('click', () => {
  dropdown.classList.toggle('show');
  hamburgerSpans.classList.toggle('is-active');
});

// const checkboxForms = document.querySelectorAll('.checkbox form');

// checkboxForms.forEach((form) => {
//   const task = form.querySelector('.checkbox input[type=checkbox]');

//   task.addEventListener('click', () => {
//     form.submit();
//     console.log(task);
//   });
// });

const completedForms = document.querySelectorAll('.complete-form form');

completedForms.forEach((completedForm) => {
  const radioButtons = completedForm.querySelectorAll(
    '.complete-form input[type=radio]'
  );
  radioButtons.forEach((radioButton) => {
    radioButton.addEventListener('click', () => {
      completedForm.submit();
    });
  });
});

const taskBoxes = document.querySelectorAll('.task-box');

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

const backToTop = document.querySelector('.back-to-top');

backToTop.addEventListener('click', () => {
  window.scrollTo(0, 0);
});

const changeTitleButton = document.querySelector('.change-title-button');
if (changeTitleButton) {
  const changeTitle = document.querySelector('.change-title');
  const addTaskButton = document.querySelector('.add-task-button');
  const addTask = document.querySelector('.add-task');

  changeTitleButton.addEventListener('click', () => {
    changeTitle.classList.toggle('display');
  });

  addTaskButton.addEventListener('click', () => {
    addTask.classList.toggle('display');
  });
}
