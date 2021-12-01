
<!-- Modal -->
<form id="frmAgregarCargo" method="POST" onsubmit="return agregaNuevoCargo()">
  <div class="modal fade" id="modalAgregarCargos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cargo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreCargo">Nombre</label>
              <input type="text"class="form-control" id="nombreCargo" name="nombreCargo" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionCargo">Descripcion</label>
              <textarea class="form-control" id="descripcionCargo" name="descripcionCargo" required></textarea>
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