const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const signin_password = document.querySelector('#signin-password');
const signup_password = document.querySelector('#signup-password');
const confirm_password = document.querySelector('#confirm-password');
const signin_togglePassword = document.querySelector('#signin-togglePassword');
const signup_togglePassword = document.querySelector('#signup-togglePassword');
const confirm_togglePassword = document.querySelector('#confirm-togglePassword');

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

signin_togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = signin_password.getAttribute('type') === 'password' ? 'text' : 'password';
    signin_password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

signup_togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = signup_password.getAttribute('type') === 'password' ? 'text' : 'password';
    signup_password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

confirm_togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
    confirm_password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

function clearfield() {
    document.getElementById("signin-username").value = "";
    document.getElementById("signin-password").value = "";
    document.getElementById("signup-username").value = "";
    document.getElementById("email").value = "";
    document.getElementById("signup-password").value = "";
    document.getElementById("confirm-password").value = "";
}

function error_msg(){
    window.alert("Error! Server is down. Please try again later");
    window.location.href("forgotpw.php");
}