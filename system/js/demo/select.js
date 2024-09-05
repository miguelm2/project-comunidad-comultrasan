$(document).ready(function () {
    $('.select2').select2({
        theme: 'bootstrap-5',
    });

    $(".selectCommunity").select2({
        theme: 'bootstrap-5',
        dropdownParent: $("#formulario")
    });

});