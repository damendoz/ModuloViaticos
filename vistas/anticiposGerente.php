<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4){
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
              <h1 class="fw-light">Gestion de Anticipos</h1>
              <hr>
              <p class="lead">
                <div id="tablaAnticipoGerenteLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "anticiposGerente/modalValidarAnticipoGerente.php";
  include "footer.php"; 
?>
  <script src="../public/js/anticiposGerente/anticiposGerente.js"></script>

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