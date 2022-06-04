<?php
    require '../../modelo/modelo_vehiculo.php';

    $MU = new modelo_vehiculo();

    $id    = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->odometro($id);
    if($consulta){
        echo json_encode($consulta);
    }else {
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }