<?php

$idProyecto = $_POST['idProyecto'];
include "../../../clases/usuarios.php";
$Usuarios = new Usuarios();
echo json_encode($Usuarios->obtenerDatosProyectos($idProyecto));