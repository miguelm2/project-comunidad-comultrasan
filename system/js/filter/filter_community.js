// FILTRO DE ADMINISTRADOR
$('#codigo, #nombre, #nombre_lider').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let codigo = $('#codigo').val() || '';
    let nombre = $('#nombre').val() || '';
    let nombreLider = $('#nombre_lider').val() || '';

    $.post("/system/php/routing/Manager.php", {
        "getTableCommunityFilter": true,
        "codigo": codigo,
        "nombre": nombre,
        "lider": nombreLider
    }).done(function (data) {

        let response = JSON.parse(data);
        console.log(response);

        renderDataTable(response);
    });
}

function renderDataTable(data) {
    $('#tableCommunity').DataTable({
        destroy: true,
        data: data,
        columns: [
            { data: 'Codigo' },
            { data: 'Nombre' },
            { data: 'Lider' },
            { data: 'Estado' },
            { data: 'Fecha' },
            { data: 'Opciones' }
        ]
    });
}
