$('#takeOut').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extrae la información del atributo data-id

    // Coloca el ID en el input hidden
    var modal = $(this);
    modal.find('#usuario').val(id);
});

$('#editName').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extrae la información del atributo data-id
    var name = button.data('nombre'); // Extrae la información del atributo data-id

    // Coloca el ID en el input hidden
    var modal = $(this);
    modal.find('#comunidad').val(id);
    modal.find('#nombre').val(name);
});