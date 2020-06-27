<?php
    class AcuseDenuncia_M extends CI_Model{ 

        public function __construct(){
           parent::__construct();
        }
        
        public function consultarCodigoDenuncia($ID_Afiliado, $CodigoFallo,  $Estado , $Municipio, $Parroquia){
            $consulta = $this->db->query("SELECT * FROM fallos WHERE ID_Afiliado = '$ID_Afiliado' AND (codigoFallo = '$CodigoFallo' && codigoFallo != 2000) AND ID_Ubicacion = ANY (SELECT ID_Ubicacion FROM ubicacion WHERE  estado = '$Estado' AND municipio = '$Municipio' AND  parroquia = '$Parroquia')"); 
            $resultado = $consulta->result();
            return $resultado;
        }

        public function consultarFecha($ID_Afiliado, $CodigoFallo){
            $consulta_2 = $this->db->query("SELECT fechaDenuncia, fechaCaducidad, aleatorio FROM fallos WHERE ID_Afiliado = '$ID_Afiliado' AND abierto = 1 AND codigoFallo = $CodigoFallo");
            $resultado = $consulta_2->result();
            return $resultado;
        }
        
        public function insertarUbicacion($Estado, $Municipio, $Parroquia,  $Direccion, $Aleatorio){
            $conn = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
            $stmt = $conn->prepare("INSERT INTO ubicacion(estado, municipio, parroquia, direccion, aleatorio) VALUES (:ESTADO, :MUNICIPIO, :PARROQUIA, :DIRECCION, :ALEATORIO)");

            $stmt->bindParam(':ESTADO', $estado);
            $stmt->bindParam(':MUNICIPIO', $municipio);
            $stmt->bindParam(':PARROQUIA', $parroquia);
            $stmt->bindParam(':DIRECCION', $direccion);
            $stmt->bindParam(':ALEATORIO', $aleatorio);

            $estado = $Estado;
            $municipio = $Municipio;
            $parroquia = $Parroquia;
            $direccion = $Direccion;
            $aleatorio = $Aleatorio;

            if($stmt->execute()){ 
                return true;
            }
            else{
                return false;
            } 
        }
        
        public function consultarID_Ubicacion($Aleatorio){
            $consulta = $this->db->query("SELECT ID_Ubicacion FROM ubicacion WHERE aleatorio = '$Aleatorio'");
            $resultado = $consulta->result();
            return $resultado;
        }

        public function insertarDescripcionDenuncia($Aleatorio, $ID_Afiliado, $ID_Ubicacion, $Sector, $Servicio, $RecibeVarios, $FechaCaducidad){
            $conn = new PDO("mysql:host=localhost; dbname=contralo_ria", 'root', '');
            $stmt = $conn->prepare("INSERT INTO fallos(ID_Ubicacion, ID_Afiliado, aleatorio, sector, servicio, codigoFallo, descripcionFallo, abierto, fechaDenuncia, fechaCaducidad) VALUES (:ID_UBICACION, :ID_AFILIADO, :ALEATORIO, :SECTOR, :SERVICIO, :CODIGO_FALLO, :DESCRIPCION, :ABIERTO, NOW(), :FECHA_CADUCIDAD)");

            $stmt->bindParam(':ID_UBICACION' , $id_ubicacion);
            $stmt->bindParam(':ID_AFILIADO' , $id_afiliado);
            $stmt->bindParam(':ALEATORIO' , $aleatorio);
            $stmt->bindParam(':SECTOR' , $sector);
            $stmt->bindParam(':SERVICIO' , $servicio);
            $stmt->bindParam(':CODIGO_FALLO' , $codigo_fallo);
            $stmt->bindParam(':DESCRIPCION' , $descripcion);
            $stmt->bindParam(':ABIERTO' , $status);
            $stmt->bindParam(':FECHA_CADUCIDAD' , $fecha_caducidad);

            $id_ubicacion = $ID_Ubicacion;
            $id_afiliado = $ID_Afiliado;
            $aleatorio = $Aleatorio;
            $sector =  $Sector;
            $servicio =  $Servicio;
            $codigo_fallo = $RecibeVarios['Fal'];
            $descripcion = $RecibeVarios['DeP'];
            $status = 1;
            $fecha_caducidad = $FechaCaducidad;

            if($stmt->execute()){ 
                return true;
            }
            else{
                return false;
            } 
            
        }
    }