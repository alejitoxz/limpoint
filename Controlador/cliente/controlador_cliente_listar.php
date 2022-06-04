<?php
    require '../../modelo/modelo_cliente.php';

    $MU = new modelo_cliente();
    $consulta = $MU->listar_cliente();
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
