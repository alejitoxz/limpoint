<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $idOrdenServicio = htmlspecialchars($_POST['idOrdenServicio'],ENT_QUOTES,'UTF-8');
    $idServicio = htmlspecialchars($_POST['idServicio'],ENT_QUOTES,'UTF-8');
    $placa = htmlspecialchars($_POST['placa'],ENT_QUOTES,'UTF-8');
    $revBimCotrautol = htmlspecialchars($_POST['revBimCotrautol'],ENT_QUOTES,'UTF-8');
    $rRegistradora = htmlspecialchars($_POST['rRegistradora'],ENT_QUOTES,'UTF-8');
    $kmGps = htmlspecialchars($_POST['kmGps'],ENT_QUOTES,'UTF-8');
    $vExtintor = htmlspecialchars($_POST['vExtintor'],ENT_QUOTES,'UTF-8');
    $oReg = htmlspecialchars($_POST['oReg'],ENT_QUOTES,'UTF-8');
    $observacion = htmlspecialchars($_POST['observacion'],ENT_QUOTES,'UTF-8');
    $tecnico = htmlspecialchars($_POST['tecnico'],ENT_QUOTES,'UTF-8');
    $bateria = htmlspecialchars($_POST['bateria'],ENT_QUOTES,'UTF-8');
    $tipoBateria = htmlspecialchars($_POST['tipoBateria'],ENT_QUOTES,'UTF-8');
    $marca = htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
    $serial = htmlspecialchars($_POST['serial'],ENT_QUOTES,'UTF-8');
    $fVenta = htmlspecialchars($_POST['fVenta'],ENT_QUOTES,'UTF-8');
    $fInstalacion = htmlspecialchars($_POST['fInstalacion'],ENT_QUOTES,'UTF-8');
    $tUso = htmlspecialchars($_POST['tUso'],ENT_QUOTES,'UTF-8');
    $pCambio = htmlspecialchars($_POST['pCambio'],ENT_QUOTES,'UTF-8');
    $pMantenimiento = htmlspecialchars($_POST['pMantenimiento'],ENT_QUOTES,'UTF-8');
    $oMejora = htmlspecialchars($_POST['oMejora'],ENT_QUOTES,'UTF-8');
    $llantaSerial1 = htmlspecialchars($_POST['llantaSerial1'],ENT_QUOTES,'UTF-8');
    $profundidad1 = htmlspecialchars($_POST['profundidad1'],ENT_QUOTES,'UTF-8');
    $opmarca1 = htmlspecialchars($_POST['opmarca1'],ENT_QUOTES,'UTF-8');
    $tipoMarca1 = htmlspecialchars($_POST['tipoMarca1'],ENT_QUOTES,'UTF-8');
    $estado1 = htmlspecialchars($_POST['estado1'],ENT_QUOTES,'UTF-8');
    $fInstalacion1 = htmlspecialchars($_POST['fInstalacion1'],ENT_QUOTES,'UTF-8');

    $fReencauche1 = htmlspecialchars($_POST['fReencauche1'],ENT_QUOTES,'UTF-8');
    $fCambio1 = htmlspecialchars($_POST['fCambio1'],ENT_QUOTES,'UTF-8');
    $fRotacion1 = htmlspecialchars($_POST['fRotacion1'],ENT_QUOTES,'UTF-8');
    $llantaSerial2 = htmlspecialchars($_POST['llantaSerial2'],ENT_QUOTES,'UTF-8');
    $profundidad2 = htmlspecialchars($_POST['profundidad2'],ENT_QUOTES,'UTF-8');
    $opmarca2 = htmlspecialchars($_POST['opmarca2'],ENT_QUOTES,'UTF-8');
    $tipoMarca2 = htmlspecialchars($_POST['tipoMarca2'],ENT_QUOTES,'UTF-8');
    $estado2 = htmlspecialchars($_POST['estado2'],ENT_QUOTES,'UTF-8');
    $fInstalacion2 = htmlspecialchars($_POST['fInstalacion2'],ENT_QUOTES,'UTF-8');
    $fReencauche2 = htmlspecialchars($_POST['fReencauche2'],ENT_QUOTES,'UTF-8');
    $fCambio2 = htmlspecialchars($_POST['fCambio2'],ENT_QUOTES,'UTF-8');
    $fRotacion2 = htmlspecialchars($_POST['fRotacion2'],ENT_QUOTES,'UTF-8');

    $llantaSerial3 = htmlspecialchars($_POST['llantaSerial3'],ENT_QUOTES,'UTF-8');
    $profundidad3 = htmlspecialchars($_POST['profundidad3'],ENT_QUOTES,'UTF-8');
    $opmarca3 = htmlspecialchars($_POST['opmarca3'],ENT_QUOTES,'UTF-8');
    $tipoMarca3 = htmlspecialchars($_POST['tipoMarca3'],ENT_QUOTES,'UTF-8');
    $estado3 = htmlspecialchars($_POST['estado3'],ENT_QUOTES,'UTF-8');
    $fInstalacion3 = htmlspecialchars($_POST['fInstalacion3'],ENT_QUOTES,'UTF-8');
    $fReencauche3 = htmlspecialchars($_POST['fReencauche3'],ENT_QUOTES,'UTF-8');
    $fCambio3 = htmlspecialchars($_POST['fCambio3'],ENT_QUOTES,'UTF-8');
    $fRotacion3 = htmlspecialchars($_POST['fRotacion3'],ENT_QUOTES,'UTF-8');
    $llantaSerial4 = htmlspecialchars($_POST['llantaSerial4'],ENT_QUOTES,'UTF-8');

    $profundidad4 = htmlspecialchars($_POST['profundidad4'],ENT_QUOTES,'UTF-8');
    $opmarca4 = htmlspecialchars($_POST['opmarca4'],ENT_QUOTES,'UTF-8');
    $tipoMarca4 = htmlspecialchars($_POST['tipoMarca4'],ENT_QUOTES,'UTF-8');
    $estado4 = htmlspecialchars($_POST['estado4'],ENT_QUOTES,'UTF-8');
    $fInstalacion4 = htmlspecialchars($_POST['fInstalacion4'],ENT_QUOTES,'UTF-8');
    $fReencauche4 = htmlspecialchars($_POST['fReencauche4'],ENT_QUOTES,'UTF-8');
    $fCambio4 = htmlspecialchars($_POST['fCambio4'],ENT_QUOTES,'UTF-8');
    $fRotacion4 = htmlspecialchars($_POST['fRotacion4'],ENT_QUOTES,'UTF-8');
    $llantaSerial5 = htmlspecialchars($_POST['llantaSerial5'],ENT_QUOTES,'UTF-8');
    $profundidad5 = htmlspecialchars($_POST['profundidad5'],ENT_QUOTES,'UTF-8');
    $opmarca5 = htmlspecialchars($_POST['opmarca5'],ENT_QUOTES,'UTF-8');
    $tipoMarca5 = htmlspecialchars($_POST['tipoMarca5'],ENT_QUOTES,'UTF-8');
    $estado5 = htmlspecialchars($_POST['estado5'],ENT_QUOTES,'UTF-8');
    $fInstalacion5 = htmlspecialchars($_POST['fInstalacion5'],ENT_QUOTES,'UTF-8');
    $fReencauche5 = htmlspecialchars($_POST['fReencauche5'],ENT_QUOTES,'UTF-8');
    $fCambio5 = htmlspecialchars($_POST['fCambio5'],ENT_QUOTES,'UTF-8');
    $fRotacion5 = htmlspecialchars($_POST['fRotacion5'],ENT_QUOTES,'UTF-8');
    $llantaSerial6 = htmlspecialchars($_POST['llantaSerial6'],ENT_QUOTES,'UTF-8');
    $profundidad6 = htmlspecialchars($_POST['profundidad6'],ENT_QUOTES,'UTF-8');
    $opmarca6 = htmlspecialchars($_POST['opmarca6'],ENT_QUOTES,'UTF-8');
    $tipoMarca6 = htmlspecialchars($_POST['tipoMarca6'],ENT_QUOTES,'UTF-8');
    $estado6 = htmlspecialchars($_POST['estado6'],ENT_QUOTES,'UTF-8');
    $fInstalacion6 = htmlspecialchars($_POST['fInstalacion6'],ENT_QUOTES,'UTF-8');
    $fReencauche6 = htmlspecialchars($_POST['fReencauche6'],ENT_QUOTES,'UTF-8');
    $fCambio6 = htmlspecialchars($_POST['fCambio6'],ENT_QUOTES,'UTF-8');
    $fRotacion6 = htmlspecialchars($_POST['fRotacion6'],ENT_QUOTES,'UTF-8');
    $calibracion1 = htmlspecialchars($_POST['calibracion1'],ENT_QUOTES,'UTF-8');
    $calibracion2 = htmlspecialchars($_POST['calibracion2'],ENT_QUOTES,'UTF-8');
    $calibracion3 = htmlspecialchars($_POST['calibracion3'],ENT_QUOTES,'UTF-8');
    $calibracion4 = htmlspecialchars($_POST['calibracion4'],ENT_QUOTES,'UTF-8');
    $calibracion5 = htmlspecialchars($_POST['calibracion5'],ENT_QUOTES,'UTF-8');
    $calibracion6 = htmlspecialchars($_POST['calibracion6'],ENT_QUOTES,'UTF-8');
    $oCalibracion = htmlspecialchars($_POST['oCalibracion'],ENT_QUOTES,'UTF-8');
    $balanceo1 = htmlspecialchars($_POST['balanceo1'],ENT_QUOTES,'UTF-8');
    $balanceo2 = htmlspecialchars($_POST['balanceo2'],ENT_QUOTES,'UTF-8');
    $balanceo3 = htmlspecialchars($_POST['balanceo3'],ENT_QUOTES,'UTF-8');
    $balanceo4 = htmlspecialchars($_POST['balanceo4'],ENT_QUOTES,'UTF-8');
    $balanceo5 = htmlspecialchars($_POST['balanceo5'],ENT_QUOTES,'UTF-8');
    $balanceo6 = htmlspecialchars($_POST['balanceo6'],ENT_QUOTES,'UTF-8');
    $oBalanceo = htmlspecialchars($_POST['oBalanceo'],ENT_QUOTES,'UTF-8');
    $alineacion1 = htmlspecialchars($_POST['alineacion1'],ENT_QUOTES,'UTF-8');
    $alineacion2 = htmlspecialchars($_POST['alineacion2'],ENT_QUOTES,'UTF-8');
    $observacionG3 = htmlspecialchars($_POST['observacionG3'],ENT_QUOTES,'UTF-8');
    $observacionM3 = htmlspecialchars($_POST['observacionM3'],ENT_QUOTES,'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'],ENT_QUOTES,'UTF-8');
    $pCambioA = htmlspecialchars($_POST['pCambioA'],ENT_QUOTES,'UTF-8');
    $kilometraje = htmlspecialchars($_POST['kilometraje'],ENT_QUOTES,'UTF-8');
    $cKilometraje = htmlspecialchars($_POST['cKilometraje'],ENT_QUOTES,'UTF-8');
    $tipoAceite = htmlspecialchars($_POST['tipoAceite'],ENT_QUOTES,'UTF-8');
    $marca10 = htmlspecialchars($_POST['marca10'],ENT_QUOTES,'UTF-8');
    $cantidad1 = htmlspecialchars($_POST['cantidad1'],ENT_QUOTES,'UTF-8');
    $presentacion1 = htmlspecialchars($_POST['presentacion1'],ENT_QUOTES,'UTF-8');
    $nivelacion = htmlspecialchars($_POST['nivelacion'],ENT_QUOTES,'UTF-8');
    $cNivelacion = htmlspecialchars($_POST['cNivelacion'],ENT_QUOTES,'UTF-8');
    $fAceite = htmlspecialchars($_POST['fAceite'],ENT_QUOTES,'UTF-8');
    $fCombustible = htmlspecialchars($_POST['fCombustible'],ENT_QUOTES,'UTF-8');
    $fAire = htmlspecialchars($_POST['fAire'],ENT_QUOTES,'UTF-8');
    $tipoAceite1 = htmlspecialchars($_POST['tipoAceite1'],ENT_QUOTES,'UTF-8');
    $marca1 = htmlspecialchars($_POST['marca1'],ENT_QUOTES,'UTF-8');
    $uCambio = htmlspecialchars($_POST['uCambio'],ENT_QUOTES,'UTF-8');
    $pCambio10 = htmlspecialchars($_POST['pCambio10'],ENT_QUOTES,'UTF-8');
    $cantidad2 = htmlspecialchars($_POST['cantidad2'],ENT_QUOTES,'UTF-8');
    $presentacion2 = htmlspecialchars($_POST['presentacion2'],ENT_QUOTES,'UTF-8');
    $nivelacion2 = htmlspecialchars($_POST['nivelacion2'],ENT_QUOTES,'UTF-8');
    $cNivelacion2 = htmlspecialchars($_POST['cNivelacion2'],ENT_QUOTES,'UTF-8');
    $tipoAceite3 = htmlspecialchars($_POST['tipoAceite3'],ENT_QUOTES,'UTF-8');
    $marca3 = htmlspecialchars($_POST['marca3'],ENT_QUOTES,'UTF-8');
    $uCambio3 = htmlspecialchars($_POST['uCambio3'],ENT_QUOTES,'UTF-8');
    $pCambio3 = htmlspecialchars($_POST['pCambio3'],ENT_QUOTES,'UTF-8');
    $cantidad3 = htmlspecialchars($_POST['cantidad3'],ENT_QUOTES,'UTF-8');
    $presentacion3 = htmlspecialchars($_POST['presentacion3'],ENT_QUOTES,'UTF-8');
    $nivelacion3 = htmlspecialchars($_POST['nivelacion3'],ENT_QUOTES,'UTF-8');
    $cNivelacion3 = htmlspecialchars($_POST['cNivelacion3'],ENT_QUOTES,'UTF-8');
    $tipoAceite4 = htmlspecialchars($_POST['tipoAceite4'],ENT_QUOTES,'UTF-8');
    $marca4 = htmlspecialchars($_POST['marca4'],ENT_QUOTES,'UTF-8');
    $uCambio4 = htmlspecialchars($_POST['uCambio4'],ENT_QUOTES,'UTF-8');
    $pCambio4 = htmlspecialchars($_POST['pCambio4'],ENT_QUOTES,'UTF-8');
    $tipoAceite5 = htmlspecialchars($_POST['tipoAceite5'],ENT_QUOTES,'UTF-8');
    $marca5 = htmlspecialchars($_POST['marca5'],ENT_QUOTES,'UTF-8');
    $uCambio5 = htmlspecialchars($_POST['uCambio5'],ENT_QUOTES,'UTF-8');
    $pCambio5 = htmlspecialchars($_POST['pCambio5'],ENT_QUOTES,'UTF-8');
    $lFreno = htmlspecialchars($_POST['lFreno'],ENT_QUOTES,'UTF-8');
    $lParabrisa = htmlspecialchars($_POST['lParabrisa'],ENT_QUOTES,'UTF-8');
    $refrigerante = htmlspecialchars($_POST['refrigerante'],ENT_QUOTES,'UTF-8');
    $hidraulico = htmlspecialchars($_POST['hidraulico'],ENT_QUOTES,'UTF-8');
    $lMotor = htmlspecialchars($_POST['lMotor'],ENT_QUOTES,'UTF-8');
    $lCaja = htmlspecialchars($_POST['lCaja'],ENT_QUOTES,'UTF-8');
    $lTransmision = htmlspecialchars($_POST['lTransmision'],ENT_QUOTES,'UTF-8');
    $lFrenos1 = htmlspecialchars($_POST['lFrenos1'],ENT_QUOTES,'UTF-8');
    $engrase = htmlspecialchars($_POST['engrase'],ENT_QUOTES,'UTF-8');
    $sRadiador = htmlspecialchars($_POST['sRadiador'],ENT_QUOTES,'UTF-8');
    $sFiltroAire = htmlspecialchars($_POST['sFiltroAire'],ENT_QUOTES,'UTF-8');
    $observacionesF = htmlspecialchars($_POST['observacionesF'],ENT_QUOTES,'UTF-8');
    $fCombustible2 = htmlspecialchars($_POST['fCombustible2'],ENT_QUOTES,'UTF-8');
    $fCombustible3 = htmlspecialchars($_POST['fCombustible3'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->modificar_orden_Servicio($idOrdenServicio,$idServicio,
    $placa,$revBimCotrautol,$rRegistradora,$kmGps,$vExtintor,$oReg,
    $observacion,$tecnico,$bateria,$tipoBateria,$marca,$serial,
    $fVenta,$fInstalacion,$tUso,$pCambio,$pMantenimiento,$oMejora,
    $llantaSerial1,$profundidad1,$opmarca1,$tipoMarca1,$estado1,$fInstalacion1,
    $fReencauche1,$fCambio1,$fRotacion1,$llantaSerial2,$profundidad2,$opmarca2,
    $tipoMarca2,$estado2,$fInstalacion2,$fReencauche2,$fCambio2,$fRotacion2,
    $llantaSerial3,$profundidad3,$opmarca3,$tipoMarca3,$estado3,$fInstalacion3,
    $fReencauche3,$fCambio3,$fRotacion3,$llantaSerial4,$profundidad4,$opmarca4,
    $tipoMarca4,$estado4,$fInstalacion4,$fReencauche4,$fCambio4,$fRotacion4,
    $llantaSerial5,$profundidad5,$opmarca5,$tipoMarca5,$estado5,$fInstalacion5,
    $fReencauche5,$fCambio5,$fRotacion5,$llantaSerial6,$profundidad6,$opmarca6,
    $tipoMarca6,$estado6,$fInstalacion6,$fReencauche6,$fCambio6,$fRotacion6,
    $calibracion1,$calibracion2,$calibracion3,$calibracion4,$calibracion5,$calibracion6,
    $oCalibracion,$balanceo1,$balanceo2,$balanceo3,$balanceo4,$balanceo5,
    $balanceo6,$oBalanceo,$alineacion1,$alineacion2,$observacionG3,$observacionM3,
    $fecha,$pCambioA,$kilometraje,$cKilometraje,$tipoAceite,$marca10,
    $cantidad1,$presentacion1,$nivelacion,$cNivelacion,$fAceite,$fCombustible,
    $fAire,$tipoAceite1,$marca1,$uCambio,$pCambio10,$cantidad2,
    $presentacion2,$nivelacion2,$cNivelacion2,$tipoAceite3,$marca3,$uCambio3,
    $pCambio3,$cantidad3,$presentacion3,$nivelacion3,$cNivelacion3,$tipoAceite4,$marca4,$uCambio4,$pCambio4,$tipoAceite5,$marca5,
    $uCambio5,$pCambio5,$lFreno,$lParabrisa,$refrigerante,$hidraulico,
    $lMotor,$lCaja,$lTransmision,$lFrenos1,$engrase,$sRadiador,
    $sFiltroAire,$observacionesF,$fCombustible2,$fCombustible3
    );
    echo $consulta;