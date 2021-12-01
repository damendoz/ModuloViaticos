<?php 
	
	include "../../../clases/usuarios.php";


	$idProyecto = $_POST['idProyecto'];

	$Usuarios = new Usuarios();
	echo $Usuarios->eliminarProyecto($idProyecto);