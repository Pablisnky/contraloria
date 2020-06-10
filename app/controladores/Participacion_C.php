<?php
    session_start();
    
    class Participacion_C extends Controlador{
        //Siempre cargara este metodo por defecto, solo sino se solicita otra metodo
        public function index(){
            $this->vista("paginas/participacion_V");
        }
    }
?>    