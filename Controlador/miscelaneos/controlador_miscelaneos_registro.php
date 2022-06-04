<?php
    require '../../modelo/modelo_miscelaneos.php';

    $MU = new modelo_miscelaneos();
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->registrar_miscelaneos($descripcion);
    echo $consulta;