<?php
    require(RUTA_APP . "/clases/Conexion_BD.php");

    class Alcaldia_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        public function consultarCNE($Cedula){
            $stmt = $this->dbh->prepare("SELECT COUNT(nombre) AS Total, nombre FROM electores WHERE cedula = '$Cedula'");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
        
        public function consultarApoyoConfirmado(){
            $stmt = $this->dbh->prepare("SELECT COUNT(cedula) AS Total FROM alcaldia");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarApoyoPostulacion($Cedula){
            $stmt = $this->dbh->prepare("SELECT COUNT(cedula) AS Total FROM alcaldia WHERE cedula = $Cedula");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function insertarApoyoPostulacion($RecibeDatos){           
            $stmt = $this->dbh->prepare("INSERT INTO alcaldia(cedula, fecha, hora) VALUES (:Cedula, CURDATE(), NOW())");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Cedula', $cedula);

            // insertar una fila
            $cedula = $RecibeDatos['Cedula'];
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }     
    }