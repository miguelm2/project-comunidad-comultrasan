// FILTRO DE ADMINISTRADOR
$('#cedula, #nombre, #fecha_inicio, #fecha_fin').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let cedula = $('#cedula').val() || '';
    let nombre = $('#nombre').val() || '';
    let fecha_inicio = $('#fecha_inicio').val() || '';
    let fecha_fin = $('#fecha_fin').val() || '';
    const urlParams = new URLSearchParams(window.location.search);

    let id = urlParams.get('community');

    $.post("/system/php/routing/Admin.php", {
        "getTablePointsFilter": true,
        "cedula": cedula,
        "nombre": nombre,
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
        "comunidad": id
    }).done(function (data) {

        let response = JSON.parse(data);
        console.log(response);
        

        renderDataTable(response);
    });
}

function renderDataTable(data) {
    $('#tablePoints').DataTable({
        destroy: true,
        data: data,
        columns: [
            { data: 'Comunidad' },
            { data: 'Asociado' },
            { data: 'Actividad' },
            { data: 'Asignación / Vencimiento' },
            { data: 'Estatus Actividad' },
            { data: 'Corazones' },
            { data: 'Opciones' }
        ]
    });
}
