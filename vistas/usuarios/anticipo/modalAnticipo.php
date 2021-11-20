<!-- Modal -->
  <form id="frmAnticipo" method="POST" onsubmit="return SolicitarAnticipo()">
    <div class="modal fade" id="modalSolicitarAnticipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Solicitar Anticipo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" id="idUsuario" name="idUsuario" hidden>
            <div class="row">
              <div class="col-sm-4">
                <label for="anticipoPaterno">Apellido paterno</label>

                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.paterno AS paterno
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>

                <select class="form-control" id="anticipoPaterno" name="anticipoPaterno" require>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['paterno']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="anticipoMaterno">Apellido materno</label>

                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.materno AS materno
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>

                <select class="form-control" id="anticipoMaterno" name="anticipoMaterno" require>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['materno']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="anticipoNombres">Nombres</label>

                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.nombre AS nombre
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>

                <select class="form-control" id="anticipoNombres" name="anticipoNombres" require>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['nombre']; ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="anticipoCargo">Cargo</label>
                <?php
                    $idUsuario = $_SESSION['usuario']['id'];
                    $sql = "SELECT 
                      cargos.id_cargo idCargo,
                      cargos.nombre nombreCargo,
                      cliente.id_cliente AS idCliente,
                      cliente.nombre AS nombreCliente
                  FROM
                    t_cat_cargos AS cargos
                        INNER JOIN
                      t_cat_clientes AS cliente ON cargos.id_cliente = cliente.id_cliente
                  WHERE
                    cargos.id_persona = (SELECT
                                             id_persona
                                           FROM
                                             t_usuarios
                                           WHERE
                                             id_usuario = '$idUsuario')";
                    $respuesta = mysqli_query($conexion, $sql);

              
              ?>
                <select type="text"class="form-control" id="anticipoCargo" name="anticipoCargo" required>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                  <option value="">Selecciona un cargo</option>
                <option value="<?php echo $mostrar['idCargo']; ?>"><?php echo $mostrar['nombreCargo']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="documentoId">Documento ID</label>
                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.id_identidad AS idIdentidad
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>
                <select type="number"class="form-control" id="documentoId" name="documentoId" required>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['idIdentidad']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="anticipoTelefono">Telefono Celular</label>

                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.telefono AS telefono
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>

                <select type="number"class="form-control" id="anticipoTelefono" name="anticipoTelefono" required>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['telefono']; ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="anticipoCorreo">Correo electrónico</label>
                <?php
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  usuario.id_persona AS idPersona,
                  persona.correo AS correo
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>
                <select type="text"class="form-control" id="anticipoCorreo" name="anticipoCorreo" required>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                <option value="<?php echo $mostrar['idPersona']; ?>"><?php echo $mostrar['correo']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="anticipoCliente">Cliente asociado</label>
              <?php
                    $idUsuario = $_SESSION['usuario']['id'];
                    $sql = "SELECT 
                      cargos.id_cargo idCargo,
                      cliente.id_cliente AS idCliente,
                      cliente.nombre AS nombreCliente
                  FROM
                    t_cat_cargos AS cargos
                        INNER JOIN
                      t_cat_clientes AS cliente ON cargos.id_cliente = cliente.id_cliente
                  WHERE
                    cargos.id_persona = (SELECT
                                             id_persona
                                           FROM
                                             t_usuarios
                                           WHERE
                                             id_usuario = '$idUsuario')";
                    $respuesta = mysqli_query($conexion, $sql);

              
              ?>

                <select class="form-control" id="anticipoCliente" name="anticipoCliente" required> 
                  <option value="">Selecciona un cliente</option>
                  <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
                    <option value="<?php echo $mostrar['idCliente']; ?>"><?php echo $mostrar['nombreCliente']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-4"> 
              <label for="anticipoPoryecto">Proyecto asociado</label>
                <input type="text"class="form-control" id="anticipoPoryecto" name="anticipoPoryecto" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label for="motivoSolicitud" class="center">Motivo de la solicitud</label>
                <textarea class="form-control" id="motivoSolicitud" name="motivoSolicitud" required></textarea>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
              <label for="anticipoFechaS">Fecha de Salida</label>
              <input type="date" name="anticipoFechaS" class="form-control" id="anticipoFechaS"></input>
            </div>
            <div class="col-lg-12">
              <label for="anticipoFechaR">Fecha de regreso</label>
              <input type="date" name="anticipoFechaR" class="form-control" id="anticipoFechaR"></input>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="anticipoActividad">Actividad</label>
                <input type="text"class="form-control" id="anticipoActividad" name="anticipoActividad" required>
              </div>
              <div class="col-sm-2">
                <label for="anticipoFecha">Fecha</label>
                <input type="date"class="form-control" id="anticipoFecha" name="anticipoFecha" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoHorario">Horario</label>
                <input type="text"class="form-control" id="anticipoHorario" name="anticipoHorario" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoDesayuno">Desayuno</label>
                <input type="number"class="form-control" id="anticipoDesayuno" name="anticipoDesayuno" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoAlmuerzo">Almuerzo</label>
                <input type="number"class="form-control" id="anticipoAlmuerzo" name="anticipoAlmuerzo" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoCena">Cena</label>
                <input type="number"class="form-control" id="anticipoCena" name="anticipoCena" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoIda">Ida</label>
                <input type="number"class="form-control" id="anticipoIda" name="anticipoIda" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoVuelta">Vuelta</label>
                <input type="number"class="form-control" id="anticipoVuelta" name="anticipoVuelta" required>
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoTotal">Total</label>
                <input type="number"class="form-control" id="anticipoTotal" name="anticipoTotal" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="anticipoActividadUno"></label>
                <input type="text"class="form-control" id="anticipoActividadUno" name="anticipoActividadUno">
              </div>
              <div class="col-sm-2">
                <label for="anticipoFechaUno"></label>
                <input type="date"class="form-control" id="anticipoFechaUno" name="anticipoFechaUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoHorarioUno"></label>
                <input type="text"class="form-control" id="anticipoHorarioUno" name="anticipoHorarioUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoDesayunoUno"></label>
                <input type="number"class="form-control" id="anticipoDesayunoUno" name="anticipoDesayunoUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoAlmuerzoUno"></label>
                <input type="number"class="form-control" id="anticipoAlmuerzoUno" name="anticipoAlmuerzoUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoCenaUno"></label>
                <input type="number"class="form-control" id="anticipoCenaUno" name="anticipoCenaUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoIdaUno"></label>
                <input type="number"class="form-control" id="anticipoIdaUno" name="anticipoIdaUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoVueltaUno"></label>
                <input type="number"class="form-control" id="anticipoVueltaUno" name="anticipoVueltaUno">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoTotalUno"></label>
                <input type="number"class="form-control" id="anticipoTotalUno" name="anticipoTotalUno">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="anticipoActividadDos"></label>
                <input type="text"class="form-control" id="anticipoActividadDos" name="anticipoActividadDos">
              </div>
              <div class="col-sm-2">
                <label for="anticipoFechaDos"></label>
                <input type="date"class="form-control" id="anticipoFechaDos" name="anticipoFechaDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoHorarioDos"></label>
                <input type="text"class="form-control" id="anticipoHorarioDos" name="anticipoHorarioDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoDesayunoDos"></label>
                <input type="number"class="form-control" id="anticipoDesayunoDos" name="anticipoDesayunoDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoAlmuerzoDos"></label>
                <input type="number"class="form-control" id="anticipoAlmuerzoDos" name="anticipoAlmuerzoDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoCenaDos"></label>
                <input type="number"class="form-control" id="anticipoCenaDos" name="anticipoCenaDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoIdaDos"></label>
                <input type="number"class="form-control" id="anticipoIdaDos" name="anticipoIdaDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoVueltaDos"></label>
                <input type="number"class="form-control" id="anticipoVueltaDos" name="anticipoVueltaDos">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoTotalDos"></label>
                <input type="number"class="form-control" id="anticipoTotalDos" name="anticipoTotalDos">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="anticipoActividadTres"></label>
                <input type="text"class="form-control" id="anticipoActividadTres" name="anticipoActividadTres">
              </div>
              <div class="col-sm-2">
                <label for="anticipoFechaTres"></label>
                <input type="date"class="form-control" id="anticipoFechaTres" name="anticipoFechaTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoHorarioTres"></label>
                <input type="text"class="form-control" id="anticipoHorarioTres" name="anticipoHorarioTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoDesayunoTres"></label>
                <input type="number"class="form-control" id="anticipoDesayunoTres" name="anticipoDesayunoTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoAlmuerzoTres"></label>
                <input type="number"class="form-control" id="anticipoAlmuerzoTres" name="anticipoAlmuerzoTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoCenaTres"></label>
                <input type="number"class="form-control" id="anticipoCenaTres" name="anticipoCenaTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoIdaTres"></label>
                <input type="number"class="form-control" id="anticipoIdaTres" name="anticipoIdaTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoVueltaTres"></label>
                <input type="number"class="form-control" id="anticipoVueltaTres" name="anticipoVueltaTres">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoTotalTres"></label>
                <input type="number"class="form-control" id="anticipoTotalTres" name="anticipoTotalTres">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="anticipoActividadCuatro"></label>
                <input type="text"class="form-control" id="anticipoActividadCuatro" name="anticipoActividadCuatro">
              </div>
              <div class="col-sm-2">
                <label for="anticipoFechaCuatro"></label>
                <input type="date"class="form-control" id="anticipoFechaCuatro" name="anticipoFechaCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoHorarioCuatro"></label>
                <input type="text"class="form-control" id="anticipoHorarioCuatro" name="anticipoHorarioCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoDesayunoCuatro"></label>
                <input type="number"class="form-control" id="anticipoDesayunoCuatro" name="anticipoDesayunoCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoAlmuerzoCuatro"></label>
                <input type="number"class="form-control" id="anticipoAlmuerzoCuatro" name="anticipoAlmuerzoCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoCenaCuatro"></label>
                <input type="number"class="form-control" id="anticipoCenaCuatro" name="anticipoCenaCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoIdaCuatro"></label>
                <input type="number"class="form-control" id="anticipoIdaCuatro" name="anticipoIdaCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoVueltaCuatro"></label>
                <input type="number"class="form-control" id="anticipoVueltaCuatro" name="anticipoVueltaCuatro">
              </div>
              <div class="col-sm-1"> 
              <label for="anticipoTotalCuatro"></label>
                <input type="number"class="form-control" id="anticipoTotalCuatro" name="anticipoTotalCuatro">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label for="anticipoFinal">Total Final</label>
                <input type="number"class="form-control" id="anticipoFinal" name="anticipoFinal">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary">Nueva solicitud de anticipo</button> 
          </div>
        </div>
      </div>
    </div>
  </form>