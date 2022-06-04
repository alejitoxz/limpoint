<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $listado = $MU->listar_orden();
    $pdf = $MU->VencimientoPDF($listado['data']);