<?php
    require '../../modelo/modelo_ordenServicio.php';

    $MU = new modelo_ordenServicio();
    $placa = htmlspecialchars($_POST['placa'],ENT_QUOTES,'UTF-8');
    $fIngreso = htmlspecialchars($_POST['fIngreso'],ENT_QUOTES,'UTF-8');
    $tecnico = htmlspecialchars($_POST['tecnico'],ENT_QUOTES,'UTF-8');
    $observaciones1 = htmlspecialchars($_POST['observaciones1'],ENT_QUOTES,'UTF-8');
    $reloj = htmlspecialchars($_POST['reloj'],ENT_QUOTES,'UTF-8');
    $radio = htmlspecialchars($_POST['radio'],ENT_QUOTES,'UTF-8');
    $cd = htmlspecialchars($_POST['cd'],ENT_QUOTES,'UTF-8');
    $gato = htmlspecialchars($_POST['gato'],ENT_QUOTES,'UTF-8');
    $encendedor = htmlspecialchars($_POST['encendedor'],ENT_QUOTES,'UTF-8');
    $cenicero = htmlspecialchars($_POST['cenicero'],ENT_QUOTES,'UTF-8');
    $forro = htmlspecialchars($_POST['forro'],ENT_QUOTES,'UTF-8');
    $herramienta = htmlspecialchars($_POST['herramienta'],ENT_QUOTES,'UTF-8');
    $rueda = htmlspecialchars($_POST['rueda'],ENT_QUOTES,'UTF-8');
    $tapete = htmlspecialchars($_POST['tapete'],ENT_QUOTES,'UTF-8');
    $cuchilla = htmlspecialchars($_POST['cuchilla'],ENT_QUOTES,'UTF-8');
    $llavero = htmlspecialchars($_POST['llavero'],ENT_QUOTES,'UTF-8');
    $tercerStop = htmlspecialchars($_POST['tercerStop'],ENT_QUOTES,'UTF-8');
    $emblema = htmlspecialchars($_POST['emblema'],ENT_QUOTES,'UTF-8');
    $parasol = htmlspecialchars($_POST['parasol'],ENT_QUOTES,'UTF-8');
    $manija = htmlspecialchars($_POST['manija'],ENT_QUOTES,'UTF-8');
    $cinturon = htmlspecialchars($_POST['cinturon'],ENT_QUOTES,'UTF-8');
    $copa = htmlspecialchars($_POST['copa'],ENT_QUOTES,'UTF-8');
    $espejo = htmlspecialchars($_POST['espejo'],ENT_QUOTES,'UTF-8');
    $antena = htmlspecialchars($_POST['antena'],ENT_QUOTES,'UTF-8');

    $exploradora = htmlspecialchars($_POST['exploradora'],ENT_QUOTES,'UTF-8');
    $observaciones2 = htmlspecialchars($_POST['observaciones2'],ENT_QUOTES,'UTF-8');
    $numero1 = htmlspecialchars($_POST['numero1'],ENT_QUOTES,'UTF-8');
    $numero2 = htmlspecialchars($_POST['numero2'],ENT_QUOTES,'UTF-8');
    $numero3 = htmlspecialchars($_POST['numero3'],ENT_QUOTES,'UTF-8');
    $numero4 = htmlspecialchars($_POST['numero4'],ENT_QUOTES,'UTF-8');
    $numero5 = htmlspecialchars($_POST['numero5'],ENT_QUOTES,'UTF-8');
    $numero6 = htmlspecialchars($_POST['numero6'],ENT_QUOTES,'UTF-8');
    $numero7 = htmlspecialchars($_POST['numero7'],ENT_QUOTES,'UTF-8');
    $numero8 = htmlspecialchars($_POST['numero8'],ENT_QUOTES,'UTF-8');
    $numero9 = htmlspecialchars($_POST['numero9'],ENT_QUOTES,'UTF-8');
    $numero10 = htmlspecialchars($_POST['numero10'],ENT_QUOTES,'UTF-8');

    $numero11 = htmlspecialchars($_POST['numero11'],ENT_QUOTES,'UTF-8');
    $numero12 = htmlspecialchars($_POST['numero12'],ENT_QUOTES,'UTF-8');
    $numero13 = htmlspecialchars($_POST['numero13'],ENT_QUOTES,'UTF-8');
    $numero14 = htmlspecialchars($_POST['numero14'],ENT_QUOTES,'UTF-8');
    $numero15 = htmlspecialchars($_POST['numero15'],ENT_QUOTES,'UTF-8');
    $numero16 = htmlspecialchars($_POST['numero16'],ENT_QUOTES,'UTF-8');
    $numero17 = htmlspecialchars($_POST['numero17'],ENT_QUOTES,'UTF-8');
    $numero18 = htmlspecialchars($_POST['numero18'],ENT_QUOTES,'UTF-8');
    $numero19 = htmlspecialchars($_POST['numero19'],ENT_QUOTES,'UTF-8');
    $observaciones3 = htmlspecialchars($_POST['observaciones3'],ENT_QUOTES,'UTF-8');

    $servicio1 = $_POST['servicio1'];
    $observaciones4 = htmlspecialchars($_POST['observaciones4'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->registrar_ordenServicio(
    $placa,$fIngreso,$tecnico,$observaciones1,$reloj,$radio,
    $cd,$gato,$encendedor,$cenicero,$forro,$herramienta,
    $rueda,$tapete,$cuchilla,$llavero,$tercerStop,$emblema,
    $parasol,$manija,$cinturon,$copa,$espejo,$antena,
    $exploradora,$observaciones2,$numero1,$numero2,$numero3,$numero4,
    $numero5,$numero6,$numero7,$numero8,$numero9,$numero10,
    $numero11,$numero12,$numero13,$numero14,$numero15,$numero16,
    $numero17,$numero18,$numero19,$observaciones3,$servicio1,$observaciones4
    );
    echo $consulta;