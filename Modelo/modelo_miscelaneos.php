<?php
    class modelo_miscelaneos{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
        }

        function listar_miscelaneos(){
            $conn = $this->conexion->conectar();
            $sql  = "SELECT
            id,
            descripcion
            FROM
            miscelaneos
            WHERE estatus = 1;
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

        function registrar_miscelaneos($descripcion){
            $conn = $this->conexion->conectar();
            $sql  = "INSERT INTO miscelaneos(
                    descripcion,estatus)
                     VALUES ('$descripcion',1)
                     ";
                   
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }
        
        function modificar_estatus_miscelaneos($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE miscelaneos set estatus = $estatus
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
        
        function editar_miscelaneos($id,$descripcion){
            $conn = $this->conexion->conectar();
    
            $sql  = "UPDATE miscelaneos SET
                    descripcion = '$descripcion'
                    WHERE id=$id 
                    ";
                     
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

}