
$(document).ready(function(){
	$('#tablaRolesUsuariosLoad').load("usuarios/rolesUsuarios/tablaRolesUsuarios.php");
});

function agregaNuevoRol(){

	$.ajax({
		type: "POST",
		data: $('#frmAgregarRol').serialize(),
		url: "../procesos/usuarios/roles/agregarNuevoRol.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
                $('#tablaRolesUsuariosLoad').load("usuarios/rolesUsuarios/tablaRolesUsuarios.php");
					$('#frmAgregarRol')[0].reset();
					Swal.fire(":D","Rol agregado con exito!","success");
			} else {
				Swal.fire(":(","Error al agregar el Rol! " + respuesta, "error");

				}
			}
	});
	
	return false;
}

function obtenerDatosRol(idRol) {
	$.ajax({
		type: "POST",
		data: "idRol=" + idRol,
		url: "../procesos/usuarios/roles/obtenerDatosRol.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idRol').val(respuesta['idRol']);
			$('#nombreRolu').val(respuesta['nombreRol']);
			$('#descripcionRolu').val(respuesta['descripcionRol']);
		}
	});	
}

function editarRol() {
	$.ajax({
		type:"POST",
		data:$('#frmEditarRol').serialize(),
		url: "../procesos/usuarios/roles/editarRol.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaRolesUsuariosLoad').load("usuarios/rolesUsuarios/tablaRolesUsuarios.php");
				$('#modalEditarRol').modal("toggle");
				Swal.fire(":D","El rol se ha actualizado con exito!","success");
			} else {
				Swal.fire(":(","Error al actualizar el rol! " + respuesta, "error");
			}
		}
	});

	return false;
}

function eliminarRol(idRol) {

	 Swal.fire({
		title: '¿Estas seguro de eliminar este rol?',
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
   	 				data: "idRol=" + idRol,
   	 				url: "../procesos/usuarios/roles/eliminarRol.php",
   	 				success:function(respuesta) {
   	 					respuesta = respuesta.trim();
   	 					if (respuesta == 1) {
					$('#tablaRolesUsuariosLoad').load("usuarios/rolesUsuarios/tablaRolesUsuarios.php");
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