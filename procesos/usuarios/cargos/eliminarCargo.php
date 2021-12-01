<?php 
	
	include "../../../clases/usuarios.php";


	$idCargo = $_POST['idCargo'];

	$Usuarios = new Usuarios();
	echo $Usuarios->eliminarCargo($idCargo);