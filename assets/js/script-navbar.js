const head = document.querySelector('header');
const burgerbutton = document.querySelector('div.burger');

burgerbutton.addEventListener('click',() => {
    head.classList.toggle('active');
});