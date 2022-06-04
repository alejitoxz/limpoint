<?php
    require '../../modelo/modelo_miscelaneos_detalle.php';

    $MU = new modelo_miscelaneos_detalle();
    $descripcion_detalle = htmlspecialchars($_POST['descripcion_detalle'],ENT_QUOTES,'UTF-8');
    $categoria_miscelaneo = htmlspecialchars($_POST['categoria_miscelaneo'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->registrar_miscelaneos_detalle($descripcion_detalle,$categoria_miscelaneo);
    echo $consulta;