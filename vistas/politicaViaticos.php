<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

    <!-- Page Content -->
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
              <h1 class="fw-light">Politicas de Viaticos</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                Agregar politica de Viaticos
                </button>
                <div id="tablaPoliticasViaticosLoad"></div>
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