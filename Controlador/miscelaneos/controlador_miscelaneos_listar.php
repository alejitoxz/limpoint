<?php
    require '../../modelo/modelo_miscelaneos.php';

    $MU = new modelo_miscelaneos();
    $consulta = $MU->listar_miscelaneos();
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
