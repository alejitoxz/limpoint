<?php
    require '../../modelo/modelo_home.php';

    $MU = new modelo_home();
    $consulta = $MU->listar_grafico_llanta();
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
