// FILTRO DE ADMINISTRADOR
$('#codigo_user, #nombre_user, #documento').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let codigo = $('#codigo_user').val() || '';
    let nombre = $('#nombre_user').val() || '';
    let documento = $('#documento').val() || '';

    $.post("/system/php/routing/Admin.php", {
        "getTableUserFilter": true,
        "codigo_user": codigo,
        "nombre_user": nombre,
        "documento": documento
    }).done(function (data) {

        let response = JSON.parse(data);
        console.log(response);

        renderDataTable(response);
    });
}

function renderDataTable(data) {
    $('#tableUser').DataTable({
        destroy: true,
        data: data,
        columns: [
            { data: 'Nombre' },
            { data: 'Comunidad' },
            { data: 'Celular' },
            { data: 'Correo' },
            { data: 'Fecha_nacimiento' },
            { data: 'Referido' },
            { data: 'Tipo' },
            { data: 'Fecha_comunidad' },
            { data: 'Grupo_interes' },
            { data: 'Ultimo_punto' },
            { data: 'Total_puntos' },
            { data: 'Estado' },
            { data: 'Opciones' }
        ]
    });
}