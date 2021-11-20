<?php


include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
$idUsuario = $_POST['idUsuario'];
$estatus = $_POST['estatus'];
    echo $Usuarios->cambioEstatusUsuario($idUsuario, $estatus);