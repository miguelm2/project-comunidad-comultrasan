// FILTRO DE ADMINISTRADOR
$('#codigo, #nombre, #nombre_lider, #fecha_inicio, #fecha_fin').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let codigo = $('#codigo').val() || '';
    let nombre = $('#nombre').val() || '';
    let nombreLider = $('#nombre_lider').val() || '';
    let fecha_inicio = $('#fecha_inicio').val() || '';
    let fecha_fin = $('#fecha_fin').val() || '';

    $.post("/system/php/routing/Manager.php", {
        "getTableCommunityFilter": true,
        "codigo": codigo,
        "nombre": nombre,
        "lider": nombreLider,
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin
    }).done(function (data) {

        let response = JSON.parse(data);

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
            { data: 'Cantidad' },
            { data: 'Estado' },
            { data: 'Fecha' },
            { data: 'Opciones' }
        ]
    });
}
