const logout_button = document.querySelector('.out');
const formconfirmlogout = document.querySelector('section.form.confirm.logout');
const closeForm_buttons = document.querySelectorAll('div.close-form');
const closeForm_buttons_p = document.querySelectorAll('p.close-form');
const closeFormMini_buttons = document.querySelectorAll('.close-form-mini');
const back = document.querySelector('div.back');

if(closeForm_buttons){
    closeForm_buttons.forEach(button => {
        button.addEventListener('click',() => {
            button.parentElement.classList.remove("active");
            setTimeout(() => {
                back.style.display = "none";
                button.parentElement.style.display = "none";
            },900);
        });
    });
}
if(closeForm_buttons_p){
    closeForm_buttons_p.forEach(button => {
        button.addEventListener('click',() => {
            button.parentElement.parentElement.classList.remove("active");
            setTimeout(() => {
                back.style.display = "none";
                button.parentElement.parentElement.style.display = "none";
            },900);
        });
    });
}
if(closeFormMini_buttons){
    closeFormMini_buttons.forEach(button => {
        button.addEventListener('click',() => {
            button.parentElement.style.display = "none";
        });
    });
}
if(logout_button){
    logout_button.addEventListener('click',() => {
        back.style.display = "block";
        formconfirmlogout.style.display = "flex";
        formconfirmlogout.style.flexDirection = "column";
        formconfirmlogout.style.justifyContent = "center";
        setTimeout(() => {
            formconfirmlogout.classList.add("active");
        },200);
    });
}