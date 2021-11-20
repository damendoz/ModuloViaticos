<?php
    $datos = array(
    'idPersona' => $_POST['idPersona'],
    'idCargo' => $_POST['idCargo'],
    'idCliente' => $_POST['idCliente'],
    'anticipoPoryecto' => $_POST['anticipoPoryecto'],
    'motivoSolicitud' => $_POST['motivoSolicitud'],
    'anticipoFechaS' => $_POST['anticipoFechaS'],
    'anticipoFechaR' => $_POST['anticipoFechaR'],
    'anticipoActividad' => $_POST['anticipoActividad'],
    'anticipoFecha' => $_POST['anticipoFecha'],
    'anticipoHorario' => $_POST['anticipoHorario'],
    'anticipoDesayuno' => $_POST['anticipoDesayuno'],
    'anticipoAlmuerzo' => $_POST['anticipoAlmuerzo'],
    'anticipoCena' => $_POST['anticipoCena'],
    'anticipoIda' => $_POST['anticipoIda'],
    'anticipoVuelta' => $_POST['anticipoVuelta'],
    'anticipoTotal' => $_POST['anticipoTotal']
    );

    include "../../clases/anticipos.php";

    $anticipos = new Anticipos();

    echo $anticipos->agregarAnticipoCliente();