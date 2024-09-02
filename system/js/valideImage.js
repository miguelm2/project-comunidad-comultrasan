$(document).on('change', 'input[type="file"]', function() {
    let fileSize = this.files[0].size;
    let fileName = this.files[0].name;
    let fileType = this.files[0].type;

    // Validar tamaño del archivo
    if (fileSize > 4000000) {
        swal("El archivo debe pesar menos de 4MB", "", "error");
        document.querySelector('input[type="file"]').value = '';
        return;
    }
    // Validar extensión y tipo de archivo
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // Extensiones permitidas
    let allowedTypes = /^image\/(jpg|jpeg|png|gif)$/i; // Tipos MIME permitidos
    if (!allowedExtensions.test(fileName) || !allowedTypes.test(fileType)) {
        swal("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "", "error");
        document.querySelector('input[type="file"]').value = '';
        return;
    }
    // Verificar si el archivo es una imagen usando FileReader
    let reader = new FileReader();
    reader.onloadend = function() {
        // Verificar si el contenido del archivo es válido como imagen
        let img = new Image();
        img.onload = function() {
        };
        img.onerror = function() {
            // No es una imagen válida
            swal("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "", "error");
            document.querySelector('input[type="file"]').value = '';
        };
        img.src = reader.result;
    };
    reader.readAsDataURL(file);
});
