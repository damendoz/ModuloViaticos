<?php
include "../../clases/conexion.php";
$con = new conexion();
$conexion = $con->conectar();
$sql = "SELECT
		usuarios.id_usuario AS idUsuario,
		usuarios.usuario AS nombreUsuario,
		roles.nombre AS rol,
		usuarios.id_rol AS idRol,
		usuarios.ubicacion AS ubicacion,
		usuarios.activo AS estatus,
		usuarios.id_persona AS idPersona,
		persona.nombre AS nombrePersona,
		persona.paterno AS paterno,
		persona.materno AS materno,
		persona.fecha_nacimiento AS fechaNacimiento,
		persona.sexo AS sexo,
		persona.correo AS correo,
		persona.telefono AS telefono
		FROM 
		t_usuarios AS usuarios 
		INNER JOIN 
		t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
		INNER JOIN
		t_persona AS persona ON usuarios.id_persona = persona.id_persona";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" 
		id="tablaUsuariosDataTable" style="width:100%">
	<thead>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Nombre</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Usuario</th>
		<th>Fecha de nacimiento</th>
		<th>Ubicacion</th>
		<th>Sexo</th>		
		<th>Reset Password</th>
		<th>Estado de Usuario</th>
		<th>Actualizar Usuario </th>
		<th>Eliminar Usuario</th>

	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['paterno']; ?></td>
			<td><?php echo $mostrar['materno']; ?></td>
			<td><?php echo $mostrar['nombrePersona']; ?></td>
			<td><?php echo $mostrar['telefono']; ?></td>
			<td><?php echo $mostrar['correo']; ?></td>
			<td><?php echo $mostrar['nombreUsuario']; ?></td>
			<td><?php echo $mostrar['fechaNacimiento']; ?></td>
			<td><?php echo $mostrar['ubicacion']; ?></td>
			<td><?php echo $mostrar['sexo']; ?></td>

			<td><button class="btn btn-info btn-sm"
				
						data-toggle="modal" 
						data-target="#modalResetPassword"
						onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario'] ?>)">
				<span class="fas fa-exchange-alt"></span>
			</button></td>
			<td>
				<?php 

					if ($mostrar['estatus'] == 1) { 
				?>

					<button class="btn btn-success btn-sm" 
						onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
							<span class="fas fa-toggle-on"></span> On
					</button>

				<?php
					} else if($mostrar['estatus'] == 0) {
				?>

				<button class="btn btn-secondary btn-sm" 
					onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
						<span class="fas fa-toggle-off"></span> Off
				</button>
				<?php
					}
				?> 
			</td>
			<td>
				<button class="btn btn-warning btn-sm" 
						data-toggle="modal" 
						data-target="#modalActualizarUsuarios"
						onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">
				<span class="fas fa-user-cog"></span>
				</button>
			</td>
			<td>
				<span class="btn btn-danger btn-sm"
						onclick="eliminarUsuario(<?php echo $mostrar['idUsuario'] ?>)">
						<span class="far fa-trash-alt"></span>
					
				</span>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaUsuariosDataTable').DataTable();
	});
</script>