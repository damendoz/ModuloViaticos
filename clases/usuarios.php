<?php
    
    include "conexion.php";

    Class Usuarios extends Conexion {
        
        public function loginUsuario($usuario, $password) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $datosUsuario = mysqli_fetch_array($respuesta);
                if ($datosUsuario['activo'] == 1) {
                    $_SESSION['usuario'] = array();
                    $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
                    $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
                    return 1;
                 } else {

                    return 0;
                }
            } else {
                return 0;
            }

        }

        public function agregaNuevoUsuario($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::agregarPersona($datos);

                $sql = "INSERT INTO t_usuarios (id_rol,
                                                id_persona,
                                                id_pais,
                                                id_cliente,
                                                id_proyecto,
                                                id_cargo,
                                                usuario,
                                                password,
                                                ubicacion)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('iiiiiisss', $datos['idRol'],
                                            $idPersona,
                                            $datos['idPais'],
                                            $datos['idCliente'],
                                            $datos['idProyecto'],
                                            $datos['idCargo'],
                                            $datos['usuario'],
                                            $datos['password'],
                                            $datos['ubicacion']);
                $respuesta = $query->execute();
                return $respuesta;
                return 0;
                    }
        

        public function agregarPersona($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona (paterno,
                                            nombre,
                                            fecha_nacimiento,
                                            sexo,
                                            telefono,
                                            correo,
                                            id_identidad)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssssssi', $datos['paterno'],
                                    $datos['nombre'],
                                    $datos['fechaNacimiento'],
                                    $datos['sexo'],
                                    $datos['telefono'],
                                    $datos['correo'],
                                    $datos['idIdentidad']);
        $respuesta = $query->execute();
        $idPersona = mysqli_insert_id($conexion);
        $query->close();
        return $idPersona;
        }

        public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();

            $sql = "SELECT
                    usuarios.id_usuario AS idUsuario,
                    usuarios.usuario AS nombreUsuario,
                    usuarios.ubicacion AS ubicacion,
                    usuarios.activo AS estatus,
                    roles.nombre AS rol,
                    roles.id_rol AS idRol,
                    persona.nombre AS nombrePersona,
                    persona.paterno AS paterno,
                    persona.materno AS materno,
                    persona.fecha_nacimiento AS fechaNacimiento,
                    persona.sexo AS sexo,
                    persona.correo AS correo,
                    persona.telefono AS telefono,
                    persona.id_identidad AS idIdentidad,
                    persona.id_persona AS idPersona,
                    paises.id_pais AS idPais,
                    paises.nombre AS nombrePais,
                    clientes.id_cliente AS idCliente,                      
                    clientes.nombre AS nombreCliente,
                    cargos.id_cargo AS idCargo,
                    cargos.nombre AS nombreCargo,
                    proyectos.nombre AS nombreProyecto,
                    proyectos.id_proyecto AS idProyecto
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
                    t_persona AS persona ON usuarios.id_persona = persona.id_persona
                        AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array(
                'idUsuario' => $usuario['idUsuario'],
                'nombreUsuario' => $usuario['nombreUsuario'],
                'rol' => $usuario['rol'],
                'idRol' => $usuario['idRol'],
                'ubicacion' => $usuario['ubicacion'],
                'estatus' => $usuario['estatus'],
                'idPersona' => $usuario['idPersona'],
                'nombrePersona' => $usuario['nombrePersona'],
                'paterno' => $usuario['paterno'],
                'materno' => $usuario['materno'],
                'fechaNacimiento' => $usuario['fechaNacimiento'],
                'sexo' => $usuario['sexo'],
                'correo' => $usuario['correo'],
                'telefono' => $usuario['telefono'],
                'idIdentidad' => $usuario['idIdentidad'],
                'idPais' => $usuario['idPais'],
                'nombrePais' => $usuario['nombrePais'],
                'idCliente' => $usuario['idCliente'],
                'nombreCliente' => $usuario['nombreCliente'],
                'idProyecto' => $usuario['idProyecto'],
                'nombreProyecto' => $usuario['nombreProyecto'],
                'idCargo' => $usuario['idCargo'],
                'nombreCargo' => $usuario['nombreCargo']
            );

            return $datos;
        }


        public function actualizarUsuario($datos) {
            $conexion = Conexion::conectar();
            $exitoPersona = self::actualizarPersona($datos);

            if ($exitoPersona) {
                $sql = "UPDATE t_usuarios SET id_rol = ?,
                                                usuario = ?,
                                                ubicacion = ?,
                                                id_pais = ?,
                                                id_cliente = ?,
                                                id_proyecto = ?,
                                                id_cargo = ?
                        WHERE id_usuario = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('issiiiii', 
                                    $datos['idRol'],
                                    $datos['usuario'],
                                    $datos['ubicacion'],
                                    $datos['idPais'],
                                    $datos['idCliente'],
                                    $datos['idProyecto'],
                                    $datos['idCargo'],
                                    $datos['idUsuario']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;   
            } else {
                return 0;
            }

        }

        public function actualizarPersona($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::obtenerIdPersona($datos['idUsuario']);

            $sql = "UPDATE t_persona SET paterno = ?, 
                                        nombre = ?,
                                        fecha_nacimiento = ?,
                                        sexo = ?,
                                        telefono = ?,
                                        correo = ?,
                                        id_identidad = ?
                    WHERE id_persona = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssii', $datos['paterno'],
                                            $datos['nombre'],
                                            $datos['fechaNacimiento'],
                                            $datos['sexo'],
                                            $datos['telefono'],
                                            $datos['correo'],
                                            $datos['idIdentidad'],
                                            $idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerIdPersona($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
                        persona.id_persona AS idPersona
                    FROM 
                        t_usuarios AS usuarios 
                            INNER JOIN 
                        t_persona AS persona ON usuarios.id_persona = persona.id_persona 
                            AND usuarios.id_usuario = '$idUsuario' ";
            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)['idPersona'];
            return $idPersona;
        }

        public function eliminarUsuario($idUsuario){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_usuarios  WHERE id_persona = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

    public function registrarNuevoUsuario($datos) {
        $conexion = Conexion::conectar();
        $idPersona = self::agregarPersona($datos);

            if ($idPersona > 0) {
            $sql = "INSERT INTO t_usuarios (id_rol, 
                                            id_persona, 
                                            usuario, 
                                            password, 
                                            ubicacion)
                    VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisss', $datos['idRol'],
                                        $idPersona,
                                        $datos['usuario'],
                                        $datos['password'],
                                        $datos['ubicacion']);
            $respuesta = $query->execute();
            return $respuesta;
        } else  {
            return 0;
                }
    }

    public function resetPassword($datos) {
        $conexion = Conexion::conectar();
        $sql = "UPDATE t_usuarios 
                SET password = ?
                WHERE id_usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('si', $datos['password'], 
                                $datos['idUsuario']);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function cambioEstatusUsuario($idUsuario, $estatus) {
        $conexion = Conexion::conectar();

        if ($estatus == 1) {
            $estatus = 0;
        } else {
            $estatus = 1;
        }

        $sql = "UPDATE t_usuarios 
                SET activo = ? 
                WHERE id_usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('ii', $estatus, $idUsuario);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;


    }
    
    public function agregaNuevoRol($datos) {
        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_cat_roles (nombre,
                                        descripcion)
                        VALUES ( ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ss',   $datos['nombreRol'],
                                            $datos['descripcionRol']);
                $respuesta = $query->execute();
                return $respuesta;
                return 0;
                    }

    public function obtenerDatosRol($idRol) {
        $conexion = Conexion::conectar();
            
        $sql = "SELECT
                id_rol AS idRol,
                nombre AS nombreRol,
                descripcion AS descripcionRol
                FROM 
                t_cat_roles AS roles 
                WHERE id_rol = '$idRol'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
            
        $datos = array(
                        'idRol' => $usuario['idRol'],
                        'nombreRol' => $usuario['nombreRol'],
                        'descripcionRol' => $usuario['descripcionRol']
                );
            
                return $datos;
    }

    public function editarRol($datos) {
        $conexion = Conexion::conectar();

        $sql = "UPDATE t_cat_roles SET nombre = ?,
                                    descripcion = ?
                WHERE id_rol = ?";
            
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', 
                                $datos['nombreRol'],
                                $datos['descripcionRol'],
                                $datos['idRol']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function eliminarRol($idRol) {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_cat_roles  WHERE id_rol = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idRol);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function agregaNuevoCliente($datos) {
        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_cat_clientes (nombre,
                                        descripcion)
                        VALUES ( ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ss',   $datos['nombreCliente'],
                                            $datos['descripcionCliente']);
                $respuesta = $query->execute();
                return $respuesta;
                return 0;
    }

    public function obtenerDatosCliente($idCliente) {
        $conexion = Conexion::conectar();
            
        $sql = "SELECT
                id_cliente AS idCliente,
                nombre AS nombreCliente,
                descripcion AS descripcionCliente
                FROM 
                t_cat_clientes AS clientes 
                WHERE id_cliente = '$idCliente'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
            
        $datos = array(
                        'idCliente' => $usuario['idCliente'],
                        'nombreCliente' => $usuario['nombreCliente'],
                        'descripcionCliente' => $usuario['descripcionCliente']
                );
            
                return $datos; 
    }

    public function editarClientes($datos) {
        $conexion = Conexion::conectar();

        $sql = "UPDATE t_cat_clientes SET nombre = ?,
                                    descripcion = ?
                WHERE id_cliente = ?";
            
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', 
                                $datos['nombreCliente'],
                                $datos['descripcionCliente'],
                                $datos['idCliente']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function eliminarCliente($idCliente) {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_cat_clientes  WHERE id_cliente = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idCliente);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function agregaNuevoProyecto($datos) {
        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_cat_proyectos (nombre,
                                        descripcion)
                        VALUES ( ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ss',   $datos['nombreProyecto'],
                                            $datos['descripcionProyecto']);
                $respuesta = $query->execute();
                return $respuesta;
                return 0;
    }

    public function obtenerDatosProyectos($idProyecto) {
        $conexion = Conexion::conectar();
            
        $sql = "SELECT
                id_proyecto AS idProyecto,
                nombre AS nombreProyecto,
                descripcion AS descripcionProyecto
                FROM 
                t_cat_proyectos AS proyectos 
                WHERE id_proyecto = '$idProyecto'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
            
        $datos = array(
                        'idProyecto' => $usuario['idProyecto'],
                        'nombreProyecto' => $usuario['nombreProyecto'],
                        'descripcionProyecto' => $usuario['descripcionProyecto']
                );
            
                return $datos; 
    }

    public function editarProyectos($datos) {
        $conexion = Conexion::conectar();

        $sql = "UPDATE t_cat_proyectos SET nombre = ?,
                                    descripcion = ?
                WHERE id_proyecto = ?";
            
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', 
                                $datos['nombreProyecto'],
                                $datos['descripcionProyecto'],
                                $datos['idProyecto']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function eliminarProyecto($idProyecto) {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_cat_proyectos  WHERE id_proyecto = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idProyecto);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function agregaNuevoCargo($datos) {
        $conexion = Conexion::conectar();

        $sql = "INSERT INTO t_cat_cargos (nombre,
                                        descripcion)
                        VALUES ( ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ss',   $datos['nombreCargo'],
                                            $datos['descripcionCargo']);
                $respuesta = $query->execute();
                return $respuesta;
                return 0;
    }

    public function obtenerDatosCargo($idCargo) {
        $conexion = Conexion::conectar();
            
        $sql = "SELECT
                id_cargo AS idCargo,
                nombre AS nombreCargo,
                descripcion AS descripcionCargo
                FROM 
                t_cat_cargos AS cargos 
                WHERE id_cargo = '$idCargo'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
            
        $datos = array(
                        'idCargo' => $usuario['idCargo'],
                        'nombreCargo' => $usuario['nombreCargo'],
                        'descripcionCargo' => $usuario['descripcionCargo']
                );
            
                return $datos; 
    }

    public function editarCargos($datos) {
        $conexion = Conexion::conectar();

        $sql = "UPDATE t_cat_cargos SET nombre = ?,
                                    descripcion = ?
                WHERE id_cargo = ?";
            
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', 
                                $datos['nombreCargo'],
                                $datos['descripcionCargo'],
                                $datos['idCargo']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function eliminarCargo($idCargo) {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_cat_cargos  WHERE id_cargo = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idCargo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

}