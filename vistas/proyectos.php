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
              <h1 class="fw-light">Administrar proyectos</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProyectos">
                <span class="fas fa-chalkboard-teacher"></span> Añadir cliente
                </button>
                <div id="tablaProyectosLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php
  include "usuarios/proyectos/modalActualizarProyectos.php";
  include "usuarios/proyectos/modalAgregarProyecto.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/proyectos.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>