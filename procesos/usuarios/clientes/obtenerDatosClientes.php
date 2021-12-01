<?php

$idCliente = $_POST['idCliente'];
include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
echo json_encode($Usuarios->obtenerDatosCliente($idCliente));