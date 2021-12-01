<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 3){
      include "../clases/conexion.php";
      $con = new conexion();
      $conexion = $con->conectar();
?>

    <!-- Page Content -->
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
            <div>
              <button type="button" class="close">
                <a href="inicio.php">
                  <i class="fas fa-times">        
                  </i>
                </a>
              </button>
            </div>
              <h1 class="fw-light">Solicitud de Anticipo</h1>
              <hr>
              <p class="lead">
            <!--    <button class="btn btn-primary" 
                data-toggle="modal" 
                data-target="#modalSolicitarAnticipoSupervisor">
                Solicitar Anticipo
                </button> -->
                <div id="tablaAnticipoSupervisorLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "anticiposSupervisor/modalValidarAnticipoSupervisor.php";
  include "anticiposSupervisor/modalAnticipoSupervisor.php";
  include "footer.php"; 
?>
  <script src="../public/js/anticiposSupervisor/anticiposSupervisor.js"></script>

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