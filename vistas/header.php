<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" type="text/css" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="icon" href="../public/img/icon.ico">
	<title>Modulo de Viaticos ITBC Group</title>
</head>    
<body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
          <div class="container">
          <a href="inicio.php">
            <img src="../public/img/prueba.jpg"
					  data-ll-status="loaded" alt="Logo ITBC" title="Logo ITBC" class="navbar-brand">
          </a>
            <a class="navbar-brand" href="inicio.php">
              ITBC de Venezuela
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="inicio.php">
                  <span class="fas fa-home"></span> Inicio
                </a>
                </li>
                <!-- view user-->
                <?php if ($_SESSION['usuario']['rol'] == 1) { ?>
                  <li class="nav-item">
                        <a class="nav-link" href="anticipos.php">
                        <span class="fas fa-file-alt"></span>  Anticipos
                        </a>
                  </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="relacionGastos.php">
                        <span class="fas fa-balance-scale"></span> Relacion de Gastos</a>
                      </li>
                <!--<li class="nav-item">
                  <a class="nav-link" href="anticiposRelacion.php">Anticipos pendientes por relacionar</a>
                </li>-->
                 <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>
                  <!-- view adm-->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                  data-toggle="dropdown" aria-expanded="false">
                    <span class="fas fa-user"></span> Usuarios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="usuarios.php">
                      <span class="fas fa-user-cog"></span> 
                      Administrar
                    </a>
                    <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="roles.php">
                        <span class="fas fa-users"></span>
                        Añadir rol
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="clientes.php">
                        <span class="fas fa-user-tie"></span>
                        Añadir clientes
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="proyectos.php">
                        <span class="fas fa-chalkboard-teacher"></span>
                        Añadir proyectos
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="cargos.php">
                        <span class="fas fa-user-tag"></span>
                        Añadir cargos
                      </a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="politicaViaticos.php">
                  <span class="fas fa-gavel"></span> 
                  Politicas de Viaticos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="monedas.php">
                  <span class="fas fa-coins"></span> 
                  Monedas
                  </a>
                </li>
                 <?php } else if($_SESSION['usuario']['rol'] == 3) { ?>
                  <!-- view superviser-->
                  <li class="nav-item">
                        <a class="nav-link" href="anticiposSupervisor.php">
                        <span class="fas fa-file-alt"></span>  Anticipos
                        </a>
                  </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="relacionGastosSupervisor.php">
                        <span class="fas fa-balance-scale"></span> Relacion de Gastos</a>
                      </li>
                <?php } else if($_SESSION['usuario']['rol'] == 4) { ?>
                  <!-- view superviser-->
                  <li class="nav-item">
                        <a class="nav-link" href="anticiposGerente.php">
                        <span class="fas fa-file-alt"></span>  Anticipos
                        </a>
                  </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="relacionGastosGerente.php">
                        <span class="fas fa-balance-scale"></span> Relacion de Gastos</a>
                      </li>
                      <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                        data-toggle="dropdown" aria-expanded="false">
                    <span class="fas fa-user-check"></span> <?php echo $_SESSION['usuario']['nombre']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                           <span class="fas fa-user-edit"></span> Editar datos
                          </a> 
                            <div class="dropdown-divider"></div> 
                            <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                            <span class="fas fa-sign-out-alt"></span> Salir</a>
                        </div>
                    </li>
                </ul>
              </div>
          </div>
        </nav>