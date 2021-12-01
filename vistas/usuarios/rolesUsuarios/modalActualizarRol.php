
<!-- Modal -->
<form id="frmEditarRol" method="POST" onsubmit="return editarRol()">
  <div class="modal fade" id="modalEditarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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
        <input type="text" id="idRol" name="idRol" hidden>
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreRolu">Nombre</label>
              <input type="text"class="form-control" id="nombreRolu" name="nombreRolu" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionRolu">Descripcion</label>
              <textarea class="form-control" id="descripcionRolu" name="descripcionRolu"required></textarea>
            </div>
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