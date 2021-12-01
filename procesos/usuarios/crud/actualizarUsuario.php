<?php 
	 
		$datos = array(
			'idUsuario' => $_POST['idUsuario'],
			'paterno' => $_POST['paternou'],
			'nombre' => $_POST['nombreu'],
			'fechaNacimiento' => $_POST['fechaNacimientou'],
			'sexo' => $_POST['sexou'],
			'telefono' => $_POST['telefonou'],
			'correo' => $_POST['correou'],
			'usuario' => $_POST['usuariou'],
			'idRol' => $_POST['idRolu'],
			'ubicacion' => $_POST['ubicacionu'],
			'idIdentidad' => $_POST['idIdentidadu'],
			'idPais' => $_POST['idPaisu'],
			'idCliente' => $_POST['idClienteu'],
			'idProyecto' => $_POST['idProyectou'],
			'idCargo' => $_POST['idCargou']
		);

		include "../../../clases/usuarios.php";
		$Usuarios = new Usuarios();
		echo $Usuarios->actualizarUsuario($datos);