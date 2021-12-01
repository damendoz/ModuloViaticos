$(document).ready(function(){
	$('#tablaProyectosLoad').load("usuarios/proyectos/tablaProyectos.php");
});

function agregaNuevoProyecto(){

	$.ajax({
		type: "POST",
		data: $('#frmAgregarProyecto').serialize(),
		url: "../procesos/usuarios/proyectos/agregarNuevoProyecto.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
                $('#tablaProyectosLoad').load("usuarios/proyectos/tablaProyectos.php");
				$('#frmAgregarProyecto')[0].reset();
				Swal.fire(":D","El proyecto agregado con exito!","success");
			} else {
				Swal.fire(":(","Error al agregar el proyecto! " + respuesta, "error");

				}
			}
	});
	
	return false;
}

function obtenerDatosProyecto(idProyecto) {
	$.ajax({
		type: "POST",
		data: "idProyecto=" + idProyecto,
		url: "../procesos/usuarios/proyectos/obtenerDatosProyectos.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idProyecto').val(respuesta['idProyecto']);
			$('#nombreProyectou').val(respuesta['nombreProyecto']);
			$('#descripcionProyectou').val(respuesta['descripcionProyecto']);
		}
	});	
}

function editarProyectos() {
	$.ajax({
		type:"POST",
		data:$('#frmEditarProyecto').serialize(),
		url: "../procesos/usuarios/proyectos/editarProyecto.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaProyectosLoad').load("usuarios/proyectos/tablaProyectos.php");
				$('#modalEditarProyectos').modal("toggle");
				Swal.fire(":D","El proyecto se ha actualizado con exito!","success");
			} else {
				Swal.fire(":(","Error al actualizar el proyecto! " + respuesta, "error");
			}
		}
	});

	return false;
}

function eliminarProyectos(idProyecto) {

    Swal.fire({
       title: '¿Estas seguro de eliminar este proyecto?',
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
                       data: "idProyecto=" + idProyecto,
                       url: "../procesos/usuarios/proyectos/eliminarProyecto.php",
                       success:function(respuesta) {
                           respuesta = respuesta.trim();
                            if (respuesta == 1) {
                            $('#tablaProyectosLoad').load("usuarios/proyectos/tablaProyectos.php");
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