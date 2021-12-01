$(document).ready(function(){
    $('#tablaAnticipoSupervisorLoad').load('anticiposSupervisor/tablaAnticiposSupervisor.php');
});

function obtenerDatosAnticipo(idViatico) {
	$.ajax({
		type: "POST",
		data: "idViatico=" + idViatico,
		url: "../procesos/anticipoSupervisor/obtenerDatosAnticipo.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idUsuario').val(respuesta['idUsuario']);
			$('#idViatico').val(respuesta['idViatico']);
            $('#anticipoPaterno').val(respuesta['anticipoPaterno']);
			$('#motivoSolicitud').val(respuesta['motivoSolicitud']);
            $('#anticipoNombres').val(respuesta['anticipoNombres']);
            $('#anticipoCargo').val(respuesta['anticipoCargo']);
            $('#anticipoId').val(respuesta['anticipoId']);
            $('#anticipoTelefono').val(respuesta['anticipoTelefono']);
            $('#anticipoCorreo').val(respuesta['anticipoCorreo']);
            $('#anticipoCliente').val(respuesta['anticipoCliente']);
            $('#anticipoPoryecto').val(respuesta['anticipoPoryecto']);
            $('#anticipoActividad').val(respuesta['anticipoActividad']);
            $('#anticipoFecha').val(respuesta['anticipoFecha']);
            $('#anticipoHorario').val(respuesta['anticipoHorario']);
            $('#anticipoDesayuno').val(respuesta['anticipoDesayuno']);
            $('#anticipoAlmuerzo').val(respuesta['anticipoAlmuerzo']);
            $('#anticipoCena').val(respuesta['anticipoCena']);
            $('#anticipoIda').val(respuesta['anticipoIda']);
            $('#anticipoVuelta').val(respuesta['anticipoVuelta']);
            $('#anticipoTotal').val(respuesta['anticipoTotal']);
            $('#anticipoFinal').val(respuesta['anticipoFinal']);
		}
	});	
}

function procesarAnticipo(idUsuario, estatus) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
		url: "../procesos/anticipoSupervisor/procesarAnticipo.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaAnticipoSupervisorLoad').load("anticiposSupervisor/tablaAnticiposSupervisor.php");
				Swal.fire(":D","La solicitud se proceso con exito!","success");
			} else {
				Swal.fire(":(","Error al procesar la solicitud!" + respuesta, "error");

				}

		}



	});

}
function rechazarAnticipo(idUsuario, estatus) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
		url: "../procesos/anticipoSupervisor/rechazarAnticipo.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaAnticipoSupervisorLoad').load("anticiposSupervisor/tablaAnticiposSupervisor.php");
				Swal.fire(":D","La solicitud se rechazo con exito!","success");
			} else {
				Swal.fire(":(","Error al rechazar la solicitud!" + respuesta, "error");

				}

		}



	});

}