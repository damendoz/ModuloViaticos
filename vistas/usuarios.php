<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
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
              <h1 class="fw-light">Administrar usuarios</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                <span class="fas fa-user-plus"></span> Agregar usuario
                </button>
                <div id="tablaUsuariosLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "usuarios/modalAgregar.php";
  include "usuarios/modalResetPassword.php";
  include "usuarios/modalActualizar.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/usuarios.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>