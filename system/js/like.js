$('#like').on('click', function () {
    // Obtener el ID del foro desde los parámetros de la URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id_foro = urlParams.get('forum');

    console.log(id_foro);


    // Enviar solicitud AJAX mediante POST
    $.post("/system/php/routing/User.php", {
        "likedAndUnlikedForum": true,
        "forum": id_foro
    }).done(function (response) {
        let data = JSON.parse(response);
        console.log(data);

        // Verifica el estado recibido y actualiza el botón
        if (data.status === 'liked') {
            $('#like').text('<i class="material-icons me-2">favorite</i> Ya no me gusta');
        } else if (data.status === 'unliked') {
            $('#like').text('<i class="material-icons me-2">favorite</i> Me gusta');
        } else {
            console.error('Error:', data.message);
        }
    }).fail(function (error) {
        console.error('Error en la solicitud AJAX:', error);
    });
});
