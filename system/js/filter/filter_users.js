// FILTRO DE ADMINISTRADOR
$('#codigo_user, #nombre_user, #documento').on('input', function () {
    getTableFilter();
});

function getTableFilter() {
    let codigo = $('#codigo_user').val() || '';
    let nombre = $('#nombre_user').val() || '';
    let documento = $('#documento').val() || '';

    $.post("/system/php/routing/Manager.php", {
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
            { data: 'Codigo' },
            { data: 'Comunidad' },
            { data: 'Nombre' },
            { data: 'Cedula' },
            { data: 'Celular' },
            { data: 'Direccion' },
            { data: 'Correo' },
            { data: 'Fecha_nacimiento' },
            { data: 'Referido' },
            { data: 'Departamento' },
            { data: 'Ciudad' },
            { data: 'Tipo' },
            { data: 'Fecha_creacion' },
            { data: 'Fecha_comunidad' },
            { data: 'Grupo_interes' },
            { data: 'Beneficios' },
            { data: 'Ultimo_punto' },
            { data: 'Total_puntos' },
            { data: 'Estado' },
            { data: 'Opciones' }
        ]
    });
}