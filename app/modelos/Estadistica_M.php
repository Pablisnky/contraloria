<?php
    class Estadistica_M{
        private $db;

        public function __construct(){
            //Se conecta a la BD instanciando la clase Conexion_BD
            $this->db = new Conexion_BD;           
        }
        
        public function consultarDatosDenuncia($CodigoDenuncia){
            $this->db->Consulta("SELECT * FROM fallos INNER JOIN ubicacion ON fallos.aleatorio=ubicacion.aleatorio WHERE ubicacion.aleatorio = '$CodigoDenuncia'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
        
        public function consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia){
            $this->db->Consulta("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia'");
            //registros() es un metodo de la clase Conexion_BD
            $resultados =  $this->db->registros();
            return $resultados;
        }
    }