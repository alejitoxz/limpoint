<?php
    require '../../modelo/modelo_usuario.php';
    if($_POST['clave'] != '' || $_POST['clave'] != NULL){
        $pass = password_hash($_POST['clave'],PASSWORD_DEFAULT,['cost'=>10]);
    }else{
        $pass = "ERROR";
    }
    $MU = new modelo_usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'],ENT_QUOTES,'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $clave = $pass;
    $tipoRol = htmlspecialchars($_POST['tipoRol'],ENT_QUOTES,'UTF-8');
    $punto = htmlspecialchars($_POST['punto'],ENT_QUOTES,'UTF-8');
    $idPersona = htmlspecialchars($_POST['idPersona'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_datos_usuario($id,$nombre,$apellido,$telefono,$email,$usuario,$clave,$tipoRol,$idPersona,$punto);
    echo $consulta;