<?php

$idUsuario = $_POST['idUsuario'];
include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
echo json_encode($Usuarios->obtenerDatosUsuario($idUsuario));