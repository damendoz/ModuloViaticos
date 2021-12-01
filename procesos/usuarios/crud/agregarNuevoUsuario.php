<?php

$datos = array(
	"paterno" => $_POST['paterno'],
	"nombre" => $_POST['nombre'],
	"fechaNacimiento" => $_POST['fechaNacimiento'],
	"sexo" => $_POST['sexo'],
	"telefono" => $_POST['telefono'],
	"correo" => $_POST['correo'],
	"usuario" => $_POST['usuario'],
	"password" => sha1($_POST['password']),
	"idRol" => $_POST['idRol'],
	"ubicacion" => $_POST['ubicacion'],
	"idIdentidad" => $_POST['idIdentidad'],
	"idPais" => $_POST['idPais'],
	"idCliente" => $_POST['idCliente'],
	"idProyecto" => $_POST['idProyecto'],
	"idCargo" => $_POST['idCargo']
);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregaNuevoUsuario($datos);