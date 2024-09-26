
function captchaCompletado() {
   document.getElementById("login").disabled = false;
}

window.onload = function () {
   document.getElementById("login").disabled = true;
};