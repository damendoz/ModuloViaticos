<?php

$datos = array(
	"nombreRol" => $_POST['nombreRol'],
	"descripcionRol" => $_POST['descripcionRol']
);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregaNuevoRol($datos);