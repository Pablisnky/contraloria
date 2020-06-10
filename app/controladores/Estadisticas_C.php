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
    }
?>    