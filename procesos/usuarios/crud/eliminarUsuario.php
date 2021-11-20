<?php 
	
	include "../../../clases/usuarios.php";


	$idUsuario = $_POST['idUsuario'];

	$Usuarios = new Usuarios();
	echo $Usuarios->eliminarUsuario($idUsuario);