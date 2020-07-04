<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class Estadistica_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        // public function consultarDatosDenuncia($CodigoDenuncia){
        //     $this->db->Consulta("SELECT * FROM fallos INNER JOIN ubicacion ON fallos.aleatorio=ubicacion.aleatorio WHERE ubicacion.aleatorio = '$CodigoDenuncia'");
        //     //registros() es un metodo de la clase Conexion_BD
        //     $resultados =  $this->db->registros();
        //     return $resultados;
        // }
        
        public function consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia){
            $stmt = $this->dbh->prepare("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = :Estado AND municipio = :Municipio AND parroquia = :Parroquia GROUP BY servicio");
            $stmt->bindValue(':Estado', $Estado, PDO::PARAM_STR);
            $stmt->bindValue(':Municipio', $Municipio, PDO::PARAM_STR);
            $stmt->bindValue(':Parroquia', $Parroquia, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        } 

        //Consulta solicitada desde estadistica_Ind_Parro_V
        public function consultarCantidadDenuncias($Estado, $Municipio, $Parroquia, $Servicio, $FechaConsulta){
            $stmt = $this->dbh->query("SELECT COUNT(fechaDenuncia) AS Total FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia' AND servicio = '$Servicio' AND fechaDenuncia >= '$FechaConsulta' GROUP BY servicio");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }