<?php
    require '../../modelo/modelo_tecnico.php';

    $MU = new modelo_tecnico();
    $consulta = $MU->listar_tecnico();
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
