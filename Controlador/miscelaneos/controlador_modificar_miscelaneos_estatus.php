<?php
    require '../../modelo/modelo_miscelaneos.php';

    $MU = new modelo_miscelaneos();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_estatus_miscelaneos($id,$estatus);
    echo $consulta;