const btnLogin = document.querySelector('.header__item--login')

const modal = document.querySelector('.modal')

const modalLogin = document .querySelector('.auth-form--login')

const btnBack = document.querySelector('.btn--normal--js')

const layoutdoneLogin = document.querySelector('.header__item--user')

const doneLogin = document.querySelector('.btn__login--js')

const btnRegister = document.querySelector('.auth-form__switch-btn--js')

const modalRegister = document.querySelector('.auth-form--register')

const btnfromRegistertoLogin = document.querySelector('.auth-form__switch-btn--login-js')

const btnBackRegister = document.querySelector('.btn__registerback--js')

const btnRegisterForm = document.querySelector('.btn__register--js')

function showAvatar(){
    modal.classList.remove('open')
    layoutdoneLogin.classList.remove('navbar__list--showUser')
    btnLogin.classList.add('header__item--login--js')
}

function showLogin(){
    modal.classList.add('open')
    modalLogin.classList.remove('auth-form--close')
    modalRegister.classList.add('auth-form--close')
}

function closeLogin() {
    modal.classList.remove('open')
}

function showRegister(){
    modalRegister.classList.remove('auth-form--close')
    modalLogin.classList.add('auth-form--close')
}

btnLogin.addEventListener('click', showLogin)

btnBack.addEventListener('click', closeLogin)

modal.addEventListener('click', closeLogin)

doneLogin.addEventListener('click', showAvatar)

modalLogin.addEventListener('click', function (event) {
    event.stopPropagation()
})

btnRegister.addEventListener('click', showRegister)

modalRegister.addEventListener('click', function (event) {
    event.stopPropagation()
})

btnfromRegistertoLogin.addEventListener('click', showLogin)

btnBackRegister.addEventListener('click', closeLogin)

btnRegisterForm.addEventListener('click', showAvatar)
