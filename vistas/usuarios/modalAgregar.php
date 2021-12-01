
<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregaNuevoUsuario()">
  <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <label for="paterno">Apellidos</label>
              <input type="text"class="form-control" id="paterno" name="paterno">
            </div>
            <div class="col-sm-4">
              <label for="nombre">Nombres</label>
              <input type="text"class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-sm-4">
              <label for="idIdentidad">Cedula de identidad</label>
              <input type="number" min="1000000" name="idIdentidad" id="idIdentidad" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="fechaNacimiento">Fecha de nacimiento</label>
              <input type="date"class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            <div class="col-sm-4">
              <label for="sexo">Sexo</label>
              <select class="form-control" id="sexo" name="sexo" required>
                <option value=""></option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="O">Otro</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="telefono">Teléfono</label>
              <input type="number"class="form-control" id="telefono" name="telefono">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="correo">Correo</label>
              <input type="email"class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-sm-4">
              <label for="idPais">País</label>
              <?php 
                $sql = "SELECT 
                          id_pais AS idPais,
                          nombre AS nombrePais
                        FROM t_paises AS paises";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idPais" id="idPais" class="form-control" required>
                <option value="">Seleccione un país</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idPais']?>"> <?php echo $mostrar['nombrePais']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="ubicacion">Dirección</label>
              <input name="ubicacion" class="form-control" id="ubicacion"></input>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-4">
              <label for="idCliente">Cliente asociado</label>
              <?php 
                $sql = "SELECT 
                          id_cliente AS idCliente,
                          nombre AS nombreCliente
                        FROM t_cat_clientes AS clientes";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idCliente" id="idCliente" class="form-control" required>
                <option value="">Selecciona un cliente</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idCliente']?>"> <?php echo $mostrar['nombreCliente']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="idProyecto">Proyecto asociado</label>
              <?php 
                $sql = "SELECT 
                          id_proyecto AS idProyecto,
                          nombre AS nombreProyecto
                        FROM t_cat_proyectos AS proyectos";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idProyecto" id="idProyecto" class="form-control" required>
                  <option value="">Seleccione un proyecto</option>
                  <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idProyecto']?>"> <?php echo $mostrar['nombreProyecto']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="idCargo">Cargo</label>
              <?php 
                $sql = "SELECT 
                          id_cargo AS idCargo,
                          nombre AS nombreCargo
                        FROM t_cat_cargos AS cargos";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idCargo" id="idCargo" class="form-control" required>
              <option value="">Seleccione un cargo</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idCargo']?>"> <?php echo $mostrar['nombreCargo']; ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="usuario">Usuario</label>
              <input type="text"class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="col-sm-4">
              <label for="password">Contraseña</label>
              <input type="password"class="form-control" id="password" name="password" required>
            </div>
            <div class="col-sm-4">
              <label for="idRol">Rol de usuario</label>

              <?php 
                $sql = "SELECT 
                          id_rol AS idRol,
                          nombre AS nombreRol
                        FROM t_cat_roles AS roles";
                 $respuesta = mysqli_query($conexion, $sql);       
              ?>
              <select name="idRol" id="idRol" class="form-control" required>
                <option value="">Seleccione un rol</option>
                <?php while($mostrar= mysqli_fetch_array($respuesta)) {?>
                  <option value="<?php echo $mostrar['idRol']?>"> <?php echo $mostrar['nombreRol']; ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
          <button class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>