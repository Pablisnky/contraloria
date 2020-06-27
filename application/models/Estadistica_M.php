<?php
    class Estadistica_M extends CI_Model{

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
            $consulta = $this->db->query("SELECT * FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia' GROUP BY servicio");
            $result = $consulta->result();
            return $result;
        } 

        // public function consultarCantidadDenuncias($Estado, $Municipio, $Parroquia, $Servicio){
        //     $this->db->Consulta("SELECT COUNT(*) AS Total FROM ubicacion INNER JOIN fallos ON ubicacion.ID_Ubicacion=fallos.ID_Ubicacion WHERE estado = '$Estado' AND municipio = '$Municipio' AND parroquia = '$Parroquia' AND servicio = '$Servicio' GROUP BY servicio");
        //     //registros() es un metodo de la clase Conexion_BD
        //     $resultados =  $this->db->registros();
        //     return $resultados;
        // }
    }