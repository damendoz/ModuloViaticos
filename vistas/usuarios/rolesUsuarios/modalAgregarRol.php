
<!-- Modal -->
<form id="frmAgregarRol" method="POST" onsubmit="return agregaNuevoRol()">
  <div class="modal fade" id="modalAgregarRoles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreRol">Nombre</label>
              <input type="text"class="form-control" id="nombreRol" name="nombreRol" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionRol">Descripcion</label>
              <textarea class="form-control" id="descripcionRol" name="descripcionRol" required></textarea>
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