<?php
    session_start();
    include "../../../clases/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $contador = 1;
    $sql = "SELECT 
            viaticos.id_anticipo AS idAnticipo,
            viaticos.id_usuario AS idUsuario,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.nombre AS nombre,
            persona.correo AS correo,
            cargos.id_cargo AS idCargo,
            cargos.nombre AS nombreCargo,
            viaticos.id_identidad AS idIdentidad,
            viaticos.telefono AS telefono,
            cliente.id_cliente AS idCliente,
            cliente.nombre AS nombreCliente,
            viaticos.proyecto_a AS proyectoA,
            viaticos.motivo_solicitud AS motivoSolicitud,
            viaticos.fecha_salida AS fechaSalida,
            viaticos.fecha_regreso AS fechaRegreso,
            viaticos.actividad AS actividad,
            viaticos.fecha AS fecha,
            viaticos.horario AS horario,
            viaticos.desayuno AS desayuno,
            viaticos.almuerzo AS almuerzo,
            viaticos.cena AS cena,
            viaticos.ida AS ida,
            viaticos.vuelta AS vuelta,
            viaticos.total AS total,
            viaticos.total_final AS totalFinal,
            viaticos.estatus AS estatus,
            viaticos.fecha_viatico as FechaViatico
        FROM 
            t_viaticos AS viaticos
                INNER JOIN
            t_usuarios AS usuario ON viaticos.id_usuario = usuario.id_usuario
                INNER JOIN
            t_persona AS persona ON usuario.id_persona = persona.id_persona 
                INNER JOIN 
            t_cat_cargos AS cargos ON viaticos.id_cargo = cargos.id_cargo
                INNER JOIN
            t_cat_clientes AS cliente ON viaticos.id_cliente = cliente.id_cliente
                AND viaticos.id_usuario = '$idUsuario'";
    $respuesta = mysqli_query($conexion, $sql);
?>

    <table class="table table-sm dt-responsive nowrap" 
        id="tablaAnticipoClienteDataTable" style="width:100%">
    <thead>
        <th>#</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Nombres</th>
        <th>Cargo</th>
        <th>Documento ID</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Cliente asociado</th>
        <th>Proyecto asociado</th>
        <th>Motivo de la solicitud</th>
        <th>Fecha de salida</th>
        <th>Fecha de regreso</th>
        <th>Actividad</th>
        <th>Fecha</th>
        <th>Horario</th>
        <th>Desayuno</th>
        <th>Almuerzo</th>
        <th>Cena</th>
        <th>Ida</th>
        <th>Vuelta</th>
        <th>Total</th>
        <th>Total Final</th>
        <th>Estatus</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['paterno'];?></td>
            <td><?php echo $mostrar['materno'];?></td>
            <td><?php echo $mostrar['nombre'];?></td>
            <td><?php echo $mostrar['nombreCargo'];?></td>
            <td><?php echo $mostrar['idIdentidad'];?></td>
            <td><?php echo $mostrar['telefono'];?></td>
            <td><?php echo $mostrar['correo'];?></td>
            <td><?php echo $mostrar['nombreCliente'];?></td>
            <td><?php echo $mostrar['proyectoA'];?></td>
            <td><?php echo $mostrar['motivoSolicitud'];?></td>
            <td><?php echo $mostrar['fechaSalida'];?></td>
            <td><?php echo $mostrar['fechaRegreso'];?></td>
            <td><?php echo $mostrar['actividad'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td><?php echo $mostrar['horario'];?></td>
            <td><?php echo $mostrar['desayuno'];?></td>
            <td><?php echo $mostrar['almuerzo'];?></td>
            <td><?php echo $mostrar['ida'];?></td>
            <td><?php echo $mostrar['vuelta'];?></td>
            <td><?php echo $mostrar['total'];?></td>
            <td><?php echo $mostrar['totalFinal'];?></td>
            <td><?php echo $mostrar['FechaViatico'];?></td>
            <td>
                <?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus = '<div class="alert alert-danger" role="alert">
                                            Abierto
                                        </div>';
                    if ($estatus == 0) {
                        $cadenaEstatus = '<div class="alert alert-success" role="alert">
                                                Cerrado
                                            </div>';
                    }
                    echo $cadenaEstatus;
                ?>
                </td>
            <td>
               <button class="btn btn-danger btn-sm"></button>     
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaAnticipoClienteDataTable').DataTable();
    });
</script>