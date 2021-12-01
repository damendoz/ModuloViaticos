<?php 
	 
		$datos = array(
			'idRol' => $_POST['idRol'],
			'nombreRol' => $_POST['nombreRolu'],
			'descripcionRol' => $_POST['descripcionRolu']
		);

		include "../../../clases/usuarios.php";
		$Usuarios = new Usuarios();
		echo $Usuarios->editarRol($datos);