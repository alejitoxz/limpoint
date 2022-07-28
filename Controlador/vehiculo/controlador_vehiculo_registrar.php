<?php
    require '../../modelo/modelo_vehiculo.php';

    $MU = new modelo_vehiculo();

    $placa= htmlspecialchars($_POST['placa'],ENT_QUOTES,'UTF-8');
    $tipoVehiculo= htmlspecialchars($_POST['tipoVehiculo'],ENT_QUOTES,'UTF-8');
    $alianza= htmlspecialchars($_POST['alianza'],ENT_QUOTES,'UTF-8');
    $pro_vehiculo= htmlspecialchars($_POST['pro_vehiculo'],ENT_QUOTES,'UTF-8');
    $marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->registrar_vehiculo(
        $placa,$tipoVehiculo,$alianza,$pro_vehiculo,$marca
    );
    echo $consulta;