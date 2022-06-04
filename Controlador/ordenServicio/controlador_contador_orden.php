<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $inicioDate = htmlspecialchars($_POST['inicioDate'],ENT_QUOTES,'UTF-8');
    $finDate = htmlspecialchars($_POST['finDate'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->contador_orden($inicioDate,$finDate);
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
