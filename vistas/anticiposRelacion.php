<?php 
  include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 3) {
?>

    <!-- Page Content -->
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
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