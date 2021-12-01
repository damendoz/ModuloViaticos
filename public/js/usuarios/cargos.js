
$(document).ready(function(){
	$('#tablaCargosLoad').load("usuarios/cargos/tablaCargos.php");
});

function agregaNuevoCargo(){

	$.ajax({
		type: "POST",
		data: $('#frmAgregarCargo').serialize(),
		url: "../procesos/usuarios/cargos/agregarNuevoCargo.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
                $('#tablaCargosLoad').load("usuarios/cargos/tablaCargos.php");
				$('#frmAgregarCargo')[0].reset();
				Swal.fire(":D","Cargo agregado con exito!","success");
			} else {
				Swal.fire(":(","Error al agregar el cargo! " + respuesta, "error");

				}
			}
	});
	
	return false;
}

function obtenerDatosCargo(idCargo) {
	$.ajax({
		type: "POST",
		data: "idCargo=" + idCargo,
		url: "../procesos/usuarios/cargos/obtenerDatosCargos.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idCargo').val(respuesta['idCargo']);
			$('#nombreCargou').val(respuesta['nombreCargo']);
			$('#descripcionCargou').val(respuesta['descripcionCargo']);
		}
	});	
}

function editarCargos() {
	$.ajax({
		type:"POST",
		data:$('#frmEditarCargos').serialize(),
		url: "../procesos/usuarios/cargos/editarCargos.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaCargosLoad').load("usuarios/cargos/tablaCargos.php");
				$('#modalEditarCargos').modal("toggle");
				Swal.fire(":D","El cargo se ha actualizado con exito!","success");
			} else {
				Swal.fire(":(","Error al actualizar el cargo! " + respuesta, "error");
			}
		}
	});

	return false;
}

function eliminarCargos(idCargo) {

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
                       data: "idCargo=" + idCargo,
                       url: "../procesos/usuarios/cargos/eliminarCargo.php",
                       success:function(respuesta) {
                           respuesta = respuesta.trim();
                           if (respuesta == 1) {
                            $('#tablaCargosLoad').load("usuarios/cargos/tablaCargos.php");
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