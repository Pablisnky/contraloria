<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class Inicio_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        //Consulta la cantidad de denuncias en el día
        public function consultarDenunciaDiaria(){
            $stmt = $this->dbh->prepare("SELECT COUNT(fechaDenuncia) AS Total FROM fallos WHERE fechaDenuncia = CURDATE()");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }