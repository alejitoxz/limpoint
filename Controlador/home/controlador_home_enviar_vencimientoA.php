<?php
    require '../../modelo/modelo_home.php';
    

    $MU = new modelo_home();


    $datosVen = $MU->listar_home();
    $consulta = $MU->enviarVencimientoA($datosVen); 
    
    if($consulta){
        return 1;
    }else {
        return 0;
    }

