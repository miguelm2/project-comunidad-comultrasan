function validatePassword() {
    var newPass = document.getElementById('newPass');
    var confpass = document.getElementById('confirmPass');

    if (newPass.value === confpass.value) {
        if (validateSecurityPassword(newPass.value)) {
            return true;
        } else {
            newPass.value = '';
            confpass.value = '';
            return false;
        }
    } else {
        swal("Las contraseñas no coinciden, intente de nuevo", "", "warning");
        newPass.value = '';
        confpass.value = '';
        return false;
    }
}

function validateSecurityPassword(password) {
    if (password.length < 8 ||
        !/[A-Z]/.test(password) ||
        !/[0-9]/.test(password) ||
        !/[\W]/.test(password)) {
        swal("La contraseña debe tener mínimo 8 caracteres, incluyendo 1 mayúscula, 1 número y 1 carácter especial", "", "warning");
        return false;
    }
    return true;
}
