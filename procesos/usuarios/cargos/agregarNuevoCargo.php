<?php

$datos = array(
	"nombreCargo" => $_POST['nombreCargo'],
	"descripcionCargo" => $_POST['descripcionCargo']
);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregaNuevoCargo($datos);