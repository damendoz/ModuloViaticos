<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1){
      include "../clases/conexion.php";
      $con = new conexion();
      $conexion = $con->conectar();
?>

    <!-- Page Content -->
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
              <h1 class="fw-light">Solicitud de Anticipo</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" 
                data-toggle="modal" 
                data-target="#modalSolicitarAnticipo">
                Solicitar Anticipo
                </button>
                <div id="tablaAnticipoClienteLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "usuarios/anticipo/modalAnticipo.php";
  include "footer.php"; 
?>
  <script src="../public/js/anticiposCliente/anticiposCliente.js"></script>

<?php
  } else {
      header("location:../index.html");
  }
?>

<script>
	$(document).ready(function(){
		$('#tablaUsuariosDataTable').DataTable();
	});
</script>