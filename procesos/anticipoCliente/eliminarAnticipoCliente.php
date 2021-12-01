<?php

    $idViatico = $_POST['idViatico'];
    
    include "../../clases/anticipos.php";
    $anticipos = new Anticipos();
    echo $anticipos->eliminarAnticipoCliente($idViatico);