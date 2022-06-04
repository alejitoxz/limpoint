<?php
    require '../../modelo/modelo_miscelaneos.php';

    $MU = new modelo_miscelaneos();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->editar_miscelaneos($id,$descripcion);
    echo $consulta;