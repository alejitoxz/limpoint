<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $consulta = $MU->listar_tipo_aceite();
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
