
<!-- Modal -->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
  <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="idUsuario" name="idUsuario" hidden>
          <div class="row">
            <div class="col-sm-4">
              <label for="paternou">Apellidos</label>
              <input type="text"class="form-control" id="paternou" name="paternou" required>
            </div>
            <div class="col-sm-4">
              <label for="nombreu">Nombres</label>
              <input type="text"class="form-control" id="nombreu" name="nombreu" required>
            </div>
            <div class="col-sm-4">
              <label for="idIdentidadu">Cedula de identidad</label>
              <input type="number" name="idIdentidadu" id="idIdentidadu" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="fechaNacimientou">Fecha de nacimiento</label>
              <input type="date"class="form-control" id="fechaNacimientou" name="fechaNacimientou" required>
            </div>
            <div class="col-sm-4">
              <label for="sexou">Sexo</label>
              <select class="form-control" id="sexou" name="sexou" required>
                <option value="0"></option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="O">Otro</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefonou">Teléfono</label>
              <input type="number"class="form-control" id="telefonou" name="telefonou">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="correou">Correo</label>
              <input type="mail"class="form-control" id="correou" name="correou" required>
            </div>
            <div class="col-sm-4">
            <label for="ubicacionu">Dirección</label>
            <input name="ubicacionu" class="form-control" id="ubicacionu"></input>
          </div>
          </div>
          <div class="row">
          <div class="col-sm-4">
              <label for="idPaisu">País</label>
              <?php 
                $sql = "SELECT 
                          id_pais AS idPais,
                          nombre AS nombrePais
                        FROM t_paises AS paises";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idPaisu" id="idPaisu" class="form-control" required>
              <option value="">Seleccione un país</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idPais']?>"> <?php echo $mostrar['nombrePais']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="idClienteu">Cliente asociado</label>
              <?php 
                $sql = "SELECT 
                          id_cliente AS idCliente,
                          nombre AS nombreCliente
                        FROM t_cat_clientes AS clientes";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idClienteu" id="idClienteu" class="form-control" required>
              <option value="">Selecciona un cliente</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idCliente']?>"> <?php echo $mostrar['nombreCliente']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="idProyectou">Proyecto asociado</label>
              <?php 
                $sql = "SELECT 
                          id_proyecto AS idProyecto,
                          nombre AS nombreProyecto
                        FROM t_cat_proyectos AS proyectos";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idProyectou" id="idProyectou" class="form-control" required>
              <option value="">Seleccione un proyecto</option>
                  <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idProyecto']?>"> <?php echo $mostrar['nombreProyecto']; ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-4">
              <label for="idCargou">Cargo</label>
              <?php 
                $sql = "SELECT 
                          id_cargo AS idCargo,
                          nombre AS nombreCargo
                        FROM t_cat_cargos AS cargos";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idCargou" id="idCargou" class="form-control" required>
              <option value="">Seleccione un cargo</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idCargo']?>"> <?php echo $mostrar['nombreCargo']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="usuariou">Usuario</label>
              <input type="text"class="form-control" id="usuariou" name="usuariou" required>
            </div>
          <div class="col-sm-4">
              <label for="idRolu">Rol de usuario</label>
              <?php 
                $sql = "SELECT 
                          id_rol AS idRol,
                          nombre AS nombreRol
                        FROM t_cat_roles AS roles";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idRolu" id="idRolu" class="form-control" required>
              <option value="">Seleccione un rol</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idRol']?>"> <?php echo $mostrar['nombreRol']; ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
        <div class="modal-footer">
          <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
          <button class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>