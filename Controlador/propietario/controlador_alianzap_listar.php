<?php
    require '../../modelo/modelo_propietario.php';

    $MU = new modelo_propietario();
    $consulta = $MU->listar_alianzap();
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
