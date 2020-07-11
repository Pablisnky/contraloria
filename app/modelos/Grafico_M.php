<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class Grafico_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
                
        public function consultarDetallesIndicadores($Estado, $Municipio, $Parroquia, $Zona,$FechaConsulta, $Servicio){
            $stmt = $this->dbh->prepare("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion INNER JOIN descripcionfallo ON fallos.codigoFallo=descripcionfallo.codigoFallo WHERE estado = :Estado AND municipio = :Municipio AND parroquia = :Parroquia AND zona = :Zona AND servicio = :Servicio AND fechaDenuncia >= :fechaDenuncia");
            $stmt->bindValue(':Estado', $Estado, PDO::PARAM_STR);
            $stmt->bindValue(':Municipio', $Municipio, PDO::PARAM_STR);
            $stmt->bindValue(':Parroquia', $Parroquia, PDO::PARAM_STR);
            $stmt->bindValue(':Zona', $Zona, PDO::PARAM_STR);
            $stmt->bindValue(':Servicio', $Servicio, PDO::PARAM_STR);
            $stmt->bindValue(':fechaDenuncia', $FechaConsulta, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        } 
    }