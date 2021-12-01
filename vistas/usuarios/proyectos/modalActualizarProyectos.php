
<!-- Modal -->
<form id="frmEditarProyecto" method="POST" onsubmit="return editarProyectos()">
  <div class="modal fade" id="modalEditarProyectos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
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
            <input type="text" id="idProyecto" name="idProyecto" hidden>
          <div class="row">
            <div class="col-sm-6">
              <label for="nombreProyectou">Nombre</label>
              <input type="text"class="form-control" id="nombreProyectou" name="nombreProyectou" required>
            </div>
            <div class="col-sm-6">
              <label for="descripcionProyectou">Descripcion</label>
              <textarea class="form-control" id="descripcionProyectou" name="descripcionProyectou" required></textarea>
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