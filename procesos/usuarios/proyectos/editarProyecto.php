<?php 
	 
		$datos = array(
			'idProyecto' => $_POST['idProyecto'],
			'nombreProyecto' => $_POST['nombreProyectou'],
			'descripcionProyecto' => $_POST['descripcionProyectou']
		);

		include "../../../clases/usuarios.php";
		$Usuarios = new Usuarios();
		echo $Usuarios->editarProyectos($datos);