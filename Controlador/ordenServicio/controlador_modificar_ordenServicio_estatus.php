<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_ordenServicio($id,$estatus);
    echo $consulta;