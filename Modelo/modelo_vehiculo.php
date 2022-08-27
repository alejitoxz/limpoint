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
            
            if ($Rol == 2) {
                $com = "";
                $com = "and v.idCompany = $idCompany";
            }else if ($Rol == 1) {
                $com = "";
                $wr = "";
            }else{
                $wr = "";
                $com = "and v.idCompany = $idCompany";
            }

            $sql  = "SELECT
            pro.id AS idPropietario,
            v.id,
            v.placa,
            mc.descripcion as marca,
            mc.id as idMarca,
            v.tipoVehiculo,
            md.descripcion AS alianza,
            md.id as idAlianza,
            co.entResp AS empresa,
            ( p.nombre + ' ' + p.apellido ) AS nombre 
            FROM
            vehiculo AS v
            LEFT JOIN company AS co ON ( co.id = v.idCompany )
            LEFT JOIN propietario AS pro ON ( v.idPropietario = pro.id )
            LEFT JOIN persona AS p ON ( pro.idPersona = p.id )
            LEFT JOIN miscelaneos_detalle AS md ON ( md.id = v.alianza ) 
            LEFT JOIN miscelaneos_detalle AS mc ON ( mc.id = v.marca )
            WHERE
            v.estatus = 1 $com $wr"; 
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
            where m.estatus = 1  AND m.id_miscelaneo = 3";
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

        if ($Rol == 2) {
            $com = "and pro.idCompany = $idCompany";
        }else if ($Rol == 1) {
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

    
    
    function registrar_vehiculo($placa,$tipoVehiculo,$alianza,$pro_vehiculo,$marca){
        $conn = $this->conexion->conectar();
        $idCompany = $_SESSION['COMPANY'];
        $idUsuario = $_SESSION['S_ID'];
        $date=@date('Y-m-d H:i:s');
        $sql  = "INSERT INTO vehiculo(
                            placa,
                            tipovehiculo,
                            alianza,
                            estatus,
                            idPropietario,
                            idCompany,
                            idUsuario,
                            marca,
                            fIngresov
                            )
                 VALUES(
                        '$placa',
                        $tipoVehiculo,
                        $alianza,
                        1,
                        $pro_vehiculo,
                        $idCompany,
                        $idUsuario,
                        $marca,
                        '$date'
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

    function editar_vehiculo($id,$placa,$marca,$tipoVehiculo,$alianza,$idPropietario){
        $conn = $this->conexion->conectar();

        $sql  = "UPDATE vehiculo SET
                placa = '$placa',
                tipoVehiculo= '$tipoVehiculo', 
                alianza= '$alianza',
                estatus = 1,
                idPropietario = '$idPropietario',
                marca = '$marca'
                WHERE id=$id
                ";
                 //echo $sql;exit;
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