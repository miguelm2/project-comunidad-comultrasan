function validateCorreo() {
   var correo = document.getElementById('correo');
   var comCorreo = document.getElementById('valideCorreo');

   if (correo.value === comCorreo.value) {
      return true;
   } else {
      swal("Los correos no coinciden, intente de nuevo", "", "warning");
      correo.value = '';
      comCorreo.value = '';
      return false;
   }
}