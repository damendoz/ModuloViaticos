<?php 
	 
		$datos = array(
			'idCargo' => $_POST['idCargo'],
			'nombreCargo' => $_POST['nombreCargou'],
			'descripcionCargo' => $_POST['descripcionCargou']
		);

		include "../../../clases/usuarios.php";
		$Usuarios = new Usuarios();
		echo $Usuarios->editarCargos($datos);