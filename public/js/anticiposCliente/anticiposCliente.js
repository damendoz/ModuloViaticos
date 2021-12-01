$(document).ready(function(){
    $('#tablaAnticipoClienteLoad').load('usuarios/anticipo/tablaAnticipoCliente.php');
});


function SolicitarAnticipo() {

    $.ajax({
        type: "POST",
        data: $('#frmAnticipo').serialize(),
        url: "../procesos/anticipoCliente/agregarNuevoAnticipo.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAnticipoClienteLoad').load('usuarios/anticipo/tablaAnticipoCliente.php');
                $('#modalSolicitarAnticipo').modal('hide');
                Swal.fire(":D","Agregado con exito!","success");
        } else {
            Swal.fire(":(","Error al agregar! " + respuesta, "error");

            }
        }
    });

    return false;
}

function eliminarAnticipoCliente(idViatico) {
    Swal.fire({
  	title: '¿Estas seguro de eliminar este usuario?',
    text: "Una vez eliminado no podra ser recuperado!",
    icon: 'warning',
    showCancelButton: true,
    confirmbuttonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si, eliminalo!",
    }).then((result) => {
    if (result.isConfirmed){
    	 		 	$.ajax({
         				type: "POST",
       	 				data: "idViatico=" + idViatico,
       	 				url: "../procesos/anticipoCliente/eliminarAnticipoCliente.php",
       	 				success:function(respuesta) {
       	 					respuesta = respuesta.trim();
       	 					if (respuesta == 1) {
                                $('#tablaAnticipoClienteLoad').load('usuarios/anticipo/tablaAnticipoCliente.php');
       					        Swal.fire(":D","se elimino con exito!","success");
       				        } else {
       					        Swal.fire(":(","No se pudo Eliminar! " + respuesta, "error");
       				        }
        			    }
        		    });
   	}
            
    })
    return false;
}

