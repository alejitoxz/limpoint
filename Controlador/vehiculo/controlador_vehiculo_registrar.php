<?php
    require '../../modelo/modelo_vehiculo.php';

    $MU = new modelo_vehiculo();

    $txt_interno        = htmlspecialchars($_POST['txt_interno'],ENT_QUOTES,'UTF-8');
    $txt_placa          = htmlspecialchars($_POST['txt_placa'],ENT_QUOTES,'UTF-8');
    $txt_marca          = htmlspecialchars($_POST['txt_marca'],ENT_QUOTES,'UTF-8');
    $txt_modelo         = htmlspecialchars($_POST['txt_modelo'],ENT_QUOTES,'UTF-8');

    $txt_chasis         = htmlspecialchars($_POST['txt_chasis'],ENT_QUOTES,'UTF-8');
    $txt_pasajeros      = htmlspecialchars($_POST['txt_pasajeros'],ENT_QUOTES,'UTF-8');
    $sel_empresa        = htmlspecialchars($_POST['sel_empresa'],ENT_QUOTES,'UTF-8');
    $sel_pro_vehiculo   = htmlspecialchars($_POST['sel_pro_vehiculo'],ENT_QUOTES,'UTF-8');

    $txt_soat           = htmlspecialchars($_POST['txt_soat'],ENT_QUOTES,'UTF-8');
    $txt_tecnomecanica  = htmlspecialchars($_POST['txt_tecnomecanica'],ENT_QUOTES,'UTF-8');
    $txt_poliza_cont    = htmlspecialchars($_POST['txt_poliza_cont'],ENT_QUOTES,'UTF-8');
    $txt_poliza_ext     = htmlspecialchars($_POST['txt_poliza_ext'],ENT_QUOTES,'UTF-8');

    $venc_soat          = htmlspecialchars($_POST['venc_soat'],ENT_QUOTES,'UTF-8');
    $venc_tecno         = htmlspecialchars($_POST['venc_tecno'],ENT_QUOTES,'UTF-8');
    $venc_poliza_cont   = htmlspecialchars($_POST['venc_poliza_cont'],ENT_QUOTES,'UTF-8');
    $venc_poliza_ext    = htmlspecialchars($_POST['venc_poliza_ext'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->registrar_vehiculo(
        $txt_interno,$txt_placa,$txt_marca,$txt_modelo,
        $txt_chasis,$txt_pasajeros,$sel_empresa,$sel_pro_vehiculo,
        $txt_soat,$txt_tecnomecanica,$txt_poliza_cont,$txt_poliza_ext,
        $venc_soat,$venc_tecno,$venc_poliza_cont,$venc_poliza_ext
    );
    echo $consulta;