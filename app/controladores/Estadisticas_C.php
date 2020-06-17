<?php
    session_start();

    class Estadisticas_C extends Controlador{
        public function __construct(){            
            //Se accede al servidor de base de datos; Se instancia un objeto correspondiente que se comunica con la BD 
            $this->ConsultaEstadistica_M = $this->modelo("Estadistica_M");           
        }
        
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php
        public function index(){
            $this->vista("paginas/estadistica_V");
        }
        
        //Metodo llamado desde acuseDenuncia_V.php
        public function indicadores($CodigoDenuncia){
            //Se CONSULTA los datos de la denuncia
            $Denuncia= $this->ConsultaEstadistica_M->consultarDatosDenuncia($CodigoDenuncia);
            // print_r($Denuncia);

            $Datos = $Denuncia;
            $this->vista("paginas/estadistica_Indicadores_V", $Datos);
        }

        public function resultados($Estado, $Municipio, $Parroquia){
            //Se CONSULTA los indicadores disponibles
            $Indicadores = $this->ConsultaEstadistica_M->consultarIndicadoresParroquia($Estado, $Municipio, $Parroquia);
            // print_r($Indicadores);
            
            $Datos = $Indicadores;

            $this->vista("paginas/estadistica_Ind_Parro_V", $Datos);
        }
    }
?>    