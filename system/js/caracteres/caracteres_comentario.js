document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('publicacionForo');
    const contador = document.getElementById('contadorPublicacion');

    textarea.addEventListener('input', function() {
        const maxLength = this.maxLength;
        const caracteresRestantes = maxLength - this.value.length;
        contador.textContent = caracteresRestantes;
    });
});
