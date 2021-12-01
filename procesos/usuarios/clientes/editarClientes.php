<?php 
	 
		$datos = array(
			'idCliente' => $_POST['idCliente'],
			'nombreCliente' => $_POST['nombreClienteu'],
			'descripcionCliente' => $_POST['descripcionClienteu']
		);

		include "../../../clases/usuarios.php";
		$Usuarios = new Usuarios();
		echo $Usuarios->editarClientes($datos);