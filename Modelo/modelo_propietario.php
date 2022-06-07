<?php
session_start();
    class modelo_propietario{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
        }

        function listar_propietario(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            if ($Rol == 2) {
                $wr = "and pro.idUsuario = $idUsuario";
                $com = "and pro.idCompany = $idCompany";
            }else if ($Rol == 1) {
                $com = "";
                $wr = "";
            }else{ 
                $wr = "";
                $com = "and pro.idCompany = $idCompany";
            }
            $sql  = "SELECT
            pro.id,
            p.nombre,
            p.apellido,
            p.telefono,
            p.email,
            p.id as idPersona
            FROM
            propietario AS pro
            INNER JOIN persona AS p ON ( pro.idPersona = p.id ) 
            INNER JOIN company AS c ON ( c.id = pro.idCompany ) 
            WHERE
            pro.estatus = 1
            $com $wr
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

        function listar_alianzap(){
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

        function buscar_personaP($valor){
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

        //revisar el tema del alert, no funciona bien
        function registrar_propietario($id,$nombre,$apellido,$telefono,$email,$placa,$tipoVehiculo,$alianza){
            $idCompany = $_SESSION['COMPANY'];
            $idUsuario = $_SESSION['S_ID'];
            $cadena = "";
                $cadena = "DECLARE @idPersona int
                INSERT INTO persona(nombre,apellido,telefono,email)
                VALUES('$nombre','$apellido','$telefono','$email')
                SET @idPersona = SCOPE_IDENTITY()
                DECLARE @idPropietario int
                INSERT INTO propietario(idPersona,estatus,idCompany,idUsuario) 
                VALUES(@idPersona,1,$idCompany,$idUsuario)
                SET @idPropietario = SCOPE_IDENTITY()
                INSERT INTO vehiculo(placa,tipoVehiculo,alianza,estatus,idPropietario,idCompany,idUsuario)
                VALUES('$placa','$tipoVehiculo','$alianza',1,@idPropietario,$idCompany,$idUsuario)
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
            $resp = sqlsrv_query($conn, $sql);
           
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

        function modificar_propietario($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE propietario set estatus= $estatus
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


        function modificar_datos_propietario($id,$nombre,$apellido,$telefono,$email,$idPersona){
            $conn = $this->conexion->conectar();

            $sql  = "UPDATE persona SET
                    nombre = '$nombre', 
                    apellido = '$apellido',
                    telefono = '$telefono',
                    email = '$email'
                    WHERE id = $idPersona
                    ";
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

        function contador_propietario(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            if ($Rol == 2) {
                $wr = "idUsuario = $idUsuario";
                $com = "AND idCompany = $idCompany";
            }else if ($Rol == 1) {
                $com = "";
                $wr = "";
            }else{
                $com = "AND idCompany = $idCompany";
                $wr = "";
            }
            $sql  = "SELECT COUNT(id) as contadorPropietario from propietario
            where estatus = 1 $wr $com ";
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