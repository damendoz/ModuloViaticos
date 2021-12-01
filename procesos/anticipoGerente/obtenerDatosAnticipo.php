<?php

$idViatico = $_POST['idViatico'];
include "../../clases/anticipos.php";
$anticipos = new Anticipos();
echo json_encode($anticipos->obtenerDatosAnticipoGerente($idViatico));