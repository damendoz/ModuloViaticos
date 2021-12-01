<?php
include "../../../clases/conexion.php";
	$con = new conexion();
	$conexion = $con->conectar();
	$sql = "SELECT
            id_cliente AS idCliente,
            nombre AS nombreCliente,
            descripcion AS descripcionCliente
			FROM 
			t_cat_clientes AS clientes";
	$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
		id="tablaClientesDataTable" style="width:80%">
	<thead>
		<th> Id del cliente</th>
		<th> Nombre</th>
		<th> Descripción</th>
        <th> Editar cliente</th>
        <th> Eliminar cliente</th>	
	</thead>
	<tbody>
		<?php 
			while($mostrar = mysqli_fetch_array($respuesta)) {
		?>
		<tr>
			<td><?php echo $mostrar['idCliente']; ?></td>
			<td><?php echo $mostrar['nombreCliente']; ?></td>
			<td><?php echo $mostrar['descripcionCliente']; ?></td>
			<td>
                <button class="btn btn-warning btn-sm"
						data-toggle="modal" 
						data-target="#modalEditarClientes"
					onclick="obtenerDatosClientes(<?php echo $mostrar['idCliente'] ?>)">
						<span class="fas fa-user-cog"></span>
					</button>
			</td>
            <td>
                <button class="btn btn-danger btn-sm" 
					onclick="eliminarCliente(<?php echo $mostrar['idCliente'] ?>)">
						<span class="fas fa-trash-alt"></span>
				</button>
            </td>
		</tr>
		<?php } ?>
	</tbody>
</table>


<script>
	$(document).ready(function(){
		$('#tablaClientesDataTable').DataTable();
	});
</script>