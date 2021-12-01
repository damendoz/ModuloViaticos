<?php

$datos = array(
	"nombreCliente" => $_POST['nombreCliente'],
	"descripcionCliente" => $_POST['descripcionCliente']
);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregaNuevoCliente($datos);