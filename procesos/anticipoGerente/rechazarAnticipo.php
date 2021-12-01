<?php


include "../../clases/anticipos.php";
$anticipos = new Anticipos();
$idUsuario = $_POST['idUsuario'];
$estatus = $_POST['estatus'];
    echo $anticipos->rechazarAnticipoGerente($idUsuario, $estatus);