
<!-- Modal -->
<form id="frmEditarClientes" method="POST" onsubmit="return editarClientes()">
  <div class="modal fade" id="modalEditarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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
        <input type="text" id="idCliente" name="idCliente" hidden>
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreClienteu">Nombre</label>
              <input type="text"class="form-control" id="nombreClienteu" name="nombreClienteu" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionClienteu">Descripcion</label>
              <textarea class="form-control" id="descripcionClienteu" name="descripcionClienteu" required></textarea>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
          <button class="btn btn-warning">actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>