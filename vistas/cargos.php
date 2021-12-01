<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
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
              <h1 class="fw-light">Administrar cargos</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCargos">
                <span class="fas fa-user-tag"></span> Añadir Cargo
                </button>
                <div id="tablaCargosLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php
  include "usuarios/cargos/modalActualizarCargos.php";
  include "usuarios/cargos/modalAgregarCargo.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/cargos.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>