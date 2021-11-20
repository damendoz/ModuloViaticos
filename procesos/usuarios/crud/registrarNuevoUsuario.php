<?php

$datos = array(
	"paterno" => $_POST['paternoe'],
	"materno" => $_POST['maternoe'],
	"nombre" => $_POST['nombree'],
	"fechaNacimiento" => $_POST['fechaNacimientoe'],
	"sexo" => $_POST['sexoe'],
	"telefono" => $_POST['telefonoe'],
	"correo" => $_POST['correoe'],
	"usuario" => $_POST['usuarioe'],
	"password" => sha1($_POST['passworde']),
	"idRol" => $_POST['idRole'],
	"ubicacion" => $_POST['ubicacione']

);

include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->registrarNuevoUsuario($datos);