<?php

use PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
session_start();
    class modelo_cliente{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            require  'phpqrcode/qrlib.php';
            require  'PHPMailer/Exception.php';
            require  'PHPMailer/PHPMailer.php';
            require  'PHPMailer/SMTP.php';
            $this->mail = new PHPMailer();
            $this->conexion = new conexion();
        }

        function listar_cliente(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            $sql = "SELECT
            ( tec.nombre + ' ' + tec.apellido ) AS tecnico,
            ( prop.nombre + ' ' + prop.apellido ) AS propietario,
            prop.email AS email,
            v.placa,
			v.cod_interno,
            os.*,
            s.*,
            os.id as idOrdenServicio,
            s.id as idServicio,
            CONVERT ( VARCHAR, os.fecha_creacion ) AS fecha_creacion,
            CONVERT ( VARCHAR, os.vExtintor ) AS vExtintor,
            CONVERT ( VARCHAR, s.fVenta ) AS fVenta,
            CONVERT ( VARCHAR, s.fInstalacion ) AS fInstalacion,
            CONVERT ( VARCHAR, s.proximoCambio ) AS proximoCambio,
            CONVERT ( VARCHAR, s.proximoMantenimiento ) AS proximoMantenimiento,
            CONVERT ( VARCHAR, s.llanta1Instalacion ) AS llanta1Instalacion,
            CONVERT ( VARCHAR, s.llanta1Reencauche ) AS llanta1Reencauche,
            CONVERT ( VARCHAR, s.llanta1Cambio ) AS llanta1Cambio,
            CONVERT ( VARCHAR, s.llanta1Rotacion ) AS llanta1Rotacion,
            CONVERT ( VARCHAR, s.llanta2Instalacion ) AS llanta2Instalacion,
            CONVERT ( VARCHAR, s.llanta2Reencauche ) AS llanta2Reencauche,
            CONVERT ( VARCHAR, s.llanta2Cambio ) AS llanta2Cambio,
            CONVERT ( VARCHAR, s.llanta2Rotacion ) AS llanta2Rotacion,
            CONVERT ( VARCHAR, s.llanta3Instalacion ) AS llanta3Instalacion,
            CONVERT ( VARCHAR, s.llanta3Reencauche ) AS llanta3Reencauche,
            CONVERT ( VARCHAR, s.llanta3Cambio ) AS llanta3Cambio,
            CONVERT ( VARCHAR, s.llanta3Rotacion ) AS llanta3Rotacion,
            CONVERT ( VARCHAR, s.llanta4Instalacion ) AS llanta4Instalacion,
            CONVERT ( VARCHAR, s.llanta4Reencauche ) AS llanta4Reencauche,
            CONVERT ( VARCHAR, s.llanta4Cambio ) AS llanta4Cambio,
            CONVERT ( VARCHAR, s.llanta4Rotacion ) AS llanta4Rotacion,
            CONVERT ( VARCHAR, s.llanta5Instalacion ) AS llanta5Instalacion,
            CONVERT ( VARCHAR, s.llanta5Reencauche ) AS llanta5Reencauche,
            CONVERT ( VARCHAR, s.llanta5Cambio ) AS llanta5Cambio,
            CONVERT ( VARCHAR, s.llanta5Rotacion ) AS llanta5Rotacion,
            CONVERT ( VARCHAR, s.llanta6Instalacion ) AS llanta6Instalacion,
            CONVERT ( VARCHAR, s.llanta6Reencauche ) AS llanta6Reencauche,
            CONVERT ( VARCHAR, s.llanta6Cambio ) AS llanta6Cambio,
            CONVERT ( VARCHAR, s.llanta6Rotacion ) AS llanta6Rotacion,
            CONVERT ( VARCHAR, s.motorFecha ) AS motorFecha,
            CONVERT ( VARCHAR, s.motorProximoCambio ) AS motorProximoCambio,
            CONVERT ( VARCHAR, s.cajaUltimoCambio ) AS cajaUltimoCambio,
            CONVERT ( VARCHAR, s.cajaProximoCambio ) AS cajaProximoCambio,
            CONVERT ( VARCHAR, s.transmicionUltimoCambio ) AS transmicionUltimoCambio,
            CONVERT ( VARCHAR, s.transmicionProximoCambio ) AS transmicionProximoCambio,
            CONVERT ( VARCHAR, s.refrigeranteUltimoCambio ) AS refrigeranteUltimoCambio,
            CONVERT ( VARCHAR, s.refrigeranteProximoCambio ) AS refrigeranteProximoCambio,
            CONVERT ( VARCHAR, s.hidraulicoUltimoCambio ) AS hidraulicoUltimoCambio,
            CONVERT ( VARCHAR, s.hidraulicoProximoCambio ) AS hidraulicoProximoCambio,
            ta.descripcion as txttipoAceite,
            tab.descripcion as txtbateria,
            tatb.descripcion as txttipoBateria,
            tam.descripcion as txtmarca,
            tal1.descripcion as txtllanta1Marca,
            tal2.descripcion as txtllanta2Marca,
            tal3.descripcion as txtllanta3Marca,
            tal4.descripcion as txtllanta4Marca,
            tal5.descripcion as txtllanta5Marca,
            tal6.descripcion as txtllanta6Marca,
            tafa.descripcion as txtmotorMarca,
            tafac.descripcion as txtmotorFiltroAceite,
            tafc.descripcion as txtmotorfiltroCombustible,
            tafc2.descripcion as txtmotorfiltroCombustible2,
            tafc.descripcion as txtmotorfiltroCombustible3,
            tafai.descripcion as txtmotorFiltroAire


            FROM
                ordenServicio AS os
                LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                LEFT JOIN tecnico AS t ON ( t.id = os.idTecnico)
                LEFT JOIN persona AS tec ON ( t.idPersona = tec.id )
                LEFT JOIN propietario as p ON ( p.id = v.idPropietario )
	            LEFT JOIN persona AS prop ON ( prop.id = p.idPersona )
                INNER JOIN servicio AS s ON ( os.idServicio = s.id )
                LEFT JOIN miscelaneos_detalle AS ta ON ( ta.id = s.motorTipoAceite and ta.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tab ON ( tab.id = s.bateria and tab.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tatb ON ( tatb.id = s.tipoBateria and tatb.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tam ON ( tam.id = s.marca and tam.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal1 ON ( tal1.id = s.llanta1Marca and tal1.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal2 ON ( tal2.id = s.llanta2Marca and tal2.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal3 ON ( tal3.id = s.llanta3Marca and tal3.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal4 ON ( tal4.id = s.llanta4Marca and tal4.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal5 ON ( tal5.id = s.llanta5Marca and tal5.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tal6 ON ( tal6.id = s.llanta6Marca and tal6.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafa ON ( tafa.id = s.motorMarca and tafa.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafac ON ( tafac.id = s.motorFiltroAceite and tafac.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafc ON ( tafc.id = s.motorfiltroCombustible and tafc.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafc2 ON ( tafc2.id = s.motorfiltroCombustible2 and tafc2.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafc3 ON ( tafc3.id = s.motorfiltroCombustible3 and tafc3.estatus=1)
                LEFT JOIN miscelaneos_detalle AS tafai ON ( tafai.id = s.motorFiltroAire and tafai.estatus=1)
				WHERE os.estatus = 1
                order by os.fecha_creacion desc " ;
              
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }

            $this->conexion->conectar();
        }

        function listar_conductor(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT
                    con.id,
                    p.id as idPersonaC,
                    p.nombre,
                    p.apellido,
                    (p.nombre + ' ' + p.apellido) AS dueno, 
                    p.cedula,
                    p.telefono,
                    p.email,
                    p.direccion,
                    con.eps,
                    CONVERT ( VARCHAR, con.vSeguridad ) AS vSeguridad,
                    con.arl,
                    con.rh,
                    con.fondoPension,
                    CONVERT ( VARCHAR, con.vLicencia ) AS vLicencia,
                    CONVERT ( VARCHAR, v.vSoat ) AS vSoat,
                    CONVERT ( VARCHAR, v.vMovilizacion ) AS vMovilizacion,
                    v.nMovilizacion,
                    v.placa,
                    v.nInterno,
                    v.id as idVehiculo,
                    c.entResp,
                    c.nit
                    FROM
                    conductor AS con
                    INNER JOIN vehiculo AS v ON ( con.idVehiculo = v.id )
                    INNER JOIN persona AS p ON ( con.idPersona = p.id ) 
                    INNER JOIN company AS c ON ( c.id = con.idCompany ) 
                    WHERE con.estatus = 1";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_tecnico(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];
    

            $sql  = "SELECT 
            t.id,
            (p.nombre + ' ' +p.apellido) as tecnico
            FROM
            tecnico as t
            INNER JOIN persona AS p ON (t.idPersona = p.id)
            INNER JOIN company AS c ON ( c.id = t.idCompany ) 
            where t.estatus = 1 ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_placa(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT v.id, v.placa , v.cod_interno
            from vehiculo as v
            INNER JOIN company AS c ON ( c.id = v.idCompany ) 
            where v.estatus = 1";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_bateria(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as bateria
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 11";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_tipoBateria(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as tipoBateria
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 18";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as marca
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 19";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca_llanta(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

 

            $sql  = "SELECT 
            m.id, 
            m.descripcion as llanta
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 9";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_tipo_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

  
            $sql  = "SELECT 
            m.id, 
            m.descripcion as tipo_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 16";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as marca_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 14";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_filtro_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

   

            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 20";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_filtro_aire(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_aire
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 21";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_filtro_combustible(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_combustible
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 22";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }



        function buscar_persona($valor){
            $conn = $this->conexion->conectar();
            $sql  = "SELECT
                    *
                    FROM
                    persona 
                    WHERE cedula = $valor
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function registrar_ordenServicio($placa,$revBimCotrautol,$rRegistradora,$kmGps,$vExtintor,$oReg,$observacion,$tecnico,$bateria,$tipoBateria,$marca,$serial,$fVenta,$fInstalacion,$tUso,$pCambio,$pMantenimiento,$oMejora,$llantaSerial1,$profundidad1,$opmarca1,$tipoMarca1,$estado1,$fInstalacion1,$fReencauche1,$fCambio1,$fRotacion1,$llantaSerial2,$profundidad2,$opmarca2,$tipoMarca2,$estado2,$fInstalacion2,$fReencauche2,$fCambio2,$fRotacion2,$llantaSerial3,$profundidad3,$opmarca3,$tipoMarca3,$estado3,$fInstalacion3,$fReencauche3,$fCambio3,$fRotacion3,$llantaSerial4,$profundidad4,$opmarca4,$tipoMarca4,$estado4,$fInstalacion4,$fReencauche4,$fCambio4,$fRotacion4,$llantaSerial5,$profundidad5,$opmarca5,$tipoMarca5,$estado5,$fInstalacion5,$fReencauche5,$fCambio5,$fRotacion5,$llantaSerial6,$profundidad6,$opmarca6,$tipoMarca6,$estado6,$fInstalacion6,$fReencauche6,$fCambio6,$fRotacion6,$calibracion1,$calibracion2,$calibracion3,$calibracion4,$calibracion5,$calibracion6,$oCalibracion,$balanceo1,$balanceo2,$balanceo3,$balanceo4,$balanceo5,$balanceo6,$oBalanceo,$alineacion1,$alineacion2,$observacionG3,$observacionM3,$fecha,$pCambioA,$kilometraje,$cKilometraje,$tipoAceite,$marca10,$cantidad1,$presentacion1,$nivelacion,$cNivelacion,$fAceite,$fCombustible,$fAire,$tipoAceite1,$marca1,$uCambio,$pCambio10,$cantidad2,$presentacion2,$nivelacion2,$cNivelacion2,$tipoAceite3,$marca3,$uCambio3,$pCambio3,$cantidad3,$presentacion3,$nivelacion3,$cNivelacion3,$tipoAceite4,$marca4,$uCambio4,$pCambio4,$tipoAceite5,$marca5,$uCambio5,$pCambio5,$lFreno,$lParabrisa,$refrigerante,$hidraulico,$lMotor,$lCaja,$lTransmision,$lFrenos1,$engrase,$sRadiador,$sFiltroAire,$observacionesF,$fCombustible2,$fCombustible3){
            $idCompany = $_SESSION['COMPANY'];
            $idUsuario = $_SESSION['S_ID'];
            $date=@date('Y-m-d H:i:s');
            $cadena = "";
            
                
                $cadena = "DECLARE @idServicio int
                INSERT INTO servicio(
                            bateria,
                            tipoBateria,
                            marca,
                            serial,
                            fVenta,
                            fInstalacion,
                            tiempoUso,
                            proximoCambio,
                            proximoMantenimiento,
                            oportunidadesMejora,
                            llanta1Serial,
                            llanta1Profundidad,
                            llanta1Marca,
                            llanta1Tipo,
                            llanta1Estado,
                            llanta1Instalacion,
                            llanta1Reencauche,
                            llanta1Cambio,
                            llanta1Rotacion,
                            llanta2Serial,
                            llanta2Profundidad,
                            llanta2Marca,
                            llanta2Tipo,
                            llanta2Estado,
                            llanta2Instalacion,
                            llanta2Reencauche,
                            llanta2Cambio,
                            llanta2Rotacion,
                            llanta3Serial,
                            llanta3Profundidad,
                            llanta3Marca,
                            llanta3Tipo,
                            llanta3Estado,
                            llanta3Instalacion,
                            llanta3Reencauche,
                            llanta3Cambio,
                            llanta3Rotacion,
                            llanta4Serial,
                            llanta4Profundidad,
                            llanta4Marca,
                            llanta4Tipo,
                            llanta4Estado,
                            llanta4Instalacion,
                            llanta4Reencauche,
                            llanta4Cambio,
                            llanta4Rotacion,
                            llanta5Serial,
                            llanta5Profundidad,
                            llanta5Marca,
                            llanta5Tipo,
                            llanta5Estado,
                            llanta5Instalacion,
                            llanta5Reencauche,
                            llanta5Cambio,
                            llanta5Rotacion,
                            llanta6Serial,
                            llanta6Profundidad,
                            llanta6Marca,
                            llanta6Tipo,
                            llanta6Estado,
                            llanta6Instalacion,
                            llanta6Reencauche,
                            llanta6Cambio,
                            llanta6Rotacion,
                            calibracionLlanta1,
                            calibracionLlanta2,
                            calibracionLlanta3,
                            calibracionLlanta4,
                            calibracionLlanta5,
                            calibracionLlanta6,
                            observacionCalibracion,
                            Balanceo1,
                            Balanceo2,
                            Balanceo3,
                            Balanceo4,
                            Balanceo5,
                            Balanceo6,
                            oBalanceo,
                            alineacion1,
                            alineacion2,
                            lObservacionGeneral,
                            lObservacionMejora,
                            motorFecha,
                            motorProximoCambio,
                            motorKilometraje,
                            motorCambioKilometraje,
                            motorTipoAceite,
                            motorMarca,
                            motorCantidad,
                            motorPresentacion,
                            motorNivelacion,
                            motorCantidadNivelada,
                            motorFiltroAceite,
                            motorfiltroCombustible,
                            motorFiltroAire,
                            cajaTipoAceite,
                            cajaMarca,
                            cajaUltimoCambio,
                            cajaProximoCambio,
                            cajaCantidad,
                            cajaPresentacion,
                            cajaNivelacion,
                            cajaCantidadNivelada,
                            transmicionTipoAceite,
                            transmicionMarca,
                            transmicionUltimoCambio,
                            transmicionProximoCambio,
                            transmicionCantidad,
                            transmicionPresentacion,
                            transmicionNivelacion,
                            transmicionCantidadNivelada,
                            refrigeranteTipoAceite,
                            refrigeranteMarca,
                            refrigeranteUltimoCambio,
                            refrigeranteProximoCambio,
                            hidraulicoTipoAceite,
                            hidraulicoMarca,
                            hidraulicoUltimoCambio,
                            hidraulicoProximoCambio,
                            liquidoFrenos,
                            liquidoParabrisas,
                            liquidoRefrigerantes,
                            liquidoHidraulico,
                            liquidoMotor,
                            liquidoCaja,
                            liquidoTransmision,
                            otrosLimpiezaFrenos,
                            otrosEngrase,
                            otrosSopleteoRadiador,
                            otrosSopleteoFiltroAire,
                            observacionesGenerales2,
                            motorfiltroCombustible2,
                            motorfiltroCombustible3
                                    )
                VALUES(
                    $bateria,
                    $tipoBateria,
                    $marca,
                    '$serial',
                    '$fVenta',
                    '$fInstalacion',
                    '$tUso',
                    '$pCambio',
                    '$pMantenimiento',
                    '$oMejora',
                    '$llantaSerial1',
                    $profundidad1,
                    $opmarca1,
                    $tipoMarca1,
                    $estado1,
                    '$fInstalacion1',
                    '$fReencauche1',
                    '$fCambio1',
                    '$fRotacion1',
                    '$llantaSerial2',
                    $profundidad2,
                    $opmarca2,
                    $tipoMarca2,
                    $estado2,
                    '$fInstalacion2',
                    '$fReencauche2',
                    '$fCambio2',
                    '$fRotacion2',
                    '$llantaSerial3',
                    $profundidad3,
                    $opmarca3,
                    $tipoMarca3,
                    $estado3,
                    '$fInstalacion3',
                    '$fReencauche3',
                    '$fCambio3',
                    '$fRotacion3',
                    '$llantaSerial4',
                    $profundidad4,
                    $opmarca4,
                    $tipoMarca4,
                    $estado4,
                    '$fInstalacion4',
                    '$fReencauche4',
                    '$fCambio4',
                    '$fRotacion4',
                    '$llantaSerial5',
                    $profundidad5,
                    $opmarca5,
                    $tipoMarca5,
                    $estado5,
                    '$fInstalacion5',
                    '$fReencauche5',
                    '$fCambio5',
                    '$fRotacion5',
                    '$llantaSerial6',
                    $profundidad6,
                    $opmarca6,
                    $tipoMarca6,
                    $estado6,
                    '$fInstalacion6',
                    '$fReencauche6',
                    '$fCambio6',
                    '$fRotacion6',
                    '$calibracion1',
                    '$calibracion2',
                    '$calibracion3',
                    '$calibracion4',
                    '$calibracion5',
                    '$calibracion6',
                    '$oCalibracion',
                    $balanceo1,
                    $balanceo2,
                    $balanceo3,
                    $balanceo4,
                    $balanceo5,
                    $balanceo6,
                    '$oBalanceo',
                    $alineacion1,
                    $alineacion2,
                    '$observacionG3',
                    '$observacionM3',
                    '$fecha',
                    '$pCambioA',
                    '$kilometraje',
                    '$cKilometraje',
                    $tipoAceite,
                    $marca10,
                    $cantidad1,
                    $presentacion1,
                    $nivelacion,
                    $cNivelacion,
                    $fAceite,
                    $fCombustible,
                    $fAire,
                    $tipoAceite1,
                    $marca1,
                    '$uCambio',
                    '$pCambio10',
                    $cantidad2,
                    $presentacion2,
                    $nivelacion2,
                    $cNivelacion2,
                    $tipoAceite3,
                    $marca3,
                    '$uCambio3',
                    '$pCambio3',
                    $cantidad3,
                    $presentacion3,
                    $nivelacion3,
                    $cNivelacion3,
                    $tipoAceite4,
                    $marca4,
                    '$uCambio4',
                    '$pCambio4',
                    $tipoAceite5,
                    $marca5,
                    '$uCambio5',
                    '$pCambio5',
                    $lFreno,
                    $lParabrisa,
                    $refrigerante,
                    $hidraulico,
                    $lMotor,
                    $lCaja,
                    $lTransmision,
                    $lFrenos1,
                    $engrase,
                    $sRadiador,
                    $sFiltroAire,
                    '$observacionesF',
                    $fCombustible3,
                    $fCombustible2
                )
                SET @idServicio = SCOPE_IDENTITY()
                INSERT INTO ordenServicio(
                    idServicio,
                    idVehiculo,
                    estatus,
                    revBimCotrautol,
                    vExtintor,
                    rRegistradora,
                    oRegistradora,
                    observacion,
                    idTecnico,
                    fecha_creacion
                ) 
                VALUES(
                    @idServicio,$placa,1,$revBimCotrautol,'$vExtintor',$rRegistradora,'$oReg','$observacion',$tecnico,'$date'
                )";
            
            
            $conn = $this->conexion->conectar();
            $sql  = "BEGIN TRY
                     BEGIN TRAN
                     
                     $cadena
                     
                     COMMIT TRAN
                     END TRY
                     BEGIN CATCH
                     ROLLBACK TRAN
                     END CATCH";
            $resp = sqlsrv_query($conn, $sql);

            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }



        function contador_conductor(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            $sql  = "SELECT COUNT(id) as contadorConductor from conductor
            where estatus = 1 ";
           //echo $sql;
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function contador_orden(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT COUNT
            ( s.id ) AS contadorServicio 
            FROM
            servicio AS s
            INNER JOIN ordenServicio AS os ON ( os.idServicio = s.Id ) 
            where os.estatus = 1 and fecha_creacion >= '2022-05-03 00:00:00.000'
           ";
           //echo $sql;
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function modificar_conductor($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE conductor set estatus= $estatus
                    WHERE id='$id'
                    ";
                   
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }
    
        function modificar_orden_Servicio($idOrdenServicio,$idServicio,
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
        $sFiltroAire,$observacionesF,$fCombustible2,$fCombustible3){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $cadena = "UPDATE servicio SET
                            bateria = $bateria,
                            tipoBateria = $tipoBateria,
                            marca = $marca,
                            serial = '$serial',
                            fVenta = '$fVenta',
                            fInstalacion = '$fInstalacion',
                            tiempoUso = '$tUso',
                            proximoCambio = '$pCambio',
                            proximoMantenimiento = '$pMantenimiento',
                            oportunidadesMejora = '$oMejora',
                            llanta1Serial = '$llantaSerial1',
                            llanta1Profundidad = $profundidad1,
                            llanta1Marca = $opmarca1,
                            llanta1Tipo = $tipoMarca1,
                            llanta1Estado = $estado1,
                            llanta1Instalacion = '$fInstalacion1',
                            llanta1Reencauche = '$fReencauche1',
                            llanta1Cambio = '$fCambio1',
                            llanta1Rotacion = '$fRotacion1',
                            llanta2Serial = '$llantaSerial2',
                            llanta2Profundidad = $profundidad2,
                            llanta2Marca = $opmarca2,
                            llanta2Tipo = $tipoMarca2,
                            llanta2Estado = $estado2,
                            llanta2Instalacion = '$fInstalacion2',
                            llanta2Reencauche = '$fReencauche2',
                            llanta2Cambio = '$fCambio2',
                            llanta2Rotacion = '$fRotacion2',
                            llanta3Serial = '$llantaSerial3',
                            llanta3Profundidad = $profundidad3,
                            llanta3Marca = $opmarca3,
                            llanta3Tipo = $tipoMarca3,
                            llanta3Estado = $estado3,
                            llanta3Instalacion = '$fInstalacion3',
                            llanta3Reencauche = '$fReencauche3',
                            llanta3Cambio = '$fCambio3',
                            llanta3Rotacion = '$fRotacion3',
                            llanta4Serial = '$llantaSerial4',
                            llanta4Profundidad = $profundidad4,
                            llanta4Marca = $opmarca4,
                            llanta4Tipo = $tipoMarca4,
                            llanta4Estado = $estado4,
                            llanta4Instalacion = '$fInstalacion4',
                            llanta4Reencauche = '$fReencauche4',
                            llanta4Cambio = '$fCambio4',
                            llanta4Rotacion = '$fRotacion4',
                            llanta5Serial = '$llantaSerial5',
                            llanta5Profundidad =  $profundidad5,
                            llanta5Marca = $opmarca5,
                            llanta5Tipo = $tipoMarca5,
                            llanta5Estado = $estado5,
                            llanta5Instalacion = '$fInstalacion5',
                            llanta5Reencauche = '$fReencauche5',
                            llanta5Cambio = '$fCambio5',
                            llanta5Rotacion = '$fRotacion5',
                            llanta6Serial = '$llantaSerial6',
                            llanta6Profundidad = $profundidad6,
                            llanta6Marca = $opmarca6,
                            llanta6Tipo = $tipoMarca6,
                            llanta6Estado =  $estado6,
                            llanta6Instalacion = '$fInstalacion6',
                            llanta6Reencauche = '$fReencauche6',
                            llanta6Cambio = '$fCambio6',
                            llanta6Rotacion = '$fRotacion6',
                            calibracionLlanta1 = '$calibracion1',
                            calibracionLlanta2 = '$calibracion2',
                            calibracionLlanta3 = '$calibracion3',
                            calibracionLlanta4 = '$calibracion4',
                            calibracionLlanta5 = '$calibracion5',
                            calibracionLlanta6 = '$calibracion6',
                            observacionCalibracion = '$oCalibracion',
                            Balanceo1 = $balanceo1,
                            Balanceo2 = $balanceo2,
                            Balanceo3 = $balanceo3,
                            Balanceo4 = $balanceo4,
                            Balanceo5 = $balanceo5,
                            Balanceo6 = $balanceo6,
                            oBalanceo = '$oBalanceo',
                            alineacion1 = $alineacion1,
                            alineacion2 = $alineacion2,
                            lObservacionGeneral = '$observacionG3',
                            lObservacionMejora = '$observacionM3',
                            motorFecha = '$fecha',
                            motorProximoCambio = '$pCambioA',
                            motorKilometraje = '$kilometraje',
                            motorCambioKilometraje = '$cKilometraje',
                            motorTipoAceite = $tipoAceite,
                            motorMarca = $marca10,
                            motorCantidad = $cantidad1,
                            motorPresentacion = $presentacion1,
                            motorNivelacion = $nivelacion,
                            motorCantidadNivelada = $cNivelacion,
                            motorFiltroAceite = $fAceite,
                            motorfiltroCombustible = $fCombustible,
                            motorFiltroAire = $fAire,
                            cajaTipoAceite = $tipoAceite1,
                            cajaMarca =  $marca1,
                            cajaUltimoCambio = '$uCambio',
                            cajaProximoCambio = '$pCambio10',
                            cajaCantidad = $cantidad2,
                            cajaPresentacion = $presentacion2,
                            cajaNivelacion = $nivelacion2,
                            cajaCantidadNivelada = $cNivelacion2,
                            transmicionTipoAceite = $tipoAceite3,
                            transmicionMarca = $marca3,
                            transmicionUltimoCambio = '$uCambio3',
                            transmicionProximoCambio = '$pCambio3',
                            transmicionCantidad = $cantidad3,
                            transmicionPresentacion = $presentacion3,
                            transmicionNivelacion = $nivelacion3,
                            transmicionCantidadNivelada = $cNivelacion3,
                            refrigeranteTipoAceite = $tipoAceite4,
                            refrigeranteMarca = $marca4,
                            refrigeranteUltimoCambio = '$uCambio4',
                            refrigeranteProximoCambio = '$pCambio4',
                            hidraulicoTipoAceite = $tipoAceite5,
                            hidraulicoMarca = $marca5,
                            hidraulicoUltimoCambio = '$uCambio5',
                            hidraulicoProximoCambio = '$pCambio5',
                            liquidoFrenos = $lFreno,
                            liquidoParabrisas = $lParabrisa,
                            liquidoRefrigerantes = $refrigerante,
                            liquidoHidraulico = $hidraulico,
                            liquidoMotor = $lMotor,
                            liquidoCaja = $lCaja,
                            liquidoTransmision = $lTransmision,
                            otrosLimpiezaFrenos = $lFrenos1,
                            otrosEngrase = $engrase,
                            otrosSopleteoRadiador = $sRadiador,
                            otrosSopleteoFiltroAire = $sFiltroAire,
                            observacionesGenerales2 = '$observacionesF',
                            motorfiltroCombustible2 = $fCombustible2,
                            motorfiltroCombustible3 = $fCombustible3
                            where id = $idServicio
                    
                
                            UPDATE ordenServicio SET
                            idVehiculo = $placa,
                            estatus = 1,
                            revBimCotrautol = $revBimCotrautol,
                            vExtintor = '$vExtintor',
                            rRegistradora = $rRegistradora,
                            oRegistradora = '$oReg',
                            observacion = '$observacion',
                            idTecnico = $tecnico
                            where id = $idOrdenServicio
                            ";

            $conn = $this->conexion->conectar();
            $sql  = "BEGIN TRY
                    BEGIN TRAN
                    
                    $cadena
                    
                    COMMIT TRAN
                    END TRY
                    BEGIN CATCH
                    ROLLBACK TRAN
                    END CATCH";
                   // echo $sql;exit;

            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }


        function listar_vencimientos(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $sql  = "SELECT 
            con.id,
            (p.nombre + ' ' +p.apellido) as dueno
            from 
            conductor as con
            INNER JOIN persona AS p ON (con.idPersona = p.id)
            where con.idCompany = $idCompany and con.estatus = 1
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        

        function modificar_ordenServicio($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE ordenServicio set estatus= $estatus
                    WHERE id='$id'
                    ";
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

        function enviarVencimiento($email,$placa,$revBimCotrautol,$rRegistradora,$vExtintor,$oReg,
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
        $sFiltroAire,$observacionesF,$fCombustible2,$fCombustible3,$fecha_creacion,$idOrdenServicio){

            $conn = $this->conexion->conectar();
            $sql  = "UPDATE ordenServicio set eCorreo = 1
                    WHERE id='$idOrdenServicio'
                    ";
            $resp = sqlsrv_query($conn, $sql);        
                   
        
            $revBimCotrautolr = '';
            // echo $Email;
            if($revBimCotrautol == 1){
                $revBimCotrautolr = "Si se realiza la revision";
            }
            else{
                $revBimCotrautolr = "No se realiza la revision";
            }

            $rRegistradora = '';
            if($rRegistradora==1){
                $rRegistradorar = "Se realiza la revision";
            }
            else{
                $rRegistradorar = "No se realiza la revision";
            }

            $oMejorar ='';
            if($oMejora != 0){
                    $oMejorar = $oMejora;
            }
            else{
                $oMejorar = "No se le realizaron cambios a la bateria";
            }

            $observacionG3r ='';
            if($observacionG3r != 0){
                    $observacionG3r = $observacionG3;
            }
            else{
                $observacionG3r = "No se le realizaron cambios a las llantas";
            }
            
            $observacionesFr ='';
            if($observacionesFr != 0){
                    $observacionesFr = $observacionesF;
            }
            else{
                $observacionesFr = "No se le realizaron cambios a las llantas";
            }
            $bateriar ='';
            if($bateria != null){
                    $bateriar = $bateria;
            }
            else{
                $bateriar = "No se realizaron cambios";
            }
            $tipoBateriar ='';
            if($tipoBateria != 0){
                    $tipoBateriar = $tipoBateria;
            }
            else{
                $tipoBateriar = "No se realizaron cambios";
            }
            $marcar ='';
            if($marca != null){
                    $marcar = $marca;
            }
            else{
                $marcar = "No se realizaron cambios";
            }
            $llantaSerial1r ='';
            if($llantaSerial1 != 0){
                    $llantaSerial1r = $llantaSerial1;
            }
            else{
                $llantaSerial1r = "No se realizaron cambios";
            }
            $profundidad1r ='';
            if($profundidad1 != 0){
                    $profundidad1r = $profundidad1 ."CM";
            }
            else{
                $profundidad1r = "No se realizaron cambios";
            }
            $opmarca1r ='';
            if($opmarca1 != null){
                    $opmarca1r = $opmarca1;
            }
            else{
                $opmarca1r = "No se realizaron cambios";
            }
            
            if($tipoMarca1 == 1){
                $tipoMarca1r = "Traccion";
            }
            if($tipoMarca1 == 2){
                $tipoMarca1r = "Direccional";
            }
            if($tipoMarca1 == 0){
                $tipoMarca1r = "No se realizaron cambios";
            }

            $estado1r ='';
            if($estado1 == 1){
                    $estado1r = "Nueva";
            }
            if($estado1 == 2){
                $estado1r = "Reencauchada";
            }
            if($estado1 == 0){
                $estado1r = "No se realizaron cambios";
            }
            $llantaSerial2r ='';
            if($llantaSerial2 != 0){
                    $llantaSerial2r = $llantaSerial2;
            }
            else{
                $llantaSerial2r = "No se realizaron cambios";
            }
            $profundidad2r ='';
            if($profundidad2 != 0){
                    $profundidad2r = $profundidad2 ."CM";
            }
            else{
                $profundidad2r = "No se realizaron cambios";
            }
            $opmarca2r ='';
            if($opmarca2 != null){
                    $opmarca2r = $opmarca2;
            }
            else{
                $opmarca2r = "No se realizaron cambios";
            }
            $tipoMarca2r ='';
            if($tipoMarca2 == 1){
                    $tipoMarca2r = "Traccion";
            }
            if($tipoMarca2 == 2){
                $tipoMarca2r = "Direccional";
            }
            if($tipoMarca2 == 0){
                $tipoMarca2r = "No se realizaron cambios";
            }

            $estado2r ='';
            if($estado2 == 1){
                    $estado2r = "Nueva";
            }
            if($estado2 == 2){
                $estado2r = "Reencauchada";
            }
            if($estado2 == 0){
                $estado2r = "No se realizaron cambios";
            }

            $llantaSerial3r ='';
            if($llantaSerial3 != 0){
                    $llantaSerial3r = $llantaSerial3;
            }
            else{
                $llantaSerial3r = "No se realizaron cambios";
            }
            $profundidad3r ='';
            if($profundidad3 != 0){
                    $profundidad3r = $profundidad3 ."CM";
            }
            else{
                $profundidad3r = "No se realizaron cambios";
            }
            $opmarca3r ='';
            if($opmarca3 != null){
                    $opmarca3r = $opmarca3;
            }
            else{
                $opmarca3r = "No se realizaron cambios";
            }
            $tipoMarca3r ='';
            if($tipoMarca3 == 1){
                    $tipoMarca3r = "Traccion";
            }
            if($tipoMarca3 == 2){
                $tipoMarca3r = "Direccional";
            }
            if($tipoMarca3 == 0){
                $tipoMarca3r = "No se realizaron cambios";
            }

            $estado3r ='';
            if($estado3 == 1){
                    $estado3r = "Nueva";
            }
            if($estado3 == 2){
                $estado3r = "Reencauchada";
            }
            if($estado3 == 0){
                $estado3r = "No se realizaron cambios";
            }

            $llantaSerial4r ='';
            if($llantaSerial4 != 0){
                    $llantaSerial4r = $llantaSerial4;
            }
            else{
                $llantaSerial4r = "No se realizaron cambios";
            }
            $profundidad4r ='';
            if($profundidad4 != 0){
                    $profundidad4r = $profundidad4 ."CM";
            }
            else{
                $profundidad4r = "No se realizaron cambios";
            }
            $opmarca4r ='';
            if($opmarca4 != null){
                    $opmarca4r = $opmarca4;
            }
            else{
                $opmarca4r = "No se realizaron cambios";
            }
            $tipoMarca4r ='';
            if($tipoMarca4 == 1){
                    $tipoMarca4r = "Traccion";
            }
            if($tipoMarca4 == 2){
                $tipoMarca4r = "Direccional";
            }
            if($tipoMarca4 == 0){
                $tipoMarca4r = "No se realizaron cambios";
            }

            $estado4r ='';
            if($estado4 == 1){
                    $estado4r = "Nueva";
            }
            if($estado4 == 2){
                $estado4r = "Reencauchada";
            }
            if($estado4 == 0){
                $estado4r = "No se realizaron cambios";
            }

            $llantaSerial5r ='';
            if($llantaSerial5 != 0){
                    $llantaSerial5r = $llantaSerial5;
            }
            else{
                $llantaSerial5r = "No se realizaron cambios";
            }
            $profundidad5r ='';
            if($profundidad5 != 0){
                    $profundidad5r = $profundidad5 ."CM";
            }
            else{
                $profundidad5r = "No se realizaron cambios";
            }
            $opmarca5r ='';
            if($opmarca5 != null){
                    $opmarca5r = $opmarca5;
            }
            else{
                $opmarca5r = "No se realizaron cambios";
            }
            $tipoMarca5r ='';
            if($tipoMarca5 == 1){
                    $tipoMarca5r = "Traccion";
            }
            if($tipoMarca5 == 2){
                $tipoMarca5r = "Direccional";
            }
            if($tipoMarca5 == 0){
                $tipoMarca5r = "No se realizaron cambios";
            }

            $estado5r ='';
            if($estado5 == 1){
                    $estado5r = "Nueva";
            }
            if($estado5 == 2){
                $estado5r = "Reencauchada";
            }
            if($estado5 == 0){
                $estado5r = "No se realizaron cambios";
            }

            $llantaSerial6r ='';
            if($llantaSerial6 != 0){
                    $llantaSerial6r = $llantaSerial6;
            }
            else{
                $llantaSerial6r = "No se realizaron cambios";
            }
            $profundidad6r ='';
            if($profundidad6 != 0){
                    $profundidad6r = $profundidad6 ."CM";
            }
            else{
                $profundidad6r = "No se realizaron cambios";
            }
            $opmarca6r ='';
            if($opmarca6 != null){
                    $opmarca6r = $opmarca6;
            }
            else{
                $opmarca6r = "No se realizaron cambios";
            }
            $tipoMarca6r ='';
            if($tipoMarca6 == 1){
                    $tipoMarca6r = "Traccion";
            }
            if($tipoMarca6 == 2){
                $tipoMarca6r = "Direccional";
            }
            if($tipoMarca6 == 0){
                $tipoMarca6r = "No se realizaron cambios";
            }

            $estado6r ='';
            if($estado6 == 1){
                    $estado6r = "Nueva";
            }
            if($estado6 == 2){
                $estado6r = "Reencauchada";
            }
            if($estado6 == 0){
                $estado6r = "No se realizaron cambios";
            }
            

            $tipoAceiter ='';
            if($tipoAceite != null){
                    $tipoAceiter = $tipoAceite;
            }
            else{
                $tipoAceiter = "No se realizaron cambios";
            }

            $marca10r ='';
            if($marca10 != null){
                    $marca10r = $marca10;
            }
            else{
                $marca10r = "No se realizaron cambios";
            }

            $fAceiter ='';
            if($fAceite != null){
                    $fAceiter = $fAceite;
            }
            else{
                $fAceiter = "No se realizaron cambios";
            }

            $fCombustibler ='';
            if($fCombustible != null){
                    $fCombustibler = $fCombustible;
            }
            else{
                $fCombustibler = "No se realizaron cambios";
            }

            $fCombustible2r ='';
            if($fCombustible2 != null){
                    $fCombustible2r = $fCombustible2;
            }
            else{
                $fCombustible2r = "No se realizaron cambios";
            }

            $fCombustible3r ='';
            if($fCombustible2 != null){
                    $fCombustible3r = $fCombustible3;
            }
            else{
                $fCombustible3r = "No se realizaron cambios";
            }

            $fAirer ='';
            if($fAire != null){
                    $fAirer = $fAire;
            }
            else{
                $fAirer = "No se realizaron cambios";
            }

            try {
            
            $cuerpoMail = utf8_decode("
            <b><h4><center>Inverlima</center></h4><b>
            <center><img width='450' height='150' src='https://www.visualsaturbano.com/inverlima/Vista/imagenes/logo_administracion.png'></center>
            <b><h4><center>Inverlima te informa que se realizaron las siguientes funciones a el vehiculo de placas $placa bajo el cargo del tecnico $tecnico :</center></h4><b>
            <br>
            <b><h3><center>Servicio solicitado</center></h3></b>
            <br>
            <b><h4 style='margin-left:22.5%;'><left>Fecha de creacion: $fecha_creacion</left></h4></b>
                <table style='width:600px; border-collapse:collapse; border:solid 1px black;margin:auto'>
                <thead style='background-color:#005395; border: solid 1px black'>
                    <th style='color:white;'>DESCRIPCIÓN</th>
                    <th style='color:white;'>RESULTADO</th>
                </thead>
                <tbody>
                
                    <tr style='background-color: white;padding:5px;'>
                        <td align='left'><span style='margin-left:5px;'>Revision bimestral de Cotrautol:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$revBimCotrautolr<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;padding:5px;'>
                        <td align='left'><span style='margin-left:5px;'>Revision de la registradora:</span></td>
                        <td align='left'><span style='margin-left:5px;'>$rRegistradorar</span></td>
                    </tr>

                    <tr style='background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Observaciones:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$observacion<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Bateria:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$bateriar<span></td>
                    </tr>

                    <tr style='background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de bateria:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoBateriar<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Marca:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$marcar<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 1</td>
                    </tr>
                    
                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial1r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad1r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca1r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca1r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado1r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 2</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial2r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad2r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca2r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca2r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado2r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 3</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial3r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad3r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca3r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca3r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado3r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 4</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial4r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad4r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca4r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca4r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado4r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 5</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial5r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad5r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca5r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca5r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado5r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>LLANTA NUM. 6</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Serial de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$llantaSerial6r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Profundidad de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$profundidad6r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Marca de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$opmarca6r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoMarca6r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Estado de la llanta:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$estado6r<span></td>
                    </tr>

                    <tr style='background-color:#005395; border: solid 1px black;' >
                        <td colspan='2' style='color:white;text-align: center;'>MOTOR</td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Tipo de aceite:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$tipoAceiter<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Marca del aceite:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$marca10r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Filtro de aceite:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$fAceiter<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Filtro de combustible:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$fCombustibler <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Filtro de combustible:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$fCombustible2r<span></td>
                    </tr>

                    <tr style=' background-color:#ddd;'>
                        <td align='left'><span style='margin-left:5px;'>Filtro de combustible:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$fCombustible3r <span></td>
                    </tr>

                    <tr style=' background-color: white;'>
                        <td align='left'><span style='margin-left:5px;'>Filtro de aire:<span></td>
                        <td align='left'><span style='margin-left:5px;'>$fAirer<span></td>
                    </tr>

                </tbody>    
            </table>
            
                ");	 


            $this->mail->IsSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = "ssl";
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->Port = 465;
            $this->mail->Username = "pruebahost19@gmail.com";
            $this->mail->Password = "123456789-a";									
            $this->mail->setFrom( 'pruebahost19@gmail.com'  );
            $this->mail->addAddress ( $email );									
            $this->mail->Subject='INVERLIMA';
            $this->mail->From ="pruebahost19@gmail.com";
            $this->mail->FromName = "INVERLIMA"; 
            $this->mail->MsgHTML($cuerpoMail);
            $this->mail->IsHTML(true);
            $this->mail->Send();
            echo 1 ;
            }catch( Exception  $e ) {
            echo 0 ;
            }

        }

        function VencimientoPDF($datos){
            $conn = $this->conexion->conectar();
            $date = date('Y-m-d');
            require('../../vista/plugins/fpdf/fpdf.php');
            $pdf = new FPDF();
            $pdf->AddPage();
            
            //cabecera
            $pdf->SetFont('Arial','B',12);
            $pdf->Image('../../vista/imagenes/logo_administracion.png' , 15 ,8, 0 , 25,'png');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(105);
            $pdf->Cell(38,8,'Fecha de generacion: ',0,0,'R');
            $pdf->Cell(22,8,$date,0,1,'R');
            $pdf->Cell(105);
            $pdf->Cell(38,8,'Nit: ',0,0,'R');
            $pdf->Cell(22,8,'1234645047',0,1,'R');
            $pdf->Cell(105);
            $pdf->Cell(38,8,'Direccion: ',0,0,'R');
            $pdf->Cell(22,8,'1234645047',0,1,'R');
            $pdf->Cell(105);
            $pdf->Cell(38,8,'correo: ',0,0,'R');
            $pdf->Cell(50,8,'inverlima-sas@hotmail.com',0,1,'R');
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(200,30,'Reporte de unidades',0,1,'C');
            
            
            //info
            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,8,'Ordenes realizadas ',0,0,'C');
            $pdf->ln(15);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(1);
            $pdf->SetFillColor(200,200,200);
            $pdf->Cell(15,8,'Placa',1,0,'C',true);
            $pdf->Cell(20,8,'# Interno',1,0,'C',true);
            $pdf->Cell(50,8,'Tecnico',1,0,'C',true);
            $pdf->Cell(35,8,'Creacion',1,0,'C',true);
            $pdf->Cell(35,8,'V. Extintor',1,0,'C',true);
            $pdf->Cell(35,8,'Rev. Cotrautol',1,1,'C',true);

            
            //datos
            foreach ($datos as $item) {
                
                $placa             = $item['placa'];
                $cod_interno       = $item['cod_interno'];
                $tecnico           = $item['tecnico'];
                $fecha_creacion    = $item['fecha_creacion'];
                $vExtintor         = $item['vExtintor'];
                $revBimCotrautolr   = $item['revBimCotrautol'];

                $revBimCotrautola = '';
                if($revBimCotrautolr == 1){
                $revBimCotrautola = "Se realiza";
                }
                else{
                $revBimCotrautola = "No se realiza";
                }

                $pdf->SetFont('Arial','',9);
                $pdf->Cell(1);
                $pdf->Cell(15,8,$placa,1,0,'L');
                $pdf->Cell(20,8,$cod_interno,1,0,'C');
                $pdf->Cell(50,8,$tecnico,1,0,'C');
                $pdf->Cell(35,8,$fecha_creacion,1,0,'C');
                $pdf->Cell(35,8,$vExtintor,1,0,'C');
                $pdf->Cell(35,8,$revBimCotrautola,1,1,'C');
            }
            
            
            $pdf->Output();
            $this->conexion->conectar();
        } 



}