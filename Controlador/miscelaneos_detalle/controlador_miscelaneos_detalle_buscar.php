<?php
    require '../../modelo/modelo_miscelaneos_detalle.php';

    $MU = new modelo_miscelaneos_detalle();
    $descripcion     = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->buscar_miscelaneos_detalle($descripcion);
    if($consulta){
        echo json_encode($consulta);
    }else {
        echo 0;
    }
