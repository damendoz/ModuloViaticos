<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
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
              <h1 class="fw-light">Solicitud de Relacion de Gastos</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#">
                  Solicitar Relacion de Gastos
                </button>
                <div id="tablaRelacionLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "usuarios/modalRelacionGastos.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/usuarios.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>