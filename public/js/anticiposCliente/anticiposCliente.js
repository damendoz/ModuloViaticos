$(document).ready(function(){
    $('#tablaAnticipoClienteLoad').load('usuarios/anticipo/tablaAnticipoCliente.php');
});


function SolicitarAnticipo() {

    $.ajax({
        type: "POST",
        data: $('#frmAnticipo').serialize(),
        url: "../procesos/anticipoCliente/agregarNuevoAnticipo.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAnticipoClienteLoad').load('usuarios/anticipo/tablaAnticipoCliente.php')
                $('#frmAnticipo')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
        } else {
            Swal.fire(":(","Error al agregar! " + respuesta, "error");

            }
        }
    });

    return false;
}