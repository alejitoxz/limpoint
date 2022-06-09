<?php
    require '../../modelo/modelo_home.php';

    $MU = new modelo_home();
    $consulta = $MU->contador_recaudoTotal();
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
