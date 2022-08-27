<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new modelo_usuario();

    $consulta = $MU->listar_punto();
    echo json_encode($consulta);