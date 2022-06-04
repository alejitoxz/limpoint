<?php
    require '../../modelo/modelo_miscelaneos_detalle.php';

    $MU = new modelo_miscelaneos_detalle();
    $consulta = $MU->listar_miscelaneos_detalle();
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
