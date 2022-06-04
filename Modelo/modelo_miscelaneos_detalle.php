<?php
    class modelo_miscelaneos_detalle{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
        }

        function listar_miscelaneos_detalle(){
            $conn = $this->conexion->conectar();
            $sql  = "SELECT
            md.id,
            md.descripcion, 
            m.descripcion AS descripcion_miscelaneos,
            m.id AS idMiscelaneos
            FROM
            miscelaneos_detalle as md
            INNER JOIN miscelaneos as m ON (m.id = md.id_miscelaneo AND m.estatus = 1)
            WHERE md.estatus = 1;
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

        function buscar_miscelaneos_detalle($descripcion){
            $conn = $this->conexion->conectar();
            $sql  = "SELECT
            md.id,
            md.descripcion 
            FROM
            miscelaneos_detalle as md
            INNER JOIN miscelaneos as m ON (m.id = md.id_miscelaneo AND m.estatus = 1)
            WHERE md.estatus = 1 and m.descripcion = '$descripcion';
            ";

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

        function registrar_miscelaneos_detalle($descripcion_detalle,$categoria_miscelaneo){
            $conn = $this->conexion->conectar();
            $sql  = "INSERT INTO miscelaneos_detalle(
                    descripcion,id_miscelaneo,estatus)
                     VALUES ('$descripcion_detalle',$categoria_miscelaneo,1)
                     ";
                   
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }
        
        function modificar_estatus_miscelaneos_detalle($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE miscelaneos_detalle set estatus = $estatus
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
        
        function editar_miscelaneos_detalle($id,$descripcion,$categoria_miscelaneo){
            $conn = $this->conexion->conectar();
    
            $sql  = "UPDATE miscelaneos_detalle SET
                    descripcion = '$descripcion',
                    id_miscelaneo = $categoria_miscelaneo
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