<?php
    require '../../modelo/modelo_tecnico.php';

    $MU = new modelo_tecnico();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_tecnico($id,$estatus);
    echo $consulta;