<?php
include "../../clases/conexion.php";
	$con = new conexion();
	$conexion = $con->conectar();
	$sql = "SELECT
			usuarios.id_usuario AS idUsuario,
			usuarios.usuario AS nombreUsuario,
			usuarios.id_rol AS idRol,
			usuarios.id_pais AS idPais,
			usuarios.id_cliente AS idCliente,
			usuarios.id_proyecto AS idProyecto,
			usuarios.id_cargo AS idCargo,
			usuarios.ubicacion AS ubicacion,
			usuarios.activo AS estatus,
			usuarios.id_persona AS idPersona,
			persona.nombre AS nombrePersona,
			persona.paterno AS paterno,
			persona.materno AS materno,
			persona.fecha_nacimiento AS fechaNacimiento,
			persona.sexo AS sexo,
			persona.correo AS correo,
			persona.telefono AS telefono,
			persona.id_identidad AS idIdentidad,
			roles.nombre AS rol,
			paises.nombre AS nombrePaises,
			clientes.nombre AS nombreClientes,
			proyectos.nombre AS nombreProyectos,
			cargos.nombre AS nombreCargos
			FROM 
			t_usuarios AS usuarios 
			INNER JOIN 
			t_paises AS paises ON usuarios.id_pais = paises.id_pais
			INNER JOIN
			t_cat_clientes AS clientes ON usuarios.id_cliente = clientes.id_cliente
			INNER JOIN
			t_cat_proyectos AS proyectos ON usuarios.id_proyecto = proyectos.id_proyecto
			INNER JOIN
			t_cat_cargos AS cargos ON usuarios.id_cargo = cargos.id_cargo
			INNER JOIN
			t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
			INNER JOIN
			t_persona AS persona ON usuarios.id_persona = persona.id_persona";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
		id="tablaUsuariosDataTable" style="width:100%">
	<thead>
		<th> Nombre</th>
		<th> Télefono</th>
		<th> Cliente asociado</th>	
		<th> Cargo</th>
		<th> Correo</th>
		<th> Estado de usuario</th>
		<th> Actualizar contraseña</th>
		<th> Actualizar usuario</th>
  <!--	<th>Eliminar Usuario</th> -->
	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['nombrePersona']; ?></td>
			<td><?php echo $mostrar['telefono']; ?></td>
			<td><?php echo $mostrar['nombreClientes']; ?></td>
			<td><?php echo $mostrar['nombreCargos']; ?></td>
			<td><?php echo $mostrar['correo']; ?></td>
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
			<td><button class="btn btn-warning btn-sm"
				
						data-toggle="modal" 
						data-target="#modalResetPassword"
						onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario'] ?>)">
				<span class="fas fa-exchange-alt"></span>
			</button></td>

			<td>
				<button class="btn btn-warning btn-sm" 
						data-toggle="modal" 
						data-target="#modalActualizarUsuarios"
						onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">
				<span class="fas fa-user-cog"></span>
				</button>
			</td>
<!--			<td>
				<span class="btn btn-danger btn-sm"
						onclick="eliminarUsuario(<?php echo $mostrar['idUsuario'] ?>)">
						<span class="far fa-trash-alt"></span>
					
				</span>
			</td> -->
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaUsuariosDataTable').DataTable();
	});
</script>