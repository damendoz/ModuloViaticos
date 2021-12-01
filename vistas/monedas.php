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
              <h1 class="fw-light">Monedas</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                  <i class="fas fa-donate"></i>
                  Agregar monedas
                </button>
                <div id=""></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/usuarios.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>