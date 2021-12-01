
<!-- Modal -->
<form id="frmAgregarProyecto" method="POST" onsubmit="return agregaNuevoProyecto()">
  <div class="modal fade" id="modalAgregarProyectos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo proyecto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreProyecto">Nombre</label>
              <input type="text"class="form-control" id="nombreProyecto" name="nombreProyecto" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionProyecto">Descripcion</label>
              <textarea class="form-control" id="descripcionProyecto" name="descripcionProyecto" required></textarea>
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