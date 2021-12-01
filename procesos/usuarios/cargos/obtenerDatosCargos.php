<?php

$idCargo = $_POST['idCargo'];
include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
echo json_encode($Usuarios->obtenerDatosCargo($idCargo));