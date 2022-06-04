<?php
    require '../../modelo/modelo_miscelaneos_detalle.php';

    $MU = new modelo_miscelaneos_detalle();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $categoria_miscelaneo = htmlspecialchars($_POST['categoria_miscelaneo'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->editar_miscelaneos_detalle($id,$descripcion,$categoria_miscelaneo);
    echo $consulta;