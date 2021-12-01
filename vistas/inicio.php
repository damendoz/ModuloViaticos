<?php 
  include "header.php"; 
  if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] > 1 || $_SESSION['usuario']['rol'] > 1) {
      
?>

    <!-- Page Content -->
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
              <h1 class="fw-light">Inicio</h1>
              <hr>
              <?php
              include "../clases/conexion.php";
              $con = new Conexion();
              $conexion = $con->conectar();
                  $idUsuario = $_SESSION['usuario']['id'];
                  $sql = "SELECT
                  persona.paterno AS paterno,
                  persona.nombre AS nombre
                  FROM
                    t_persona AS persona
                        INNER JOIN
                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                  WHERE
                    persona.id_persona = '$idUsuario'";
                        $respuesta = mysqli_query($conexion, $sql);
                ?>
                <?php while($mostrar = mysqli_fetch_array($respuesta)) {?>
              <p class="lead">
              Bienvenido! <?php echo $mostrar['paterno']; ?> <?php echo $mostrar['nombre']; ?>
              </p>
              <?php } ?>
            </div>
          </div>
        </div>
            
<?php 
  include "footer.php"; 
  } else {
      header("location:../index.html");
  }
?>