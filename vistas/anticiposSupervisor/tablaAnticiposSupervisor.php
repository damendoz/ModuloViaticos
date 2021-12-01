<?php
    session_start();
    include "../../clases/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
            id_viatico AS idViatico,
            id_usuario AS idUsuario,
            motivo_solicitud as motivoSolicitud,
            fecha_salida AS fechaS,
            fecha_regreso AS fechaR,
            actividad,
            fecha,
            horario,
            desayuno,
            almuerzo,
            cena,
            ida,
            vuelta,
            total,
            total_final AS totalF,
            fecha_viatico AS fechaViatico,
            estatusAnticipo.nombre_estatus AS nombreEstatus,
            t_viaticos.id_estatus AS estatus,
            persona.paterno AS apellidos,
            persona.nombre AS nombres
            FROM t_viaticos
            INNER JOIN
            t_cat_estatus_anticipos AS estatusAnticipo ON t_viaticos.id_estatus = estatusAnticipo.id_estatus
            INNER JOIN
            t_persona AS persona ON t_viaticos.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion, $sql);
?>

    <table class="table table-sm table-bordered dt-responsive nowrap" 
        id="tablaAnticipoSupervisorDataTable" style="width:100%">
    <thead>
        <th>Id anticipo</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Total final</th>
        <th>Estatus</th>
        <th>Validar datos de anticipo</th>
        <th>Procesar</th>
        <th>Rechazar</th>
    </thead>
    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $mostrar['idViatico'];?></td>
            <td><?php echo $mostrar['apellidos'];?></td>
            <td><?php echo $mostrar['nombres'];?></td>
            <td><?php echo $mostrar['totalF'];?></td>
            <td><?php echo $mostrar['nombreEstatus']; ?></td>
            <td><button class="btn btn-info"
                        data-toggle="modal" 
						data-target="#modalValidarAnticipoSupervisor"
                        onclick="obtenerDatosAnticipo(<?php echo $mostrar['idViatico'] ?>)"
                    >
                <span class="far fa-address-card"></span>
            </button></td>  
            <td>
            <?php
            if ($mostrar['estatus'] == 1) {  
               ?>
               <button class="btn btn-secondary"
                        onclick="procesarAnticipo(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                <span class="fas fa-angle-double-right"></span>
            </button>
            </td>  
            <?php
					}
				?>       

            <td>
            <?php
                    if ($mostrar['estatus'] == 1) {       
               ?>  <button type="button" class="btn btn-danger"
                        data-toggle="modal" 
						data-target="#modalMotivoRechazoSupervisor"
                        onclick="rechazarAnticipo(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
            <span class="fa fa-ban"></span>
					
                    </span></button>
                </td>  
                    <?php } ?>         
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaAnticipoSupervisorDataTable').DataTable();
    });
</script>