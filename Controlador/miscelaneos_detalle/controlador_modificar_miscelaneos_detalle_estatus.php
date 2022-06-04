<?php
    require '../../modelo/modelo_miscelaneos_detalle.php';

    $MU = new modelo_miscelaneos_detalle();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_estatus_miscelaneos_detalle($id,$estatus);
    echo $consulta;