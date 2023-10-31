function alerta(){
    window.alert("¿Desea confirmar el prestamo?")
}
function denegado(){
    window.alert("conexion denegada");
}
function conexion(){
    window.alert("Conexion exitosa");
}
function confirmarprestamo(){
    var reply=confirm("¿Desea confirmar el prestamo?")
if (reply==true) 
{
window.alert("Prestamo confirmado");
}
else 
{
//AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
}
}