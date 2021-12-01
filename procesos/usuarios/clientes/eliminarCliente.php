<?php 
	
	include "../../../clases/usuarios.php";


	$idCliente = $_POST['idCliente'];

	$Usuarios = new Usuarios();
	echo $Usuarios->eliminarCliente($idCliente);