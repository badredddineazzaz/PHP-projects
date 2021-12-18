const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const passwordConfirm = document.querySelector('#confirmPassword');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    passwordConfirm.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
});