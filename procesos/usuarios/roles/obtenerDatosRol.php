<?php

$idRol = $_POST['idRol'];
include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
echo json_encode($Usuarios->obtenerDatosRol($idRol));