$(document).ready(function(){
    $('#tablaAnticipoGerenteLoad').load('anticiposGerente/tablaAnticiposGerente.php');
});

function obtenerDatosAnticipo(idViatico) {
	$.ajax({
		type: "POST",
		data: "idViatico=" + idViatico,
		url: "../procesos/anticipoGerente/obtenerDatosAnticipo.php",
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

function rechazarAnticipo(idUsuario, estatus) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
		url: "../procesos/anticipoGerente/rechazarAnticipo.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaAnticipoGerenteLoad').load('anticiposGerente/tablaAnticiposGerente.php');
				Swal.fire(":D","La solicitud se rechazo con exito!","success");
			} else {
				Swal.fire(":(","Error al rechazar la solicitud!" + respuesta, "error");

				}

		}



	});

}

function aprobarAnticipo(idUsuario, estatus) {
	$.ajax({
		type: "POST",
		data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
		url: "../procesos/anticipoGerente/aprobarAnticipo.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaAnticipoGerenteLoad').load('anticiposGerente/tablaAnticiposGerente.php');
				Swal.fire(":D","La solicitud se aprobo con exito!","success");
			} else {
				Swal.fire(":(","Error al aprobar la solicitud!" + respuesta, "error");

				}

		}



	});

}