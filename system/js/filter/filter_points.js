// FILTRO DE ADMINISTRADOR
$('#nombre').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let nombre = $('#nombre').val() || '';
    const urlParams = new URLSearchParams(window.location.search);

    let id = urlParams.get('community');

    $.post("/system/php/routing/Manager.php", {
        "getTablePointsFilter": true,
        "nombre": nombre,
        "comunidad": id
    }).done(function (data) {

        let response = JSON.parse(data);

        renderDataTable(response);
    });
}

function renderDataTable(data) {
    $('#tablePoints').DataTable({
        destroy: true,
        data: data,
        columns: [
            { data: 'Comunidad' },
            { data: 'Nombre' },
            { data: 'Descripcion' },
            { data: 'Fecha' },
            { data: 'Estatus' },
            { data: 'Puntos' }
        ]
    });
}
