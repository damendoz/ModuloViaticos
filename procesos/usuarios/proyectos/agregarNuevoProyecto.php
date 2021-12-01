<?php

$datos = array(
	"nombreProyecto" => $_POST['nombreProyecto'],
	"descripcionProyecto" => $_POST['descripcionProyecto']
);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregaNuevoProyecto($datos);