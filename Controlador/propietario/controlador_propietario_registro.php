<?php
    require '../../modelo/modelo_propietario.php';

    $MU = new modelo_propietario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'],ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $placa = htmlspecialchars($_POST['placa'],ENT_QUOTES,'UTF-8');
    $tipoVehiculo = htmlspecialchars($_POST['tipoVehiculo'],ENT_QUOTES,'UTF-8');
    $alianza = htmlspecialchars($_POST['alianza'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->registrar_propietario($id,$nombre,$apellido,$telefono,$email,$placa,$tipoVehiculo,$alianza);
    echo $consulta;
