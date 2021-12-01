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
              <h1 class="fw-light">Relacion de Anticipos</h1>
              <hr>
              <p class="lead">
                <button class="btn btn-primary">
                  Relacionar anticipos
                </button></p>
            </div>
          </div>
        </div>
            
<?php 
  include "footer.php";
  } else {
      header("location:../index.html");
  }
?>