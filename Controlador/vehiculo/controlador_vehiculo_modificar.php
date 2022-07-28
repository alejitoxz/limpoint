<?php
    require '../../modelo/modelo_vehiculo.php';

    $MU = new modelo_vehiculo();
    $id        = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $placa          = htmlspecialchars($_POST['placa'],ENT_QUOTES,'UTF-8');
    $marca          = htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
    $tipoVehiculo         = htmlspecialchars($_POST['tipoVehiculo'],ENT_QUOTES,'UTF-8');
    $alianza    = htmlspecialchars($_POST['alianza'],ENT_QUOTES,'UTF-8');
    $idPropietario    = htmlspecialchars($_POST['idPropietario'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->editar_vehiculo($id,$placa,$marca,$tipoVehiculo,$alianza,$idPropietario
    );
    echo $consulta;