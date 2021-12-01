<?php
include "../../../clases/conexion.php";
	$con = new conexion();
	$conexion = $con->conectar();
	$sql = "SELECT
            id_cargo AS idCargo,
            nombre AS nombreCargo,
            descripcion AS descripcionCargo
			FROM 
			t_cat_cargos AS cargos";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
		id="tablaCargosDataTable" style="width:80%">
	<thead>
		<th> Id del cargo</th>
		<th> Nombre</th>
		<th> Descripción</th>
        <th> Editar cargo</th>
        <th> Eliminar cargo</th>	
	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['idCargo']; ?></td>
			<td><?php echo $mostrar['nombreCargo']; ?></td>
			<td><?php echo $mostrar['descripcionCargo']; ?></td>
			<td>
                <button class="btn btn-warning btn-sm"
						data-toggle="modal" 
						data-target="#modalEditarCargos"
					onclick="obtenerDatosCargo(<?php echo $mostrar['idCargo'] ?>)">
						<span class="fas fa-user-cog"></span>
					</button>
			</td>
            <td>
                <button class="btn btn-danger btn-sm" 
					onclick="eliminarCargos(<?php echo $mostrar['idCargo'] ?>)">
						<span class="fas fa-trash-alt"></span>
				</button>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaCargosDataTable').DataTable();
	});
</script>