<?php 
	
	include "../../../clases/usuarios.php";


	$idRol = $_POST['idRol'];

	$Usuarios = new Usuarios();
	echo $Usuarios->eliminarRol($idRol);