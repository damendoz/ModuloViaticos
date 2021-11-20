
$(document).ready(function(){
	$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});

function agregaNuevoUsuario(){

	$.ajax({
		type: "POST",
		data: $('#frmAgregarUsuario').serialize(),
		url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
					$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
					$('#frmAgregarUsuario')[0].reset();
					Swal.fire(":D","Agregado con exito!","success");
			} else {
				Swal.fire(":(","Error al agregar! " + respuesta, "error");

				}
			}
	});
	
	return false;
}



function obtenerDatosUsuario(idUsuario) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario,
		url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idUsuario').val(respuesta['idUsuario']);
			$('#paternou').val(respuesta['paterno']);
			$('#maternou').val(respuesta['materno']);
			$('#nombreu').val(respuesta['nombrePersona']);
			$('#fechaNacimientou').val(respuesta['fechaNacimiento']);
			$('#sexou').val(respuesta['sexo']);
			$('#telefonou').val(respuesta['telefono']);
			$('#correou').val(respuesta['correo']);
			$('#usuariou').val(respuesta['nombreUsuario']);
			$('#idRolu').val(respuesta['idRol']);
			$('#ubicacionu').val(respuesta['ubicacion']);

		}
	});	
}

function obtenerDatosAnticipo(idUsuario) {

	alert(idUsuario);

}

function actualizarUsuario() {
	$.ajax({
		type:"POST",
		data:$('#frmActualizarUsuario').serialize(),
		url:"../procesos/usuarios/crud/actualizarUsuario.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
				$('#modalActualizarUsuarios').modal("toggle");
				Swal.fire(":D","Actualizado con exito!","success");
			} else {
				Swal.fire(":(","Error al Actualizar! " + respuesta, "error");
			}
		}
	});

	return false;
}

 function eliminarUsuario(idUsuario) {

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
	 				data: "idUsuario=" + idUsuario,
	 				url: "../procesos/usuarios/crud/eliminarUsuario.php",
	 				success:function(respuesta) {
	 					respuesta = respuesta.trim();
	 					if (respuesta == 1) {
					$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
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

function registrarNuevoUsuario(){

	$.ajax({
		type: "POST",
		data: $('#frmregistrarNuevoUsuario').serialize(),
		url: "procesos/usuarios/crud/registrarNuevoUsuario.php",
		success:function(respuesta) {
			console.log(respuesta);
			respuesta = respuesta.trim();
			if (respuesta == 1) {
					$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
					$('#modalregistrarNuevoUsuario').modal("toggle");
					Swal.fire(":D","Agregado con exito!","success");
				} else {
				Swal.fire(":(","Error al agregar! " + respuesta, "error");
			}
		}
	});
	
		return false;
}

function agregarIdUsuarioReset(idUsuario) {

	$('#idUsuarioReset').val(idUsuario);
}


function resetPassword(){
	
	$.ajax({
		type: "POST",
		data: $('#frmActualizaPassword').serialize(),
		url:"../procesos/usuarios/extras/resetPassword.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
					$('#modalResetPassword').modal('hide');
					Swal.fire(":D","Cambio de password con exito!","success");
			} else {
				Swal.fire(":(","Error al actualizar el password!" + respuesta, "error");

				}

		}

	});

	return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
		url: "../procesos/usuarios/extras/cambioEstatus.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
				Swal.fire(":D","Cambio de estatus con exito!","success");
			} else {
				Swal.fire(":(","Error al cambiar el estatus!" + respuesta, "error");

				}

		}



	});

}