<?php
    session_start();

    class Graficos_C extends Controlador{

        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php
        public function index($Sector, $Servicio){
            echo $Sector . $Servicio;
            exit();
            $this->vista("paginas/graficos_V");
        }

    }
?>