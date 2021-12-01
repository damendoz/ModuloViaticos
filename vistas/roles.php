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
              <h1 class="fw-light">Administrar roles de usuarios</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRoles">
                <span class="fas fa-users"></span> Añadir rol
                </button>
                <div id="tablaRolesUsuariosLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php 
  include "usuarios/rolesUsuarios/modalAgregarRol.php";
  include "usuarios/rolesUsuarios/modalActualizarRol.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/rolesUsuarios.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>