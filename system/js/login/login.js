$('#ingresarjs').on('click', function() {
    // Obtener los valores de los inputs usando jQuery
    var username = $('#cedula').val();
    var password = $('#pass').val();
    $.post('../../php/routing/Page.php',{
        "login": true,
        "cedula": username,
        "pass": password
    }).done(function(data){
        console.log(data);
        let response = JSON.parse(data)
        console.log(response);
        window.location.replace(response);
    });
});