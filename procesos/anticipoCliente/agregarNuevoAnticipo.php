<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    $idPersona = $idUsuario;
    $datos = array(
        'motivoSolicitud' => $_POST['motivoSolicitud'],
        'anticipoActividad' => $_POST['anticipoActividad'],
        'anticipoFecha' => $_POST['anticipoFecha'],
        'anticipoHorario' => $_POST['anticipoHorario'],
        'anticipoDesayuno' => $_POST['anticipoDesayuno'],
        'anticipoAlmuerzo' => $_POST['anticipoAlmuerzo'],
        'anticipoCena' => $_POST['anticipoCena'],
        'anticipoIda' => $_POST['anticipoIda'],
        'anticipoVuelta' => $_POST['anticipoVuelta'],
        'anticipoTotal' => $_POST['anticipoTotal'],
        'anticipoFechaS' => $_POST['anticipoFechaS'],
        'anticipoFechaR' => $_POST['anticipoFechaR'],

        'anticipoActividadUno' => $_POST['anticipoActividadUno'],
        'anticipoFechaUno' => $_POST['anticipoFechaUno'],
        'anticipoHorarioUno' => $_POST['anticipoHorarioUno'],
        'anticipoDesayunoUno' => $_POST['anticipoDesayunoUno'],
        'anticipoAlmuerzoUno' => $_POST['anticipoAlmuerzoUno'],
        'anticipoCenaUno' => $_POST['anticipoCenaUno'],
        'anticipoIdaUno' => $_POST['anticipoIdaUno'],
        'anticipoVueltaUno' => $_POST['anticipoVueltaUno'],
        'anticipoTotalUno' => $_POST['anticipoTotalUno'],
        
        'anticipoActividadDos' => $_POST['anticipoActividadDos'],
        'anticipoFechaDos' => $_POST['anticipoFechaDos'],
        'anticipoHorarioDos' => $_POST['anticipoHorarioDos'],
        'anticipoDesayunoDos' => $_POST['anticipoDesayunoDos'],
        'anticipoAlmuerzoDos' => $_POST['anticipoAlmuerzoDos'],
        'anticipoCenaDos' => $_POST['anticipoCenaDos'],
        'anticipoIdaDos' => $_POST['anticipoIdaDos'],
        'anticipoVueltaDos' => $_POST['anticipoVueltaDos'],
        'anticipoTotalDos' => $_POST['anticipoTotalDos'],
        'anticipoActividadTres' => $_POST['anticipoActividadTres'],
        'anticipoFechaTres' => $_POST['anticipoFechaTres'],
        'anticipoHorarioTres' => $_POST['anticipoHorarioTres'],
        'anticipoDesayunoTres' => $_POST['anticipoDesayunoTres'],
        'anticipoAlmuerzoTres' => $_POST['anticipoAlmuerzoTres'],
        'anticipoCenaTres' => $_POST['anticipoCenaTres'],
        'anticipoIdaTres' => $_POST['anticipoIdaTres'],
        'anticipoVueltaTres' => $_POST['anticipoVueltaTres'],
        'anticipoTotalTres' => $_POST['anticipoTotalTres'],

        'anticipoFinal' => $_POST['anticipoFinal'],
        'idPersona' => $idPersona,
        'idUsuario' => $idUsuario
    );

    include "../../clases/anticipos.php";

    $anticipos = new Anticipos();

    echo $anticipos->agregarAnticipoCliente($datos);