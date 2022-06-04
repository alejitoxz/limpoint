<?php
    require '../../modelo/modelo_propietario.php';

    $MU = new modelo_propietario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'],ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $idPersona = htmlspecialchars($_POST['idPersona'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_datos_propietario($id,$nombre,$apellido,$telefono,$email,$idPersona);
    echo $consulta;