$('#like').on('click', function () {
    // Obtener el ID del foro desde los parámetros de la URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id_foro = urlParams.get('forum');

    // Enviar solicitud AJAX mediante POST
    $.post("/system/php/routing/User.php", {
        "likedAndUnlikedForum": true,
        "forum": id_foro
    }).done(function (response) {
        let data = JSON.parse(response);

        // Verifica el estado recibido y actualiza el botón
        if (data.status === 'liked') {
            $('#like').html(`&#10084; (${data.likes}) Ya no me gusta`);
        } else if (data.status === 'unliked') {
            $('#like').html(`&#10084; (${data.likes}) Me gusta`);
        } else {
            console.error('Error:', data.message);
        }
    }).fail(function (error) {
        console.error('Error en la solicitud AJAX:', error);
    });
});
