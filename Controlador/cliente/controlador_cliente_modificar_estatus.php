<?php
    require '../../modelo/modelo_cliente.php';

    $MU = new modelo_cliente();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_estatus_cliente($id,$estatus);
    echo $consulta;