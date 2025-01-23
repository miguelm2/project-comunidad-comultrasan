// FILTRO DE BENEFICIOS
$('#fecha_inicio_lider, #nombre_lider').on('input', function () {
    getTableFilterLider();
});
$('#fecha_inicio_user, #nombre_user').on('input', function () {
    getTableFilterUser();
});

function getTableFilterLider() {
    let fecha_inicio = $('#fecha_inicio_lider').val() || '';
    let nombre = $('#nombre_lider').val() || '';

    $.post("/system/php/routing/User.php", {
        "getTableHistorialCorazonesLider": true,
        "fecha_inicio": fecha_inicio,
        "nombre": nombre
    }).done(function (data) {
        $('#bodyTableUserLider').html(data);
    });
}
function getTableFilterUser() {
    let fecha_inicio = $('#fecha_inicio_user').val() || '';
    let nombre = $('#nombre_user').val() || '';

    $.post("/system/php/routing/User.php", {
        "getTableHistorialCorazonesuser": true,
        "fecha_inicio": fecha_inicio,
        "nombre": nombre
    }).done(function (data) {
        $('#bodyTableUserUser').html(data);
    });
}
