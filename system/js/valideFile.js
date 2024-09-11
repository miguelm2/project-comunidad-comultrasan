$(document).on('change', 'input[type="file"]', function() {
    let fileSize = this.files[0].size;
    let fileName = this.files[0].name;
    let fileType = this.files[0].type;
    // Validar tamaño del archivo
    if (fileSize > 8000000) {
        swal("El archivo debe pesar menos de 8MB", "", "error");
        document.querySelector('input[type="file"]').value = '';
        return;
    }
    // Validar extensión y tipo de archivo
    let allowedExtensions = /(\.csv)$/i; // Extensiones permitidas
    if (!allowedExtensions.test(fileName)) {
        swal("Por favor, sube solo archivos con el formato CSV", "", "error");
        document.querySelector('input[type="file"]').value = '';
        return;
    }
});