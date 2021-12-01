
<!-- Modal -->
<form id="frmAgregarCliente" method="POST" onsubmit="return agregaNuevoCliente()">
  <div class="modal fade" id="modalAgregarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreCliente">Nombre</label>
              <input type="text"class="form-control" id="nombreCliente" name="nombreCliente" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionCliente">Descripcion</label>
              <textarea class="form-control" id="descripcionCliente" name="descripcionCliente" required></textarea>
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