<?php
session_start();
    class modelo_vehiculo{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
        }

        function listar_vehiculo(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];
            
            $sql  = "SELECT
            pro.id as idPropietario,
            v.id,
            v.placa,
            v.tipoVehiculo,
            md.descripcion as alianza,
            co.entResp as empresa,
            (p.nombre + ' ' + p.apellido) AS nombre
            FROM
            vehiculo AS v
            left JOIN company AS co ON (co.id = v.idCompany  )
            left JOIN propietario AS pro ON (v.idPropietario = pro.id)
            left JOIN persona AS p ON (pro.idPersona = p.id)
            LEFT JOIN miscelaneos_detalle AS md ON (md.id = v.alianza)
            WHERE v.estatus = 1 and v.idCompany = $idCompany;
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
           
        }
        function listar_alianza(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as alianza
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 1";
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


    function listar_pro(){
        $conn = $this->conexion->conectar();
        $idCompany = $_SESSION['COMPANY'];
        $Rol = $_SESSION['ROL'];
        $idUsuario = $_SESSION['S_ID'];

        if ($Rol == 1) {
            $com = "and pro.idCompany = $idCompany";
        }else if ($Rol == 2) {
            $com = "";
            
        }else{ 
            
            $com = "and pro.idCompany = $idCompany";
        }

        $sql  = "SELECT 
        pro.id,
        (p.nombre + ' ' +p.apellido) as dueno
        from 
        propietario as pro
        INNER JOIN persona AS p ON (pro.idPersona = p.id)
        INNER JOIN company AS c ON (c.id = pro.idCompany)
        where  pro.estatus = 1 $com
        ";
        //echo $sql;
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

    
    
    function registrar_vehiculo($txt_placa,$sel_tipoVehiculo,$sel_alianza,$sel_pro_vehiculo){
        $conn = $this->conexion->conectar();
        $idCompany = $_SESSION['COMPANY'];
        $idUsuario = $_SESSION['S_ID'];

        if($sel_pro_vehiculo != ''){
            $propietario = $sel_pro_vehiculo;
        }else{
            $propietario = 0;
        }

        $sql  = "INSERT INTO vehiculo(
                            placa,
                            tipovehiculo,
                            alianza,
                            estatus,
                            idPropietario,
                            idCompany,
                            idUsuario
                            )
                 VALUES(
                        '$txt_placa',
                        $sel_tipoVehiculo,
                        $sel_alianza,
                        1,
                        $sel_pro_vehiculo,
                        $idCompany,
                        $idUsuario
                        )
                 ";
        $resp = sqlsrv_query($conn, $sql);
        
        if( $resp === false) {
            return 0;
        }else{
            return 1;
        }
        
        $this->conexion->conectar();
    }


    function modificar_vehiculo($id,$estatus){
        $conn = $this->conexion->conectar();
        $sql  = "UPDATE vehiculo set estatus = $estatus
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

    function editar_vehiculo($id,$txt_interno,$txt_placa,$txt_marca,$txt_modelo,$txt_chasis,$txt_pasajeros,$sel_empresa,$sel_pro_vehiculo,$txt_soat,$txt_tecnomecanica,$txt_poliza_cont,$txt_poliza_ext,$venc_soat,$venc_tecno,$venc_poliza_cont,$venc_poliza_ext){
        $conn = $this->conexion->conectar();

        $sql  = "UPDATE vehiculo SET
                cod_interno = '$txt_interno',
                placa= '$txt_placa', 
                marca= '$txt_marca',
                modelo = '$txt_modelo',
                chasis = '$txt_chasis',
                num_pasajero = '$txt_pasajeros',
                soat = '$txt_soat',
                vSoat = '$venc_soat',
                tecnomecanica = '$txt_tecnomecanica',
                vTecnomecanica = '$venc_tecno',
                pContractual = '$txt_poliza_cont',
                vContractual = '$venc_poliza_cont',
                pExtraContractual = '$txt_poliza_ext',
                vExtraContractual = '$venc_poliza_ext',
                idEmpresa = $sel_empresa,
                idPropietario = $sel_pro_vehiculo
                WHERE id=$id
                ";
                 //echo $sql;
        $resp = sqlsrv_query($conn, $sql);
        
        if( $resp === false) {
            return 0;
        }else{
            return 1;
        }
        
        $this->conexion->conectar();
    }

    function contador_vehiculo(){
        $conn = $this->conexion->conectar();
        $idCompany = $_SESSION['COMPANY'];
        $Rol = $_SESSION['ROL'];
        $idUsuario = $_SESSION['S_ID'];

       /* if ($Rol == 2) {
            $wr = "and idUsuario = $idUsuario";
            $com = "AND idCompany = $idCompany";
        }else if ($Rol == 1) {
            $com = "";
            $wr = "";
        }else{
            $com = "AND idCompany = $idCompany";
            $wr = "";
        }*/

        $sql  = "SELECT  
                COUNT(id) as contadorVehiculo 
                from vehiculo
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


}