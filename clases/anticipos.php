<?php

    include "conexion.php";

    class anticipos extends Conexion {
        public function agregarAnticipoCliente($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_viaticos (id_persona,
                                            id_usuario,
                                            total_final,
                                            total,
                                            ida,
                                            vuelta,
                                            desayuno,
                                            almuerzo,
                                            cena,
                                            horario,
                                            fecha,
                                            actividad,
                                            motivo_solicitud,
                                            actividadUno,
                                            fechaUno,
                                            horarioUno,
                                            desayunoUno,
                                            almuerzoUno,
                                            cenaUno,
                                            idaUno,
                                            vueltaUno,
                                            totalUno,
                                            actividadDos,
                                            fechaDos,
                                            horarioDos,
                                            desayunoDos,
                                            almuerzoDos,
                                            cenaDos,
                                            idaDos,
                                            vueltaDos,
                                            totalDos,
                                            actividadTres,
                                            fechaTres,
                                            horarioTres,
                                            desayunoTres,
                                            almuerzoTres,
                                            cenaTres,
                                            idaTres,
                                            vueltaTres,
                                            totalTres,
                                            fecha_salida,
                                            fecha_regreso
                                            )
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                            ?, ?, ?, ?, ?, ?)";
                            
                            
            $query = $conexion->prepare($sql);
            $query->bind_param('iiiiiiiiisssssssiiiiiisssiiiiiisssiiiiiiss', $datos['idPersona'],
                                                            $datos['idUsuario'],
                                                            $datos['anticipoFinal'],
                                                            $datos['anticipoTotal'],
                                                            $datos['anticipoIda'],
                                                            $datos['anticipoVuelta'],
                                                            $datos['anticipoDesayuno'],
                                                            $datos['anticipoAlmuerzo'],
                                                            $datos['anticipoCena'],
                                                            $datos['anticipoHorario'],
                                                            $datos['anticipoFecha'],
                                                            $datos['anticipoActividad'],
                                                            $datos['motivoSolicitud'],

                                                            $datos['anticipoActividadUno'],
                                                            $datos['anticipoFechaUno'],
                                                            $datos['anticipoHorarioUno'],
                                                            $datos['anticipoDesayunoUno'],
                                                            $datos['anticipoAlmuerzoUno'],
                                                            $datos['anticipoCenaUno'],
                                                            $datos['anticipoIdaUno'],
                                                            $datos['anticipoVueltaUno'],
                                                            $datos['anticipoTotalUno'],
                                                        
                                                            $datos['anticipoActividadDos'],
                                                            $datos['anticipoFechaDos'],
                                                            $datos['anticipoHorarioDos'],
                                                            $datos['anticipoDesayunoDos'],
                                                            $datos['anticipoAlmuerzoDos'],
                                                            $datos['anticipoCenaDos'],
                                                            $datos['anticipoIdaDos'],
                                                            $datos['anticipoVueltaDos'],
                                                            $datos['anticipoTotalDos'],
                                                        
                                                            $datos['anticipoActividadTres'],
                                                            $datos['anticipoFechaTres'],
                                                            $datos['anticipoHorarioTres'],
                                                            $datos['anticipoDesayunoTres'],
                                                            $datos['anticipoAlmuerzoTres'],
                                                            $datos['anticipoCenaTres'],
                                                            $datos['anticipoIdaTres'],
                                                            $datos['anticipoVueltaTres'],
                                                            $datos['anticipoTotalTres'],
                                                            $datos['anticipoFechaS'],
                                                            $datos['anticipoFechaR']);

            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    

    public function eliminarAnticipoCliente($idViatico) {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_viaticos WHERE id_viatico = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idViatico);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenerDatosAnticipo($idViatico) {
        $conexion = Conexion::conectar();

        $sql = "SELECT 
                id_viatico AS idViatico,
                t_viaticos.id_usuario AS idUsuario,
                motivo_solicitud as motivoSolicitud,
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
                persona.paterno AS apellidos,
                persona.nombre AS nombres,
                persona.telefono AS telefono,
                persona.correo AS correo,
                cargos.nombre AS nombreCargo,
                proyectos.nombre AS nombreProyecto,
                clientes.nombre AS nombreCliente,
                persona.id_identidad AS idIdentidad
                FROM t_viaticos
                INNER JOIN
                t_usuarios AS usuarios ON t_viaticos.id_usuario = usuarios.id_usuario
                INNER JOIN
                t_cat_estatus_anticipos AS estatusAnticipo ON t_viaticos.id_estatus = estatusAnticipo.id_estatus
                INNER JOIN
                t_persona AS persona ON t_viaticos.id_persona = persona.id_persona
                INNER JOIN
                t_cat_cargos AS cargos ON cargos.id_cargo = usuarios.id_cargo
                INNER JOIN
                t_cat_proyectos AS proyectos ON proyectos.id_proyecto = usuarios.id_proyecto
                INNER JOIN
                t_cat_clientes AS clientes ON clientes.id_cliente = usuarios.id_cliente 
                AND t_viaticos.id_viatico = '$idViatico'";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array(
                'idViatico' => $usuario['idViatico'],
                'idUsuario' => $usuario['idUsuario'],
                'anticipoPaterno' => $usuario['apellidos'],
                'motivoSolicitud' => $usuario['motivoSolicitud'],
                'anticipoNombres' => $usuario['nombres'],
                'anticipoCargo' => $usuario['nombreCargo'],
                'anticipoId' => $usuario['idIdentidad'],
                'anticipoTelefono' => $usuario['telefono'],
                'anticipoCorreo' => $usuario['correo'],
                'anticipoCliente' => $usuario['nombreCliente'],
                'anticipoPoryecto' => $usuario['nombreProyecto'],
                'anticipoActividad' => $usuario['actividad'],
                'anticipoFecha' => $usuario['fecha'],
                'anticipoHorario' => $usuario['horario'],
                'anticipoDesayuno' => $usuario['desayuno'],
                'anticipoAlmuerzo' => $usuario['almuerzo'],
                'anticipoCena' => $usuario['cena'],
                'anticipoIda' => $usuario['ida'],
                'anticipoVuelta' => $usuario['vuelta'],
                'anticipoTotal' => $usuario['total'],
                'anticipoFinal' => $usuario['totalF']

            );

            return $datos;
        }

        public function obtenerDatosAnticipoGerente($idViatico) {
            $conexion = Conexion::conectar();
    
            $sql = "SELECT 
                    id_viatico AS idViatico,
                    t_viaticos.id_usuario AS idUsuario,
                    motivo_solicitud as motivoSolicitud,
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
                    persona.paterno AS apellidos,
                    persona.nombre AS nombres,
                    persona.telefono AS telefono,
                    persona.correo AS correo,
                    cargos.nombre AS nombreCargo,
                    proyectos.nombre AS nombreProyecto,
                    clientes.nombre AS nombreCliente,
                    persona.id_identidad AS idIdentidad
                    FROM t_viaticos
                    INNER JOIN
                    t_usuarios AS usuarios ON t_viaticos.id_usuario = usuarios.id_usuario
                    INNER JOIN
                    t_cat_estatus_anticipos AS estatusAnticipo ON t_viaticos.id_estatus = estatusAnticipo.id_estatus
                    INNER JOIN
                    t_persona AS persona ON t_viaticos.id_persona = persona.id_persona
                    INNER JOIN
                    t_cat_cargos AS cargos ON cargos.id_cargo = usuarios.id_cargo
                    INNER JOIN
                    t_cat_proyectos AS proyectos ON proyectos.id_proyecto = usuarios.id_proyecto
                    INNER JOIN
                    t_cat_clientes AS clientes ON clientes.id_cliente = usuarios.id_cliente 
                    AND t_viaticos.id_viatico = '$idViatico'";
    
                $respuesta = mysqli_query($conexion, $sql);
                $usuario = mysqli_fetch_array($respuesta);
    
                $datos = array(
                    'idViatico' => $usuario['idViatico'],
                    'idUsuario' => $usuario['idUsuario'],
                    'anticipoPaterno' => $usuario['apellidos'],
                    'motivoSolicitud' => $usuario['motivoSolicitud'],
                    'anticipoNombres' => $usuario['nombres'],
                    'anticipoCargo' => $usuario['nombreCargo'],
                    'anticipoId' => $usuario['idIdentidad'],
                    'anticipoTelefono' => $usuario['telefono'],
                    'anticipoCorreo' => $usuario['correo'],
                    'anticipoCliente' => $usuario['nombreCliente'],
                    'anticipoPoryecto' => $usuario['nombreProyecto'],
                    'anticipoActividad' => $usuario['actividad'],
                    'anticipoFecha' => $usuario['fecha'],
                    'anticipoHorario' => $usuario['horario'],
                    'anticipoDesayuno' => $usuario['desayuno'],
                    'anticipoAlmuerzo' => $usuario['almuerzo'],
                    'anticipoCena' => $usuario['cena'],
                    'anticipoIda' => $usuario['ida'],
                    'anticipoVuelta' => $usuario['vuelta'],
                    'anticipoTotal' => $usuario['total'],
                    'anticipoFinal' => $usuario['totalF']
    
                );
    
                return $datos;
            }

        public function procesarAnticipo($idUsuario, $estatus) {
            $conexion = Conexion::conectar();
    
            if ($estatus == 1) {
                $estatus = 2;
            } else {
                
            }
    
            $sql = "UPDATE t_viaticos 
                    SET id_estatus = ? 
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
    
    
        }

        public function rechazarAnticipo($idUsuario, $estatus) {
            $conexion = Conexion::conectar();
    
            if ($estatus == 1) {
                $estatus = 4;
            } else {
                $estatus = 1;
            }
    
            $sql = "UPDATE t_viaticos 
                    SET id_estatus = ? 
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
    
    
        }

        public function rechazarAnticipoGerente($idUsuario, $estatus) {
            $conexion = Conexion::conectar();
    
            if ($estatus == 2) {
                $estatus = 4;
            } else {
            }
    
            $sql = "UPDATE t_viaticos 
                    SET id_estatus = ? 
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
    
    
        }
        public function aprobarAnticipoGerente($idUsuario, $estatus) {
            $conexion = Conexion::conectar();
    
            if ($estatus == 2) {
                $estatus = 3;
            } else {
            }
    
            $sql = "UPDATE t_viaticos 
                    SET id_estatus = ? 
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
    
    
        }


}