<?php
include "../../../clases/conexion.php";
	$con = new conexion();
	$conexion = $con->conectar();
	$sql = "SELECT
            id_proyecto AS idProyecto,
            nombre AS nombreProyecto,
            descripcion AS descripcionProyecto
			FROM 
			t_cat_proyectos AS proyectos";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
		id="tablaProyectosDataTable" style="width:80%">
	<thead>
		<th> Id del proyecto</th>
		<th> Nombre</th>
		<th> Descripción</th>
        <th> Editar proyecto</th>
        <th> Eliminar proyecto</th>	
	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['idProyecto']; ?></td>
			<td><?php echo $mostrar['nombreProyecto']; ?></td>
			<td><?php echo $mostrar['descripcionProyecto']; ?></td>
			<td>
                <button class="btn btn-warning btn-sm"
						data-toggle="modal" 
						data-target="#modalEditarProyectos"
					onclick="obtenerDatosProyecto(<?php echo $mostrar['idProyecto'] ?>)">
						<span class="fas fa-user-cog"></span>
					</button>
			</td>
            <td>
                <button class="btn btn-danger btn-sm" 
					onclick="eliminarProyectos(<?php echo $mostrar['idProyecto'] ?>)">
						<span class="fas fa-trash-alt"></span>
				</button>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaProyectosDataTable').DataTable();
	});
</script>