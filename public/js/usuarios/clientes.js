
$(document).ready(function(){
	$('#tablaClientesLoad').load("usuarios/clientes/tablaClientes.php");
});

function agregaNuevoCliente(){

	$.ajax({
		type: "POST",
		data: $('#frmAgregarCliente').serialize(),
		url: "../procesos/usuarios/clientes/agregarNuevoCliente.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
                $('#tablaClientesLoad').load("usuarios/clientes/tablaClientes.php");
				$('#frmAgregarCliente')[0].reset();
				Swal.fire(":D","Cliente agregado con exito!","success");
			} else {
				Swal.fire(":(","Error al agregar el cliente! " + respuesta, "error");

				}
			}
	});
	
	return false;
}

function obtenerDatosClientes(idCliente) {
	$.ajax({
		type: "POST",
		data: "idCliente=" + idCliente,
		url: "../procesos/usuarios/clientes/obtenerDatosClientes.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idCliente').val(respuesta['idCliente']);
			$('#nombreClienteu').val(respuesta['nombreCliente']);
			$('#descripcionClienteu').val(respuesta['descripcionCliente']);
		}
	});	
}

function editarClientes() {
	$.ajax({
		type:"POST",
		data:$('#frmEditarClientes').serialize(),
		url: "../procesos/usuarios/clientes/editarClientes.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaClientesLoad').load("usuarios/clientes/tablaClientes.php");
				$('#modalEditarClientes').modal("toggle");
				Swal.fire(":D","El cliente se ha actualizado con exito!","success");
			} else {
				Swal.fire(":(","Error al actualizar el cliente! " + respuesta, "error");
			}
		}
	});

	return false;
}

function eliminarCliente(idCliente) {

    Swal.fire({
       title: '¿Estas seguro de eliminar este cliente?',
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
                       data: "idCliente=" + idCliente,
                       url: "../procesos/usuarios/clientes/eliminarCliente.php",
                       success:function(respuesta) {
                           respuesta = respuesta.trim();
                           if (respuesta == 1) {
                            $('#tablaClientesLoad').load("usuarios/clientes/tablaClientes.php");
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