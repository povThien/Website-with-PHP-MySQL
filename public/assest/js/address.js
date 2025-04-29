const btn__defaut = document.querySelector(".address__infor-change");
const modal = document.querySelector('.modal');
const modalLogin = document .querySelector('.auth-form--login');
const btnBack = document.querySelector('.btn--normal--js');
const doneLogin = document.querySelector('.btn__login--js');
console.log(btn__defaut);

function showLogin(){
    modal.classList.add('open')
    modalLogin.classList.remove('auth-form--close')
}

function closeLogin() {
    modal.classList.remove('open')
    doneLogin.classList.remove('open');
}

modalLogin.addEventListener('click', function (event) {
    event.stopPropagation()
})
btn__defaut.addEventListener('click', showLogin);

modal.addEventListener('click', closeLogin);

doneLogin.addEventListener('click', closeLogin);

btnBack.addEventListener('click', closeLogin);

