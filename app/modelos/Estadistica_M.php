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
        
        //Consulta problemas denunciados segun periodo de tiempo, por defecto 7 dias
        public function consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia, $Zona, $FechaConsulta){            
            if($Zona != 'Todos'){
                $stmt = $this->dbh->prepare("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = :Estado AND municipio = :Municipio AND parroquia = :Parroquia AND zona = :Zona AND fechaDenuncia >= :FechaDenuncia GROUP BY servicio");
                $stmt->bindParam(':Estado', $Estado, PDO::PARAM_STR);
                $stmt->bindParam(':Municipio', $Municipio, PDO::PARAM_STR);
                $stmt->bindParam(':Parroquia', $Parroquia, PDO::PARAM_STR);
                $stmt->bindParam(':Zona', $Zona, PDO::PARAM_STR);
                $stmt->bindParam(':FechaDenuncia', $FechaConsulta, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt;
            }
            else{
                $Comodin = '%';
                $stmt = $this->dbh->prepare("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = :Estado AND municipio = :Municipio AND parroquia = :Parroquia AND zona LIKE :Zona AND fechaDenuncia >= :FechaDenuncia GROUP BY zona, servicio");
                $stmt->bindParam(':Estado', $Estado, PDO::PARAM_STR);
                $stmt->bindParam(':Municipio', $Municipio, PDO::PARAM_STR);
                $stmt->bindParam(':Parroquia', $Parroquia, PDO::PARAM_STR);
                $stmt->bindParam(':Zona', $Comodin, PDO::PARAM_STR);
                $stmt->bindParam(':FechaDenuncia', $FechaConsulta, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt;
            }
        } 

        //Consulta solicitada desde estadistica_Ind_Parro_V
        public function consultarCantidadDenuncias($Estado, $Municipio, $Parroquia, $Zona, $Servicio,   $FechaConsulta){  
            if($Zona != 'Todos'){
                // echo $Zona . "<br>";
                // echo "if";
                $stmt = $this->dbh->prepare("SELECT COUNT(fechaDenuncia) AS Total FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia' AND zona = '$Zona' AND servicio = '$Servicio' AND fechaDenuncia >= '$FechaConsulta' GROUP BY zona, servicio");      
                if($stmt->execute()){
                    return $stmt;
                }
                else{
                    return false;
                }
            }
            else{
                // echo $Zona . "<br>";
                // echo "else";
                $Comodin = '%';
                $stmt = $this->dbh->prepare("SELECT COUNT(fechaDenuncia) AS Total FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = :Estado AND municipio = :Municipio AND parroquia = :Parroquia AND zona LIKE :Zona AND servicio LIKE :Servicio AND fechaDenuncia >= :FechaDenuncia GROUP BY zona, servicio");   
                $stmt->bindParam(':Estado', $Estado, PDO::PARAM_STR);
                $stmt->bindParam(':Municipio', $Municipio, PDO::PARAM_STR);
                $stmt->bindParam(':Parroquia', $Parroquia, PDO::PARAM_STR);
                $stmt->bindParam(':Zona', $Comodin, PDO::PARAM_STR);
                $stmt->bindParam(':Servicio', $Comodin, PDO::PARAM_STR);
                $stmt->bindParam(':FechaDenuncia', $FechaConsulta, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt;
            }
        }
    }