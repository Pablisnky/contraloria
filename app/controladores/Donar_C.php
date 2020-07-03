<?php
    session_start();

    class Donar_C extends Controlador{


        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo, los parametros los recibe de inicio_V.php
        public function index(){
            $this->vista("paginas/donar_V");
        }

    }
?>