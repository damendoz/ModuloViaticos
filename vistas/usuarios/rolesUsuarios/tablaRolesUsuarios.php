<?php
include "../../../clases/conexion.php";
	$con = new conexion();
	$conexion = $con->conectar();
	$sql = "SELECT
            id_rol AS idRol,
            nombre AS nombreRol,
            descripcion AS descripcionRol
			FROM 
			t_cat_roles AS roles";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
		id="tablaRolesUsuariosDataTable" style="width:80%">
	<thead>
		<th> Id del rol</th>
		<th> Nombre</th>
		<th> Descripción</th>
        <th> Editar rol</th>
        <th> Eliminar rol</th>	
	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['idRol']; ?></td>
			<td><?php echo $mostrar['nombreRol']; ?></td>
			<td><?php echo $mostrar['descripcionRol']; ?></td>
			<td>
                <button class="btn btn-warning btn-sm"
						data-toggle="modal" 
						data-target="#modalEditarRol"
					onclick="obtenerDatosRol(<?php echo $mostrar['idRol'] ?>)">
						<span class="fas fa-user-cog"></span>
					</button>
			</td>
            <td>
                <button class="btn btn-danger btn-sm" 
					onclick="eliminarRol(<?php echo $mostrar['idRol'] ?>)">
						<span class="fas fa-trash-alt"></span>
				</button>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaRolesUsuariosDataTable').DataTable();
	});
</script>