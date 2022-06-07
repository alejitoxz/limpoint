<?php
    require '../../modelo/modelo_vehiculo.php';

    $MU = new modelo_vehiculo();

    $txt_placa= htmlspecialchars($_POST['txt_placa'],ENT_QUOTES,'UTF-8');
    $sel_tipoVehiculo= htmlspecialchars($_POST['sel_tipoVehiculo'],ENT_QUOTES,'UTF-8');
    $sel_alianza= htmlspecialchars($_POST['sel_alianza'],ENT_QUOTES,'UTF-8');
    $sel_pro_vehiculo= htmlspecialchars($_POST['sel_pro_vehiculo'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->registrar_vehiculo(
        $txt_placa,$sel_tipoVehiculo,$sel_alianza,$sel_pro_vehiculo
    );
    echo $consulta;