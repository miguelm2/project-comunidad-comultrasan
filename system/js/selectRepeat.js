//FUNCION PARA ELIMINAR EL ESTADO REPETIDO EN LOS USUARIOS
var mycode = {};
$("select[id='estado'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});
var mycode = {};
$("select[id='veracidad'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});
var mycode = {};
$("select[id='tipo_documento'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});
var mycode = {};
$("select[id='tipo_pregunta'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});