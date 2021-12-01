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
              <h1 class="fw-light">Administrar clientes</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClientes">
                <span class="fas fa-user-tie"></span> Añadir cliente
                </button>
                <div id="tablaClientesLoad"></div>
              </p>
            </div>
          </div>
        </div>
            
<?php
  include "usuarios/clientes/modalActualizarCliente.php";
  include "usuarios/clientes/modalAgregarCliente.php";
  include "footer.php"; 
?>
  <script src="../public/js/usuarios/clientes.js"></script>

<?php 
  } else {
      header("location:../index.html");
  }
?>