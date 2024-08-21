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
        // Parsear la respuesta si es JSON
        let data;
        try {
            data = JSON.parse(response);
        } catch (e) {
            console.error('Error al parsear la respuesta:', e);
            return;
        }

        // Verifica el estado recibido y actualiza el botón
        if (data.status === 'liked') {
            $('#like').text('Ya no me gusta');
        } else if (data.status === 'unliked') {
            $('#like').text('Me gusta');
        } else {
            console.error('Error:', data.message);
        }
    }).fail(function (error) {
        console.error('Error en la solicitud AJAX:', error);
    });
});
